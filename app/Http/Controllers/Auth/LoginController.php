<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');

    }
}
