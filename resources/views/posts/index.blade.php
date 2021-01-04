@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        <h1> Posts </h1>
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}">
                    {{ $post->title }}
                    </a>
                </li>   
            @endforeach
        </ul>

        <div>
          {{ $posts->links() }}
        </div>
    </div>
@endsection

