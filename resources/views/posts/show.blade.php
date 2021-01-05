@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        <h1> {{ $post->title }} </h1>
         <p>{{ $post->description }}</p>

        @can('update', $post)
            <a href="{{ route('posts.show', $post->id )}}/edit">
            Edit
            </a>
        @endcan

        @can('delete', $post)        
            <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"> Delete </button>
            </form>
        @endcan

    </div>
@endsection

