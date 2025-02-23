<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;

class QuestionController extends Controller
{
    // Display a listing of the questions and comments
    public function index()
    {
        $questions = Question::with("comments")->get();
        return view('home', compact('questions'));
    }

    // Show the form for creating a new question
    public function create()
    {
        $categories = Categorie::all();
        return view('questions.create', compact('categories'));
    }

    // Store a newly created question in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:255',
            'body' => 'required|min:20',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Question::create([
            'title' => $request->title,
            'body' => $request->body,
            'categorie_id' => $request->categorie_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home')->with('success', 'Question created successfully.');
    }

    // Search for questions
    public function search(Request $request)
    {
        $query = $request->input('query');
        $questions = Question::where('title', 'like', "%{$query}%")
                             ->orWhere('body', 'like', "%{$query}%")
                             ->with('comments')
                             ->get();

        return view('home', compact('questions'));
    }

    public function like(Question $question)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        if ($question->isLikedBy($user)) {
            $question->likes()->detach($user->id);
            return redirect()->back()->with('success', 'Question unliked successfully.');
        }

        $question->likes()->attach($user->id);
        return redirect()->back()->with('success', 'Question liked successfully.');
    }
}
?>
