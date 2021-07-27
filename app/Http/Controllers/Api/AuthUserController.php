<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request){
        $user = $request->user();
        //$user=Auth::User();
        return response()->json([
            'id'=> $user->id,
            'name'=> $user->name,
            'email'=>$user->emaill,
            'image'=> $user->image,
            'direction'=> $user->direction,
            'pet_name'=> $user->pet_name,
            'about_us'=> $user->about_us,
        ], 200);
    }
}
