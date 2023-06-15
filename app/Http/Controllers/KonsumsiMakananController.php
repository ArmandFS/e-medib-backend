<?php

namespace App\Http\Controllers;

use App\Models\KonsumsiMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsumsiMakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentUserId = Auth::user()->id;
        $queryParameter = $request->query('waktu_makan');
        $data = KonsumsiMakanan::query()->where('jenis_waktu_makan', 'LIKE', $queryParameter)->where('user_id', '=', $currentUserId)->get();
        return response()->json([
            "data" => $data,
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
            'makanan' => ['string', 'required'],
            'porsi' => ['string', 'required'],
            'kalori' => ['string', 'required'],
            'jenis_waktu_makan' => ['string', 'required'],
        ]);
        $request['user_id'] = Auth::user()->id;

        $konsumsi_makanan = KonsumsiMakanan::create($request->all());
        return response()->json(["data" => $konsumsi_makanan]);
    }

    /**
     * Display the specified resource.
     */
    public function show(KonsumsiMakanan $konsumsiMakanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KonsumsiMakanan $konsumsiMakanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KonsumsiMakanan $konsumsiMakanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KonsumsiMakanan $konsumsiMakanan)
    {
        //
    }
}
