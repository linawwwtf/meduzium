<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SuggestionImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SuggestionImagesController extends Controller
{
    public function index(): View
    {
        $gallery = Gallery::all();
        $suggestions = SuggestionImages::all();

        return view('admin.suggestions', compact('suggestions', 'gallery'));
    }

    public function create(): RedirectResponse
    {
        $data = request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $data['image'];

        $filePath = $file->storeAs('suggestions', uniqid() . '.' . $file->getClientOriginalExtension(), 'public');

        SuggestionImages::create(['image_url' => $filePath]);

        return back()->with('');
    }
}
