<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventsSignController extends Controller
{
    public function signUp()
    {
        $events = Event::all();

        return view('events-sign-up', compact('events'));
    }

    public function addSignUp()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^\+7\s?\(?\d{3}\)?[\s-]?\d{3}[\s-]?\d{2}[\s-]?\d{2}$/'],
            'event_id' => 'integer|exists:events,id'
        ]);

        EventRegistration::create($data);

        return back()->with('');
    }
}
