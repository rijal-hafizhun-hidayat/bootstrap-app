<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AkunModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index(){
        return Inertia::render('Akun/Index', [
            'akuns' => AkunModel::select('id', 'name','username')->latest()->get()
        ]);
    }

    public function create(){
        return Inertia::render('Akun/Create');
    }

    public function edit($id){
        dd($id);
        return Inertia::render('Akun/Edit');
    }

    public function store(Request $request){
       $credential = $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string',
            'role'      => 'required|integer',
            'password'  => 'required|string'
       ]);

       $credential['password'] = Hash::make($request->password);

       AkunModel::create($credential);

       return redirect()->route('akun')->with('message', 'tambah akun berhasil');
    }

    public function destroy($id){
        AkunModel::find($id)->delete();

        return redirect()->route('akun')->with('message', 'hapus akun berhasil');
    }
}
