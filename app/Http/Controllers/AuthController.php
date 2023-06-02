<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // MEALUKAN VALIDATION FORM HARUS TERSISI
        $request->validate([
            'nama_lengkap' => ['required', 'max:255'],
            'username' => ['required', 'max:100',  Rule::unique(User::class)],
            'nik' => ['max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'tanggal_lahir' => ['max:100', 'string'],
            'jenis_kelamin' => ['max:100', 'string'],
            'tinggi_badan' => ['max:100', 'string'],
            'berat_badan' => ['max:100', 'string'],
            'jenis_alergi' => ['string'],
            'riwayat_penyakit' => ['string'],
            'password' => ['required', 'min:4', 'max:255'],
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'nik' => $request->nik,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jenis_alergi' => $request->jenis_alergi,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'password' =>  bcrypt($request->password),
        ]);

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'Success',
                'message' => "Success"
            ],
            'data' => $user,
        ], 200);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:4', 'max:255'],
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['Username yang dimasukan salah.'],
                'password' => ['Password yang dimasukan salah.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'Success',
                'message' => "Success"
            ],
            'data' => $user,
            'access_token' => [
                'token' => $token,
                'token_type' => 'Bearer',
            ],
        ], 200);
    }

    // Logout
    public function logout(Request $request)
    {
        // Revoke a specific token...
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'data' => [],
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => "Successfully logout"
            ],
        ], 200);
    }

    public function accountData()
    {
        $currentUserId =  Auth::user()->id;
        $userData = User::findOrFail($currentUserId);
        return response()->json([
            'data' => $userData,
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => "Success"
            ],
        ], 200);
    }
}
