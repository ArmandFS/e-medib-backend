<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use ImageKit\ImageKit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DiaryResource;
use App\Models\User;

class DiaryController extends Controller
{
    // Get All Data 
    public function index()
    {
        $currentUserId =  Auth::user()->id;
        $diary = Diary::where('user_id', '=',  $currentUserId)->get();
        return DiaryResource::collection($diary->loadMissing('user:id,username'))->additional([
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
        $user = User::findOrFail(auth()->id());
        $request->validate([
            'calory_intake' => ['max:255', 'string',],
            'blood_sugar' => ['max:255', 'string',],
            'blood_presure' => ['max:255', 'string',],
            'injury_img_file' => ['image', 'mimes:jpg,jpeg,bmp,png'],
            'injury_desc' => ['max:255', 'string',],
            'temperature' => ['max:255', 'string',],
            'last_visit' => ['max:255', 'string',],
            'diary' => [],
        ]);
        $request['user_id'] = Auth::user()->id;

        $imageKit = new ImageKit(
            env('IMAGEKIT_PUBLIC_KEY'),
            env('IMAGEKIT_PRIVATE_KEY'),
            env('IMAGEKIT_ENDPOINT_URL'),
        );
        $image = base64_encode(file_get_contents($request->file('injury_img_file')));
        $uploadImage = $imageKit->uploadFile(
            [
                'file' => $image,
                'fileName' => $user->email,
                'folder' => '/e-medib/injury-images'
            ]
        );
        $imageUrl = $uploadImage->result->url;
        $request['injury_img'] = $imageUrl;

        $diary = Diary::create($request->all());
        return ((new DiaryResource($diary->loadMissing('user')))->additional([
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
        $diary = Diary::findOrFail($id);
        // PANGGIL POLICY
        $this->authorize('view', $diary);
        return ((new DiaryResource($diary->loadMissing('user')))->additional([
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
        $user = User::findOrFail(auth()->id());
        $diary = Diary::findOrFail($id);
        $this->authorize('update', $diary);

        $request->validate([
            'calory_intake' => ['max:255', 'string',],
            'blood_sugar' => ['max:255', 'string',],
            'blood_presure' => ['max:255', 'string',],
            'injury_img_file' => ['image', 'mimes:jpg,jpeg,bmp,png'],
            'injury_desc' => ['max:255', 'string',],
            'temperature' => ['max:255', 'string',],
            'last_visit' => ['max:255', 'string',],
            'diary' => [],
        ]);

        if ($request->hasFile('injury_img_file')) {
            $imageKit = new ImageKit(
                env('IMAGEKIT_PUBLIC_KEY'),
                env('IMAGEKIT_PRIVATE_KEY'),
                env('IMAGEKIT_ENDPOINT_URL'),
            );
            $image = base64_encode(file_get_contents($request->file('injury_img_file')));
            $uploadImage = $imageKit->uploadFile(
                [
                    'file' => $image,
                    'fileName' => $user->email,
                    'folder' => '/e-medib/injury-images'
                ]
            );
            $imageUrl = $uploadImage->result->url;
            $request['injury_img'] = $imageUrl;
        }

        $diary->update($request->all());
        return ((new DiaryResource($diary->loadMissing('user')))->additional([
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
        $diary = Diary::findOrFail($id);
        $this->authorize('delete', $diary);
        $diary->delete();
        $data = [
            'status' => true,
            'message' => 'Data deleted successfully',
        ];
        return response()->json($data);
    }
}
