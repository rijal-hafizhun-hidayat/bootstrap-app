<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AkunModel;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index(){
        // dd(AkunModel::select('id', 'name','username', 'role')->get());
        //dd(Auth::user());
        return Inertia::render('Akun/Index', [
            'akuns' => AkunModel::select('id', 'name','username', 'role')->latest()->get()
        ]);
    }

    public function create(){
        return Inertia::render('Akun/Create');
    }

    public function edit(){
        return Inertia::render('Akun/Edit');
    }

    public function store(Request $request){
       $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string',
            'role'      => 'required|integer',
            'password'  => 'required|string'
       ]);
    }
}
