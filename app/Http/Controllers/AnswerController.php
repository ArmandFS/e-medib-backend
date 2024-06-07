<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Result;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id'=>'required|integer',
            'option_id' => 'required|integer',
            //entar ini di test lg pake user id kalo ada di tabel mysqlnya
            //'user_id' => 'required|integer',
            'answer_value' => 'required|integer',
        ]);

        //$totalScore = 0;

        
        $answer = new Answer([
                //'user_id' => $request['user_id'],
                'question_id' => $request['question_id'],
                'option_id' => $request['option_id'],
                'answer_value' => $request['answer_value'],
            ]);
        $answer->save();
        //$totalScore += $answerData['answer_value'];
        

        // $result = Result::create([
        //     'user_id' => $userId,
        //     'calculated_score' => $totalScore,
        //     'fill_date' => $fillDate
        // ]);

        return response()->json(['message' => 'Answers and results submitted successfully', 'result' => $answer]);
        //return response()->json(['message' => 'Answers and result saved successfully']);
    }





}
