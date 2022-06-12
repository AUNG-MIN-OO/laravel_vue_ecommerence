<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showRegister(){
        return Inertia::render('User/Auth/Register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|max:13"
        ]);
        //create user
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        //Auth
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            return redirect('/')->with('success','Welcome '.$request->name);
        }
    }

    public function showLogin(){
        return Inertia::render('User/Auth/Login');
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        //Auth
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            return redirect('/')->with('success','Welcome '.$user->name);
        }else{
            return redirect()->back()->withErrors(['error'=>'Email or Password is wrong!']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
