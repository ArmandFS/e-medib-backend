<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    // Get All Data 
    public function index()
    {
        $currentUserId =  Auth::user()->id;
        $food = Food::where('user_id', '=',  $currentUserId)->get();
        return FoodResource::collection($food->loadMissing('user:id,username'))->additional([
            'meta' => [
                'code' => 200,
                'status' => 'Success',
                'message' => "Success"
            ],
        ]);
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => ['max:100', 'string',],
            'calories' => ['max:255', 'string',],
            'glucose' => ['max:255', 'string',],
            'fat' => ['max:255', 'string',],
            'cholesterol' => ['max:255', 'string',],
            'protein' => ['max:255', 'string',],
            'carbohydrate' => ['max:255', 'string',],
        ]);
        $request['user_id'] = Auth::user()->id;

        $food = Food::create($request->all());
        return ((new FoodResource($food->loadMissing('user')))->additional([
            'meta' => [
                'code' => 200,
                'status' => 'Success',
                'message' => "Success"
            ],
        ]));
    }

    // Show detail data
    public function show($id)
    {
        $food = Food::findOrFail($id);
        return ((new FoodResource($food->loadMissing('user')))->additional([
            'meta' => [
                'code' => 200,
                'status' => 'Success',
                'message' => "Success"
            ],
        ]));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'food_name' => ['max:100', 'string',],
            'calories' => ['max:255', 'string',],
            'glucose' => ['max:255', 'string',],
            'fat' => ['max:255', 'string',],
            'cholesterol' => ['max:255', 'string',],
            'protein' => ['max:255', 'string',],
            'carbohydrate' => ['max:255', 'string',],
        ]);
        $food = Food::findOrFail($id);
        $food->update($request->all());
        return ((new FoodResource($food->loadMissing('user')))->additional([
            'meta' => [
                'code' => 200,
                'status' => 'Success',
                'message' => "Success"
            ],
        ]));
    }

    // Delete Data By Id
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        $data = [
            'status' => true,
            'message' => 'Data deleted successfully',
        ];
        return response()->json($data);
    }
}
