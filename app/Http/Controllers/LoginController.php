<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('employee');
        }

        return redirect('login')->with('error', 'Opps! You have entered invalid credentials');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
  
        return redirect('login')->with('success', 'Logout successfully.');
    }
}
