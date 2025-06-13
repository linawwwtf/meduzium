<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\TicketPrice;
use App\Models\Review;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'type' => $request->input('type'),
            'date' => $request->input('date'),
            'sort' => $request->input('sort', 'newest') // По умолчанию сортировка по новым
        ];

        $query = Event::query();

        // Фильтрация по типу
        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        // Фильтрация по дате
        if (!empty($filters['date'])) {
            $now = now();
            switch ($filters['date']) {
                case 'today':
                    $query->whereDate('start_date', $now->toDateString());
                    break;
                case 'week':
                    $query->whereBetween('start_date', [
                        $now->startOfWeek()->toDateString(),
                        $now->endOfWeek()->toDateString()
                    ]);
                    break;
                case 'month':
                    $query->whereMonth('start_date', $now->month)
                          ->whereYear('start_date', $now->year);
                    break;
                case 'future':
                    $query->where('start_date', '>=', $now->toDateString());
                    break;
            }
        }

        // Сортировка
        switch ($filters['sort']) {
            case 'newest':
                $query->orderBy('start_date', 'desc');
                break;
            case 'oldest':
                $query->orderBy('start_date', 'asc');
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
        }

        // Получаем результаты с пагинацией
        $events = $query->paginate(9)->appends($filters);

        
        $gallery = Gallery::all();
        $prices = TicketPrice::firstOrCreate([]);

        $reviews = Review::where('status', 'accepted')
               ->orderBy('created_at', 'desc')
               ->take(3)
               ->get();

        return view('welcome', compact('events', 'reviews', 'gallery', 'prices', 'filters'));
    }
}
