@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($myPosts as $post)
        <div>
            <ul>
                <li>{{$post->id}}</li>
                <li>{{$post->title}}</li>
                <li>{{$post->description}}</li>
                <li>{{$post->date}}</li>
                <li>{{$post->name}}</li>
                <li>{{$post->comments}}</li>
                <li><img src="{{ asset('storage').'/'.$post->image }}" width="100" alt=""></li>
                <a href="{{ route('delete',['id'=>$post->id]) }}">Delete</a>
            </ul>

        </div>

    @endforeach
</div>
@endsection