<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
   public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:50'],
            'email'                 => ['required', 'email', 'unique:users,email'],
            'password'              => ['required', 'confirmed', Password::defaults()],           
        ]);

        $user = User::create([
            'name'               => $validated['name'],
            'email'              => $validated['email'],
            'password'           => $validated['password'], 
            'role'               => 'user',
            'is_enabled'         =>  true,
        ]);

        $token = $user->createToken('postman')->plainTextToken;

        return response()->json([
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 422);
        }

        $token = $user->createToken('postman')->plainTextToken;

        return response()->json([
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out from all devices']);
    }
}
