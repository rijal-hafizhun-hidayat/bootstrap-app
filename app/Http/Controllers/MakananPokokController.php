<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MakananPokokModel;

class MakananPokokController extends Controller
{
    public function index(){
        return Inertia::render('Makanan-Pokok/Index', [
            'makananPokoks' => MakananPokokModel::all()
        ]);
    }

    public function create(){
        return Inertia::render('Makanan-Pokok/Create');
    }

    public function store(Request $request){
        MakananPokokModel::create($request->all());

        return redirect()->route('makanan-pokok')->with('message', 'tambah makanan pokok berhasil');
    }

    public function destroy($id){
        MakananPokokModel::destroy($id);

        return redirect()->route('makanan-pokok')->with('message', 'hapus makanan pokok berhasil');
    }
}
