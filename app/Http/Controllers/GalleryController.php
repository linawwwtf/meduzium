<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\SuggestionImage;

class GalleryController extends Controller
{
    public function showSuggestForm()
    {
        return view('suggest-image');
    }

    // Сохранение предложенного фото
    public function storeSuggestion(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $path = $request->file('image')->store('public/suggestions');
        $publicPath = Storage::url($path);

        SuggestionImage::create([
            'image_url' => Str::after($publicPath, '/storage'),
        ]);

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
        $data = $request->validate([
            'gallery' => 'required|array',
            'gallery.*.id' => 'required|integer',
            'gallery.*.image_url' => 'nullable|string',
        ]);

        foreach ($data['gallery'] as $item) {
            $galleryItem = Gallery::findOrFail($item['id']);
            
            if (!empty($item['image_url'])) {
                $galleryItem->image_url = $item['image_url'];
                $galleryItem->save();
            }
        }

        return back()->with('success', 'Галерея успешно обновлена!');
    }

    // Сброс галереи к исходным фото
    public function resetGallery(): RedirectResponse
    {
        $defaultImages = [
            11 => 'gallery/photo1.jpg',
            12 => 'gallery/photo2.jpg',
            13 => 'gallery/photo3.jpg',
            14 => 'gallery/photo4.jpg',
            15 => 'gallery/photo5.jpg',
        ];

        foreach ($defaultImages as $id => $image) {
            $galleryItem = Gallery::findOrFail($id);
            $galleryItem->image_url = $image;
            $galleryItem->save();
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
