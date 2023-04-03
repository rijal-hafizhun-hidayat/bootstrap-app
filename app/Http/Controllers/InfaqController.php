<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InfaqModel;

class InfaqController extends Controller
{
    public function index(){
        return Inertia::render('Infaq/Index', [
            'infaqs' => InfaqModel::all()
        ]);
    }

    public function create(){
        return Inertia::render('Infaq/Create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'nomor_hp' => 'required|numeric|min_digits:10|max_digits:12',
            'rekening' => 'required|string',
            'jumlah' => 'required|numeric'
        ]);

        InfaqModel::create($request->all());

        return redirect()->route('infaq')->with('message', 'tambah data infaq berhasil');
    }

    public function destroy($id){
        InfaqModel::destroy($id);

        return redirect()->route('infaq')->with('message', 'hapus data infaq berhasil');
    }
}
