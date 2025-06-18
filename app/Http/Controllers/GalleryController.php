<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SuggestionImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function showSuggestForm()
    {
        return view('suggest-image');
    }

    // Сохранение предложенного фото
    public function storeSuggestion(Request $request): RedirectResponse
    {
        $data = request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $data['image'];

        $filePath = $file->storeAs('suggestions', uniqid() . '.' . $file->getClientOriginalExtension(), 'public');

        SuggestionImage::create(['image_url' => $filePath]);

        return back()->with('success', 'Ваше фото успешно отправлено на модерацию!');
    }

    // Админ-панель управления галереей
    public function adminIndex()
    {
        $gallery = Gallery::orderBy('id')->get();
        $suggestions = SuggestionImage::latest()->get();

        return view('admin.suggestions', compact('gallery', 'suggestions'));
    }

    // Обновление галереи
    public function updateGallery(Request $request): RedirectResponse
    {
        // Validate input data
        $data = $request->validate([
            'image_url1' => 'nullable|string',
            'image_url2' => 'nullable|string',
            'image_url3' => 'nullable|string',
            'image_url4' => 'nullable|string',
            'image_url5' => 'nullable|string',
            'image_url6' => 'nullable|string',
            'image1' => 'nullable|image|max:5120', // 5MB max
            'image2' => 'nullable|image|max:5120',
            'image3' => 'nullable|image|max:5120',
            'image4' => 'nullable|image|max:5120',
            'image5' => 'nullable|image|max:5120',
            'image6' => 'nullable|image|max:5120',
        ]);

        // Process each gallery slot (1 to 6)
        for ($i = 1; $i <= 6; $i++) {
            $imageKey = "image$i";
            $urlKey = "image_url$i";
            $gallery = Gallery::find($i) ?? new Gallery(['id' => $i]);

            // Handle file upload
            if ($request->hasFile($imageKey)) {
                $file = $request->file($imageKey);
                $path = $file->store('gallery', 'public');
                $gallery->image_url = 'storage/'. $path;
            }
            // Handle URL from input (e.g., from drag-and-drop suggestions)
            elseif (!empty($data[$urlKey])) {
                $gallery->image_url = $data[$urlKey];
            }
            // If neither file nor URL is provided, skip
            else {
                continue;
            }

            $gallery->save();
        }

        return back()->with('success', 'Галерея успешно обновлена!');
    }

    // Сброс галереи к исходным фото
    public function resetGallery(): RedirectResponse
    {
        foreach ([1, 2, 3, 4, 5, 6] as $value) {

            $image = Gallery::find($value);

            $image->image_url = "storage/gallery/photo{$value}.jpg";
            $image->save();
        }

        return back()->with('success', 'Галерея сброшена к исходным изображениям!');
    }

    // Удаление предложенного фото
    public function deleteSuggestion($id): RedirectResponse
    {
        $suggestion = SuggestionImage::findOrFail($id);

        // Удаляем файл
        Storage::delete('public/' . $suggestion->image_url);

        // Удаляем запись
        $suggestion->delete();

        return back()->with('success', 'Предложение удалено!');
    }
}
