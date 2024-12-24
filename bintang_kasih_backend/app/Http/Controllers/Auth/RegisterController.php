<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:users,nik',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }
}