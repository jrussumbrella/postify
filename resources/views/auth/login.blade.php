@extends('layouts.app')

@section('title', 'Log In')

@section('content')
  <div>
    <h1> Log In </h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
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
            <button type="submit"> Log In </button>
        </div>
    </form>
  </div>
@endsection