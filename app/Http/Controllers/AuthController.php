<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function registerpost(Request $request){

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(50)
        ]);

        return redirect()->route('login')->with('success', 'Register Data Successfully');
    }

    public function loginpost(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('indexdashboard');
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credential');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
