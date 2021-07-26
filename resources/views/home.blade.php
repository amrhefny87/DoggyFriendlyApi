@extends('layouts.app')

@section('content')
<div class="container">
<div><p>hola</p></div>
    @foreach ($posts ?? '' as $post)
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
                <a href="{{ route('delete',['id'=>$post->id]) }}">Delete</a>
            </ul>

        </div>

    @endforeach
    
</div>
@endsection
