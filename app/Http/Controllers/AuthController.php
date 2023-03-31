<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index(){
        //dd(Hash::make('admin'));
        return Inertia::render('Login/Index');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {

            //dd(Auth::id());
            $request->session()->regenerate();
            $request->session()->put('isLogin', true);
            $request->session()->put('id', Auth::id());
            //dd(session('id'));

            return redirect()->intended('home');  
        }

        return redirect()->route('login')->with('message', 'Username atau Password Salah');
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
