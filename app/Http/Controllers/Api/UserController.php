<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\LikeDog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
            'image' => "https://us.123rf.com/450wm/glebstock/glebstock1507/glebstock150700212/42190907-silueta.jpg?ver=6",
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

    public function index() {
        return response()->json(User::all(), 200);
    }
    
    public function edit_profile (Request $request, $id) {
        $id = User::find(Auth::id())->id;
        $user = User::find(Auth::id());
        
        
        $user->update([
            "name" => $request->name,
            "password" => $request->password,
            "image" => $request->image,
            "direction" => $request->direction,
            "pet_name" => $request->pet_name,
            "about_us" => $request->about_us,
        ]);
        return response()->json(User::all(), 200);
    }

    public function show($id) {
        $user = User::find($id);

        return response()->json($user, 200);
    }

    public function authuser(Request $request){
        //$user = $request->user();
        $user=auth()->user();
        return response()->json([
            'id'=> $user->id,
            'name'=> $user->name,
            'password'=> $user->password,
            'email'=>$user->email,
            'image'=> $user->image,
            'direction'=> $user->direction,
            'pet_name'=> $user->pet_name,
            'about_us'=> $user->about_us,
        ], 200);
    }
    public function upload(Request $request) {
        try{
            if($request->hasFile("image")) {
                $file = $request->file("image")->store("img", "public");
                return $file;
            }
        }catch(\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }
}
