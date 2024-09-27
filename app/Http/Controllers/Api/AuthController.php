<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function logout(Request $request)
    {
        // รับผู้ใช้ที่ยืนยันตัวตนแล้ว
        $user = Auth::user();

        // ลบหรือเพิกถอน Token ทั้งหมดของผู้ใช้
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out and revoked the token'
        ], 200);
    }
}
