<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('home', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createImages');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $post = Post::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "date"=>$request->date,
            "name"=>$request->name,
            "comments"=>$request->comments,
            "image"=>$request->image,

        ]);

        if ($request->hasFile('image')){
            $post['image'] = $request->file('image')->store('img', 'public');
        }

        
        $post->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        
        if ($request->hasFile('image')){
            $event = Post::findOrFail($id);
            //Storage::delete('public/'.$event->image);
            $post['image'] = $request->file('image')->store('img', 'public');
        }
        
        $post = Post::whereId($id);
        
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $request->image,
        ]);
        
    
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('home');
    }

    public function myPosts($id){
        $user = Auth::findOrFail($id);
        $myPosts = $user->post;


        //buscar en la lista de los eventos aquellos id que coincidan con el id del evento del user loggeado.

        return view('myPosts', ["myPosts" => $myPosts, "user" => $user]);

        
    }
}


