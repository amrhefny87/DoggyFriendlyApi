<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\PostDog;
use App\Models\PostSitter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\LikeDog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LikeDogController extends Controller
{
    public function index() {
        return response()->json(User::all(), 200);
    }
    
    public function likePostDog ($id) {
        $like = LikeDog::create([
            'post_id' => 2,
            "user_id" => 1
        ]);
        return response()->json(['message"=>"created like'], 200);
    }
}
