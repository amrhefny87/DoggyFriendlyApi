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
    
    public function createLikeDog (Request $request) {
        $like = LikeDog::create([
            "post_id" => $request->id,
            "user_id" => User::find(Auth::id())->id
        ]);
        // $like->save();
        return response()->json(LikeDog::all(), 200);
    }

    // public function showMyLikes ($id) {
    //     //$likes = LikeDog::find($id);
    //     //$likes = LikeDog::where('user_id',"=",User::find(Auth::id())->id);
    //     $likes = LikeDog::where('user_id',"=",$id);
    //     return response()->json($likes, 200);

    // }

    public function showMyLikes ($id) {
        //$likes = LikeDog::find($request->id);
        $likes = LikeDog::where('post_id',"=",$id)->count();
        //     $likes = LikeDog::where('user_id',"=",$id);
        return response()->json($likes, 200);
    
    }

    public function deleteLikeDog($id) {
        LikeDog::where('post_id',"=",$id)->where('user_id',"=",User::find(Auth::id())->id)->delete();

        return response()->json(LikeDog::all(), 200);
    }

}
