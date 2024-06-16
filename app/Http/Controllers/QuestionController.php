<?php

namespace App\Http\Controllers;


use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index()
    {
        // Fetch questions with their options
        $questions = Question::with('options')->get();

        // Return the questions as a JSON response
        return response()->json(['data' => $questions]);
    }

}
