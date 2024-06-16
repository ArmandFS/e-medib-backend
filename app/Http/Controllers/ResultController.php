<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    
    public function index()
    {
        $results = Result::get();
        return response()->json($results);
    }
    public function show($id)
    {
        //show results kalo ada user
        $result = Result::with('user')->find($id);
        
        if (!$result) {
            return response()->json(['message' => 'Result not found'], 404);
        }
        return response()->json( ["data" => $result]);
    }
}
