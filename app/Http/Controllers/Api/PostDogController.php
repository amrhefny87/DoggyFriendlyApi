<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostDog;
use Illuminate\Http\Request;

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

        $post = PostDog::create([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $request->image,
            

        ]);
        $post->save();
        return response()->json(PostDog::all(), 200);
        
    }
}
