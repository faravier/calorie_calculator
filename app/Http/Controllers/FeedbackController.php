<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        // Create a new feedback instance
        $feedback = new Feedback();
        $feedback->rating = $validatedData['rating'];
        $feedback->comments = $validatedData['comments'];
        $feedback->save();

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
