<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function submitRating(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $rating = new Rating();
        $rating->rating = $request->input('rating');
        $rating->comments = $request->input('comment');
        $rating->save();

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
