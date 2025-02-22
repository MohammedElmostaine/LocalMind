<?php
namespace App\Http\Controllers;


use App\Models\Questions;

use App\Models\Comments;
use Illuminate\Http\Request;


class QuestionsController extends Controller
{
    // Display a listing of the questionss
    public function index()
{
    $questions = Questions::with("comments")->get();
    // $questions = Comments::all();
    // return $questions;
    return view('home', compact('questions'));
}
public function create()
{
    return view('sections.addquestion');
}

// In app/Models/Questions.php

}
