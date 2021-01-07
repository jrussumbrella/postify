@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        <h1> {{ $post->title }} </h1>
         <p>{{ $post->description }}</p>
         <div>
            <p> {{ $post->favorites->count() }} </p>

            @auth    
            @if($post->isAlreadyLiked(auth()->user()))
                <form action="{{ route('posts.favorite', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> Unlove </button>
                </form>
            @else    
                <form action="{{ route('posts.favorite', $post->id) }}" method="POST">
                    @csrf
                    <button type="submit"> Love </button>
                </form>
            @endif
            @endauth
         </div>

        @can('update', $post)
            <a href="{{ route('posts.show', $post->id )}}/edit">
            Edit
            </a>
        @endcan

        @can('delete', $post)        
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"> Delete </button>
            </form>
        @endcan


    </div>
@endsection

