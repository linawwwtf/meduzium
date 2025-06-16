<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketPrice;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    public function showTicketForm()
    {
        $prices = TicketPrice::firstOrCreate([]);
        $events = Event::all(); // или другая логика получения мероприятий
        return view('buy-ticket', compact('prices', 'events'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:9|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'adult_tickets_count' => 'required|integer|min:1|max:10',
            'child_tickets_count' => 'required|integer|min:0|max:10',
            'group_tickets_count' => 'sometimes|integer|min:5|max:20',
            'school_group_count' => 'sometimes|integer|min:10|max:30',
            'events_id' => 'array',
            'events_id.*' => 'integer|exists:events,id'
        ]);

        return DB::transaction(function () use ($data) {
            $dayOfWeek = date('w', strtotime($data['date']));
            $isWeekend = in_array($dayOfWeek, [0, 5, 6]);

            $prices = TicketPrice::latest()->first() ?? new TicketPrice();

            // Определяем цены
            $pricing = [
                'adult' => $isWeekend ? $prices->adult_weekend_price : $prices->adult_weekday_price,
                'child' => $isWeekend ? $prices->child_weekend_price : $prices->child_weekday_price,
                'group' => $prices->group_price,
                'school' => $prices->school_group_price
            ];

            // Проверка на групповые билеты
            $totalPeople = $data['adult_tickets_count'] + $data['child_tickets_count'];
            if ($totalPeople >= $prices->group_min_people && empty($data['group_tickets_count'])) {
                $data['group_tickets_count'] = $totalPeople;
            }

            // Расчет стоимости
            $total_price = $data['adult_tickets_count'] * $pricing['adult']
                + $data['child_tickets_count'] * $pricing['child']
                + ($data['group_tickets_count'] ?? 0) * $pricing['group']
                + ($data['school_group_count'] ?? 0) * $pricing['school'];

            $data['total_price'] = $total_price;

            if (isset($data['events_id'])) {
                $eventsIds = $data['events_id'];
            } else {
                $eventsIds = [];
            }

            $orderId = Order::create($data)->id;

            $this->createTickets($data, $orderId, $pricing);

            return view('successful-payment', compact('orderId', 'eventsIds', 'pricing'));
        }, 3);

    }

    public function createTickets($data, $orderId, $pricing)
    {
        // Взрослые билеты
        for ($i = 0; $i < $data['adult_tickets_count']; $i++) {
            Ticket::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => 'adult',
                'price' => $pricing['adult'],
                'uniq_identity' => sprintf('%06d', rand(0, 999999)),
                'order_id' => $orderId,
            ]);
        }

        // Детские билеты
        for ($i = 0; $i < $data['child_tickets_count']; $i++) {
            Ticket::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => 'child',
                'price' => $pricing['child'],
                'uniq_identity' => sprintf('%06d', rand(0, 999999)),
                'order_id' => $orderId,
            ]);
        }

        // Групповые билеты
        for ($i = 0; $i < ($data['group_tickets_count'] ?? 0); $i++) {
            Ticket::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => 'group',
                'price' => $pricing['group'],
                'uniq_identity' => sprintf('%06d', rand(0, 999999)),
                'order_id' => $orderId,
            ]);
        }

        // Школьные группы
        for ($i = 0; $i < ($data['school_group_count'] ?? 0); $i++) {
            Ticket::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => 'school_group',
                'price' => $pricing['school'],
                'uniq_identity' => sprintf('%06d', rand(0, 999999)),
                'order_id' => $orderId,
            ]);
        }

    }
}
