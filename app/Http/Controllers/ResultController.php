<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    
    public function index()
    {
        $results = Result::get();
        return response()->json($results);
    }
    public function show()
    {
        //show results kalo ada user
        $id = Auth::user()->id;
        $result = Result::with('user')->find($id);
        
        if (!$result) {
            return response()->json(['message' => 'Result not found'], 404);
        }
        return response()->json( ["data" => $result]);
    }

    //function to find with user_id
    public function getByUserId()
    {
        $id = Auth::user()->id;
        $results = Result::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        if ($results->isEmpty()) {
            return response()->json(['message' => 'Results not found'], 404);
        }
        
        $results = $results->first();


        return response()->json(["data" => $results]);
    }


}

