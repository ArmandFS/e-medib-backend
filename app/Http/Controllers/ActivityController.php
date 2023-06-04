<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    // Get All Data 
    public function index()
    {
        $currentUserId =  Auth::user()->id;
        $activity = Activity::where('user_id', '=',  $currentUserId)->get();
        return ActivityResource::collection($activity->loadMissing('user:id,username'))->additional([
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
            'activity_name' => ['max:255', 'string',],
            'activity_desc' => ['string'],
            'met' => ['max:100'],
        ]);
        $request['user_id'] = Auth::user()->id;

        $activity = Activity::create($request->all());
        return ((new ActivityResource($activity->loadMissing('user')))->additional([
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
        $activity = Activity::findOrFail($id);
        // PANGGIL POLICY
        $this->authorize('view', $activity);
        return ((new ActivityResource($activity->loadMissing('user')))->additional([
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
        $activity = Activity::findOrFail($id);
        $this->authorize('view', $activity);

        $request->validate([
            'activity_name' => ['max:255', 'string',],
            'activity_desc' => ['string'],
            'met' => ['max:100'],
        ]);
        $activity->update($request->all());
        return ((new ActivityResource($activity->loadMissing('user')))->additional([
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
        $activity = Activity::findOrFail($id);
        $this->authorize('view', $activity);
        $activity->delete();
        $data = [
            'status' => true,
            'message' => 'Data deleted successfully',
        ];
        return response()->json($data);
    }
}
