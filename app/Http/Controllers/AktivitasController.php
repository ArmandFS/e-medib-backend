<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentUserId =  Auth::user()->id;
        $queryParameter = $request->query('tingkat_aktivitas');
        $aktivitas = Aktivitas::query()->where('tingkat_aktivitas', 'LIKE', $queryParameter)->get();
        return response()->json([
            "data" => $aktivitas
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aktivitas $aktivitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aktivitas $aktivitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $user = User::findOrFail(auth()->id());
        $aktivitas = Aktivitas::findOrFail($id);

        $request->validate([
            'durasi' => ['max:255', 'string', 'required'],
            'berat_badan' =>  ['max:255', 'string', 'required'],
        ]);

        $kalori = (float)$aktivitas['met'] * 0.0175 * (float)$request['berat_badan'] * (float)$request['durasi'];
        $data = [
            "nama_aktivitas" => $aktivitas['nama_aktivitas'],
            "met" => $aktivitas['met'],
            "durasi" => $request['durasi'],
            "kalori" => round($kalori),
            "tingkat_aktivitas" => $aktivitas['tingkat_aktivitas'],
            "user_id" => $user['id']
        ];

        $aktivitas->update($data);

        return response()->json([
            "data" => $aktivitas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aktivitas $aktivitas)
    {
        //
    }
}
