<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Result;

class SubmitController extends Controller
{
    public function store(Request $request){

        $request_answer = json_decode($request->input('answers'), true);

        $totalScore = 0;
        foreach ($request_answer as $key => $value) {
             Answer::create([
                'user_id' => $request->input('user_id'),
                'question_id' => $value['question_id'],
                'answer_value' => $value['answer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $totalScore += $value['answer'];

        }

        $result = Result::create([
            'user_id' => $request->input('user_id'),
            'fill_date'=> $request->input('fill_date'),
            'score'=> $totalScore,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Answers submitted successfully', 'result' => ""]);
    }
}


// public function store(Request $request)
// {
//     // MEALUKAN VALIDATION FORM HARUS TERSISI
//     $request->validate([
//         'bmi' => ['max:100'],
//         'bmr' => ['max:100'],
//     ]);
//     $request['user_id'] = Auth::user()->id;

//     $userRecordData = UserRecordData::create($request->all());
//     return ((new UserRecordDataResource($userRecordData->loadMissing('user')))->additional([
//         'meta' => [
//             'code' => 200,
//             'status' => 'Success',
//             'message' => "Success"
//         ],
//     ]));
// }