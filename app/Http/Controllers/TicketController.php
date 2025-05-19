<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:9|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'adult_tickets_count' => 'required|integer|min:1|max:10',
            'child_tickets_count' => 'required|integer|min:0|max:10',
            'events_id' => 'required|array',
            'events_id.*' => 'integer|exists:events,id'
        ]);

        return DB::transaction(function () use ($data) {
            $dayOfWeek = date('w', strtotime($data['date']));
            $isWeekend = in_array($dayOfWeek, [0, 5, 6]);

            if ($isWeekend) {
                $adultPrice = 950;
                $childPrice = 650;
            } else {
                $adultPrice = 1100;
                $childPrice = 850;
            }

            $total_price = $data['adult_tickets_count'] * $adultPrice + $data['child_tickets_count'] * $childPrice;

            $data['total_price'] = $total_price;

            $eventsIds = $data['events_id'];

            $orderId = Order::create($data)->id;

            for ($i = 0; $i < $data['adult_tickets_count']; $i++) {
                Ticket::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'children_ticket' => false,
                    'uniq_identity' => sprintf('%06d', rand(0, 999999)),
                    'order_id' => $orderId,
                ]);
            }

            for ($i = 0; $i < $data['child_tickets_count']; $i++) {
                Ticket::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'children_ticket' => true,
                    'uniq_identity' => sprintf('%06d', rand(0, 999999)),
                    'order_id' => $orderId,
                ]);
            }

            return view('successful-payment', compact('orderId', 'eventsIds'));
        }, 3);
    }
}
