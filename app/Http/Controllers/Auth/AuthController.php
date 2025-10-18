<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Registered Successfully'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','string','emai;'],
            'password' => ['required','string','min:8']
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password) ) {
            return response()->json(['message' => 'Incorrect Credentials'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Logged In Successfully',
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {

    }
}
