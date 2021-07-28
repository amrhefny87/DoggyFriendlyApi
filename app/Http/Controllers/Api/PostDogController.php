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

    public function edit (Request $request, $id) 
    {
        if ($request->hasFile('image')){
            $event = PostDog::findOrFail($id);
            Storage::delete('public/'.$event->image);
            $newImage = $request->file('image')->store('img', 'public');
        }
        
        $post = PostDog::whereId($id);
        
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "date" => $request->date,
            "name" => $request->name,
            "comments" => $request->comments,
            "image" => $newImage,
        ]);

        return response()->json(PostDog::all(), 200);
    }

    public function destroy($id)
    {
        PostDog::find($id)->delete();
        return response()->json(PostDog::all(), 200);
    }
    public function upload(Request $request) {
        try{
            if($request->hasFile("image")) {
                $file = $request->file("image")->store("img", "public");
                return $file;
            }
        }catch(\Exception $e){
            return response()->json([
                "message"=>$e->getMessage()
            ]);
        }
    }

    public function myPostsDogs(){

        //$user = auth()->user();
        $user = User::find(1);
    
        $myPostsDogs = $user->postDogs;

        return response()->json($myPostsDogs, 200);
        
    }

}
