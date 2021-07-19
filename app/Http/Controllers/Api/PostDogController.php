<?php

namespace App\Http\Controllers\Api;

use App\Models\PostDog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
