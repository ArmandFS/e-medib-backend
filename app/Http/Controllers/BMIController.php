<?php

namespace App\Http\Controllers;

use App\Http\Resources\BMIResource;
use App\Models\BMI;
use App\Models\BMR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BMIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUserId =  Auth::user()->id;
        $bmi = BMR::where('user_id', '=',  $currentUserId)->get();
        return response()->json([
            "data" => $bmi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tinggi_badan' => ['string', 'min:1', 'required'],
            'berat_badan' => ['string', 'min:1', 'required'],
        ]);

        $berat_badan = (float)$request['berat_badan'];
        $tinggi_badan = (float)$request['tinggi_badan'] / 100;
        $bmi =  round($berat_badan / ($tinggi_badan * $tinggi_badan), 2);
        $status = "";

        if ($bmi <= 18.5) {
            $status = "underweight";
        } elseif ($bmi >= 18.5 and $bmi <= 24.9) {
            $status = "normal";
        } elseif ($bmi >= 25 and $bmi <= 29.9) {
            $status = "overweight";
        } else {
            $status = "obesitas";
        }

        $bmi_data = BMI::create([
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            'bmi' => $bmi,
            'status' => $status,
            'user_id' => Auth::user()->id
        ]);

        return new BMIResource($bmi_data);
    }

    /**
     * Display the specified resource.
     */
    public function show(BMI $bMI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BMI $bMI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BMI $bMI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BMI $bMI)
    {
        //
    }
}
