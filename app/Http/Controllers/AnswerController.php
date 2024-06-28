<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnswerController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'integer',
            'answer_value' => 'integer',
            'user_id' => 'integer',
            'fill_date' => 'date',
        ]);

        $answer = Answer::create([
            'user_id' => Auth::user()->id,
            'question_id' => $request->input('question_id'),
            'answer_value' => $request->input('answer_value'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //score calculation
        $totalScore = 0;
        $totalScore += $request->input('answer_value');


        $result = Result::create([
            'user_id' => Auth::user()->id,
            'fill_date'=> $request->input('fill_date'),
            'score'=> $totalScore,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Answers submitted successfully', 'result' => $answer]);
    }



}
