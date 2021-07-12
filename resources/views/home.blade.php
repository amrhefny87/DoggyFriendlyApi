@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div>
            <ul>
                <li>{{$post->id}}</li>
                <li>{{$post->title}}</li>
                <li>{{$post->description}}</li>
                <li>{{$post->date}}</li>
                <li>{{$post->name}}</li>
                <li>{{$post->comments}}</li>
                <li>{{$post->image}}</li>
                <li>{{$post->isSitter}}</li>
            </ul>
        </div>
        
    @endforeach
</div>
@endsection
