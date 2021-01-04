@extends('layouts.app')

@section('title', 'Register')

@section('content')
  <div>
    <h1> Register </h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name"> Name </label>
            <input type="text" name="name" id="name" value="{{ old('name' )}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email"> Email </label>
            <input type="email" name="email" id="email" value="{{ old('email' )}}" >
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password"> Password </label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit"> Register </button>
        </div>
    </form>
  </div>
@endsection