<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
        ->when($request->type, fn($q) => $q->where('type', $request->type))
        ->orderBy('start_date')
        ->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:exhibition,masterclass,lecture',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Мероприятие добавлено');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:exhibition,masterclass,lecture',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Мероприятие обновлено');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Мероприятие удалено');
    }
}
