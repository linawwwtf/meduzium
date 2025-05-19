<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $gallery = Gallery::all();

        return view('welcome', compact('events', 'gallery'));
    }
}
