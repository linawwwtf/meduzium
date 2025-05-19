<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function indexAdmin()
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->back();
        }

        $reviews = Review::where('status', 'validation')->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function indexUser()
    {
        $reviews = Review::where('status', 'accepted')->paginate(10);
        return view('reviews', compact('reviews'));
    }

    public function create()
    {
        return view('add-review');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:100',
            'rating' => 'required|integer|between:1,5',
        ]);

        Review::create($data);

        return redirect()->back()->with('success', 'Отзыв оставлен!');
    }

    public function updateStatus(Review $review)
    {
        if ($review->status == 'accepted') return redirect()->back();

        $review->status = 'accepted';
        $review->save();

        return redirect()->back();
    }

    public function delete(Review $review)
    {
        $review->delete();
        return redirect()->back();
    }
}
