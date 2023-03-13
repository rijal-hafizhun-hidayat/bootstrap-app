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
        // $items = AkunModel::select('id', 'name','username')->latest()->paginate(2)->through(function($item){
        //     return [
        //         'id' => $item->id,
        //         'name' => $item->name,
        //         'username' => $item->username
        //     ];
        // });
        //dd(AkunModel::select('id', 'name','username')->latest()->paginate(2));
        return Inertia::render('Akun/Index', [
            'akuns' => AkunModel::select('id', 'name','username')->latest()->get()
            //'akuns' => $items
        ]);
    }

    public function create(){
        return Inertia::render('Akun/Create');
    }

    public function edit($id){
        return Inertia::render('Akun/Edit', [
            'akuns' => AkunModel::select('id', 'name', 'username', 'role')->find($id)
        ]);
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

    public function update(Request $request ,$id){
        AkunModel::where('id', $id)->update($request->all());

        return redirect()->route('akun')->with('message', 'edit akun berhasil');
    }
}
