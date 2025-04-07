<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login (Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt($request->only('email','password'))){
            $user=Auth::user();
            //delete previous token
            $user->tokens()->delete();
            $token=$user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login Successfull',
                'token' => $token,
                'user' => $user,
            ]);
        }

        return response()-> json(['message'=> 'Invalid credentials'],401);
    }
}
