<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function loginForm() {
        $message = session('message');
        return inertia('auth/login',[
            'message' => $message,
        ]);
    }

    public function login(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = auth()->attempt($request->all());

        if($login)
            return redirect('/');
        else
            return back()->withErrors(['authentication'=>'Invalid name and/or password.']);
    }

    public function registerForm() {
        return inertia('auth/register');
    }

    public function register(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // session()->flash('message', 'Your account has been created successfully');
        return redirect('/login')->with('message', 'Your account has been created successfully');
    }

    public function logout() {
        auth()->logout();
        return redirect('/login');
    }
}
