<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register (Request $request) {
        $fields = $request->validate([
            'name' =>'required|string',
            'email' => 'required|string|unique:users,email',
            'password'=> 'required|string|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,

        ];

        return response($response, 201);
    }

    public function login (Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password'=> 'required|string',
        ]);

        //Check email
        $user = User::where('email', $fields['email'])->first();

        //Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'mensage' => 'Error'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response, 201);
    }

    public function logout (Request $request) {
        
        auth()->user()->tokens()->delete();

        return [
            'message' => "logged out"
        ];

    }
}
