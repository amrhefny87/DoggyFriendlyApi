<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\PostDog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        if ($request->hasFile('image')){
            $post['image'] = $request->file('image')->store('img', 'public');
        }


        $post->save();
        //$user=User::find(Auth::id())->id;
        return response()->json(PostDog::all(), 200);
        //return ($user);
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

        if ($request->hasFile('image')){
            $post['image'] = $request->file('image')->store('img', 'public');
        }
        
        return response()->json(PostDog::all(), 200);
    }

    public function destroy($id)
    {
        PostDog::find($id)->delete();
        return response()->json(PostDog::all(), 200);
    }

    public function myPosts($id){
        $user = User::find($id);
        $myPostsDogs = $user->postDogs;

        return response()->json($myPostsDogs, 200);
        
    }
}
