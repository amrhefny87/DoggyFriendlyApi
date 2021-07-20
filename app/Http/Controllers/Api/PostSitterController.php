<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostSitter;
use Illuminate\Http\Request;

class PostSitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PostSitter::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $post = PostSitter::create([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $request->image,
            

        ]);
        $post->save();
        return response()->json(PostSitter::all(), 200);
        
    }

    public function edit (Request $request, $id) {
        $post = PostSitter::whereId($id);
    
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $request->image,
        ]);
        return response()->json(PostSitter::all(), 200);
    }

    public function destroy($id)
    {
        PostSitter::find($id)->delete();
        return response()->json(PostSitter::all(), 200);
    }
    
}
