<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\PostDog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostDogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PostDog::all(), 200);
    }

    public function create(Request $request)
    {
        //$user = User::find(Auth::id());

        $post = PostDog::create([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $request->image,
            "user_id" => User::find(Auth::id())->id

        ]);

        $post->save();
        return response()->json(PostDog::all(), 200);
        
    }

    public function edit (Request $request, $id) {
        $post = PostDog::whereId($id);
        
        
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $request->image,
        ]);
        return response()->json(PostDog::all(), 200);
    }

    public function destroy($id)
    {
        PostDog::find($id)->delete();
        return response()->json(PostDog::all(), 200);
    }
}
