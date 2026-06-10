<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Show login form
    public function showLogin()
    {
        return view('login');
    }

    //Show sign up form
    public function showSignup()
    {
        return view('signup');
    }

    //Handle user registration
    public function signup(Request $request)
    {
        //Validate form input
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:7|confirmed',
        ]);

        //Create new user with hashed password
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user',
        ]);

        Auth::login($user);
        return redirect()->route('login');
    }

    //Handle user login
    public function login(Request $request)
    {
        //Get email and password from request
        $credentials=$request->only('email','password');

        //Go to home page if successful
        if (Auth::attempt($credentials)){
            return redirect()->route('home');
        }

        //Feedback from system if failed
        return back()->withErrors(['login'=>'Invalid email or password']);
    }

    //Handle user logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); //Back to login page
    }
}
