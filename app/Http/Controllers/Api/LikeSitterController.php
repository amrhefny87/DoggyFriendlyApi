<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\PostDog;
use App\Models\PostSitter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\LikeSitter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LikeSitterController extends Controller
{
    public function index() {
        return response()->json(LikeSitter::all(), 200);
    }
    
    public function createLikeSitter (Request $request) {
        $like = LikeSitter::create([
            "post_id" => $request->id,
            "user_id" => User::find(Auth::id())->id
        ]);
        
        return response()->json(LikeSitter::all(), 200);
    }

    

    public function showMyLikes ($id) {
        
        $likes = LikeSitter::where('post_id',"=",$id)->count();
        return response()->json($likes, 200);
    
    }

    public function deleteLikeSitter($id) {
        LikeSitter::where('post_id',"=",$id)->where('user_id',"=",User::find(Auth::id())->id)->delete();

        return response()->json(LikeSitter::all(), 200);
    }
}
