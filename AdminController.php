<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ],[
            'email.required'=>'Must Fill The Email',
            'password.required'=>'Must Fill The Password',

        ]);
        $admin = Admin::where('email', $request->email)->first();

      
        if ($admin && md5($request->password) === $admin->password) {
      
            Auth::login($admin);
            return redirect('/dashboard')->with('success', 'Login successful');
        } else {
            return redirect('/login')->withErrors(['loginError' => 'Invalid email or password'])->withInput();
    }
}
} 
