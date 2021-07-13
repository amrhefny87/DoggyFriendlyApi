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
        $posts= PostSitter::all();
        return ($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postSitter  $postSitter
     * @return \Illuminate\Http\Response
     */
    public function show(postSitter $postSitter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postSitter  $postSitter
     * @return \Illuminate\Http\Response
     */
    public function edit(postSitter $postSitter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\postSitter  $postSitter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, postSitter $postSitter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postSitter  $postSitter
     * @return \Illuminate\Http\Response
     */
    public function destroy(postSitter $postSitter)
    {
        //
    }
}
