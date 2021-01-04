@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        <h1> {{ $post->title }} </h1>
         <p>{{ $post->description }}</p>
        <a href="{{ route('posts.show', $post->id )}}/edit">
        Edit
        </a>        
        <form action="{{ route('posts.delete', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"> Delete </button>
        </form>
    </div>
@endsection

