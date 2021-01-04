@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div>
        <h1> Create Post </h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label for="title"> Title </label>
                <input type="text" name="title" id="title" value="{{ old('title' )}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description"> Description </label>
                <textarea type="text" name="description" id="description">{{ old('description' )}}</textarea>
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

