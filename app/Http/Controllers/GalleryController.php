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
        dd($request->all());

        $data = request()->validate([
            'image_url1' => 'nullable|string',
            'image_url2' => 'nullable|string',
            'image_url3' => 'nullable|string',
            'image_url4' => 'nullable|string',
            'image_url5' => 'nullable|string',
        ]);

        foreach ($data as $key => $value) {
            if ($value) {
                $image = Gallery::find($key[-1]);

                $value = 'storage' . Str::after($value, '/storage');
                $image->image_url = $value;
                $image->save();
            }
        }

        return back()->with('success', 'Галерея успешно обновлена!');
    }

    // Сброс галереи к исходным фото
    public function resetGallery(): RedirectResponse
    {
        foreach ([1, 2, 3, 4, 5] as $value) {

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
