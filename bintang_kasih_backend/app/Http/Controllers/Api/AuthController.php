<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register function
    public function register(Request $request)
    {
        // Valiator
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:16|unique:users,nik',
            'nickName' => 'required|string',
            'password' => 'required|string|min:8',
            'cPassword' => 'required|string|same:password'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['nik'] = $user->nik;
        $success['nickName'] = $user->nickName;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User Succesfull Registered'
        ];

        return response()->json(['message' => 'User registered successfully']);
    }

    // Login function
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('nik', $request->nik)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'nik' => ['NIK atau password tidak sesuai.'],
            ]);
        }

        // Buat token untuk user
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'nik' => $user->nik,
            'nickName' => $user->nickName,
            'token' => $token,
            'roles' => $user->roles,
            'message' => 'User Login Succesfull'
        ]);
    }

    // Logout function
    public function logout(Request $request)
    {
        // Hapus semua token pengguna yang sedang login
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
