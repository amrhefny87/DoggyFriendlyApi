<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\PostSitter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

            "user_id" => User::find(Auth::id())->id
            

        ]);

        if ($request->hasFile('image')){
            $post['image'] = $request->file('image')->store('img', 'public');
        }

        $post->save();

        return response()->json(PostSitter::all(), 200);
        
    }

    public function edit (Request $request, $id) 
    {
        if ($request->hasFile('image')){
            $event = PostSitter::findOrFail($id);
            Storage::delete('public/'.$event->image);
            $newImage = $request->file('image')->store('img', 'public');
        }
        
        $post = PostSitter::whereId($id);
    
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $newImage,
        ]);
        return response()->json(PostSitter::all(), 200);
    }

    public function destroy($id)
    {
        PostSitter::find($id)->delete();
        return response()->json(PostSitter::all(), 200);
    }

    public function myPostsSitters(){

        $user=auth()->user();
    
        $myPostsSitters = $user->postSitters;

        return response()->json($myPostsSitters, 200);
        
    }
    
}
