<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
{
    public function store(Request $request){

        $request_answer = is_string($request->input('answers')) ? json_decode($request->input('answers'), true) : $request->input('answers');
        //$request_answer = json_decode($request->input('answers'), true);

        if (is_null($request_answer) || !is_array($request_answer)) {
            return response()->json(['message' => 'Invalid answers data'], 400);
        }
        $totalScore = 0;
        foreach ($request_answer as $key => $value) {
             Answer::create([
                'user_id' => Auth::user()->id,
                'question_id' => $value['question_id'],
                'answer_value' => $value['answer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $totalScore += $value['answer'];
        }
        $result = Result::create([
            'user_id' => Auth::user()->id,
            'fill_date'=> $request->input('fill_date'),
            'score'=> $totalScore,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Answers submitted successfully', 'result' => $result]);
    }
}