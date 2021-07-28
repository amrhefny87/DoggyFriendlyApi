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
        return response()->json(LikeDog::all(), 200);
    }
    
    public function createLikeDog ($id) {
        $like = LikeDog::create([
            "post_id" => $id,
            "user_id" => User::find(Auth::id())->id
        ]);
        // $like->save();
        return response()->json(LikeDog::all(), 200);
    }


}
