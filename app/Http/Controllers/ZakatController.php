<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\MakananPokokModel;
use App\Models\ZakatModel;
use Carbon\Carbon;

class ZakatController extends Controller
{
    public function index(){
        $zakats = DB::table('zakat')
            ->join('makanan_pokok', 'zakat.makanan_pokok_id', '=', 'makanan_pokok.id')
            ->select('zakat.id', 'zakat.nama_donatur', 'zakat.jenis_zakat', 'makanan_pokok.nama', 'zakat.jumlah', 'zakat.created_at', 'zakat.updated_at')
            ->get();
        
        $value = $this->changeDate($zakats);

        return Inertia::render('Zakat/Index', [
            'zakats' => $value
        ]);
    }

    public function create(){
        return Inertia::render('Zakat/Create', [
            'makananPokoks' => MakananPokokModel::all()
        ]);
    }

    public function edit($id){
        return Inertia::render('Zakat/Edit', [
            'zakat' => ZakatModel::find($id),
            'makananPokoks' => MakananPokokModel::all()
        ]);
    }

    public function store(Request $request){
        ZakatModel::create($request->all());

        return redirect()->route('zakat')->with('message', 'tambah data zakat berhasil');
    }

    public function update(Request $request, $id){
        ZakatModel::where('id', $id)->update($request->all());

        return redirect()->route('zakat')->with('message', 'update data zakat berhasil');
    }

    public function destroy($id){
        ZakatModel::destroy($id);

        return redirect()->route('zakat')->with('message', 'hapus data zakat berhasil');
    }

    private function changeDate($zakats){
        for ($i=0; $i < sizeof($zakats); $i++) {
            $zakats[$i]->created_at = Carbon::parse(date("Y-m-d",strtotime($zakats[$i]->created_at)))->translatedFormat('d F Y');
            $zakats[$i]->updated_at = Carbon::parse(date("Y-m-d",strtotime($zakats[$i]->updated_at)))->translatedFormat('d F Y');
        };

        return $zakats;
    }
}
