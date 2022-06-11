<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function dashboard(){
        $auth_user = Auth::user();
        return Inertia::render('Admin/Dashboard',['auth_user',$auth_user]);
    }

    public function showLogin(){
        return Inertia::render('Admin/Login');
    }

    public function login(Request $request){
        $credential = $request->only('email','password');
        if (Auth::attempt($credential)){
//            if success
            $user = Auth::user();
            if ($user->role == 'admin'){
//                if admin
                return Inertia::render('Admin/Dashboard')->with('success',"Welcome to admin dashboard!");
            }else{
//                if not admin
                return redirect('admin/login')->with('error','You are not admin!');
            }
        }else{
//            if fails
            return redirect()->back()->with('error','Something went Wrong!');
        }
    }
}
