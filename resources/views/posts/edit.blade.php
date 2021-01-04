@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div>
        <h1> Edit Post </h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title"> Title </label>
                <input type="text" name="title" id="title" value="{{ $post->title }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description"> Description </label>
                <textarea type="text" name="description" id="description">{{ $post->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>       
            <div>
                <button type="submit"> Submit </button>
            </div>    
        </form>
    </div>
@endsection

