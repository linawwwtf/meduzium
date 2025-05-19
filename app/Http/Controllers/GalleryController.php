<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function change(): RedirectResponse
    {
        $data = request()->validate([
            'image_url1' => 'nullable|string',
            'image_url2' => 'nullable|string',
            'image_url3' => 'nullable|string',
            'image_url4' => 'nullable|string',
            'image_url5' => 'nullable|string',
        ]);

        foreach ($data as $key => $value) {
            if ($value) {
                $image = Gallery::findOrFail($key[-1]);

                $value = 'storage' . Str::after($value, '/storage');
                $image->image_url = $value;
                $image->save();
            }
        }

        return back();
    }

    public function reset(): RedirectResponse
    {
        foreach ([1, 2, 3, 4, 5] as $value) {

            $image = Gallery::findOrCreate($value);

            $image->image_url = "storage/gallery/photo{$value}.jpg";
            $image->save();
        }

        return back();
    }
}
