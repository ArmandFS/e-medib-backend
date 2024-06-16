<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;


class OptionController extends Controller
{
    //controller for option
    // Get all options
    public function index()
    {
        $options = Option::all();
        return response()->json($options);
    }

    // Get options by question ID
    public function getOptionsByQuestion($questionId)
    {
        $options = Option::where('question_id', $questionId)->get();
        return response()->json(["data" => $options]);
    }
}
