<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $questionId)
    {
        $request->validate([
            'body' => 'required|min:5',
        ]);

        $question = Question::findOrFail($questionId);

        Comment::create([
            'body' => $request->body,
            'question_id' => $question->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('questions.index')->with('success', 'Comment added successfully.');
    }
}


?>
