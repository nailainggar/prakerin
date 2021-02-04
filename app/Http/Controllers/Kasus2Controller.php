<?php

namespace App\Http\Controllers;

use App\Models\Kasus2;
use App\Models\Rw;
use Illuminate\Http\Request;
use App\Http\Controller\DB;

class Kasus2Controller extends Controller
{
    public function index()
    {
        $kasus2 = Kasus2::with('rw.desa.kecamatan.kota.provinsi')->orderBy('id','DESC')->get();
        // dd($kasus2);
        return view('admin.kasus2.index',compact('kasus2'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('admin.kasus2.create',compact('rw'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'positif' => 'required|unique:kasus2s',
            'sembuh' => 'required|unique:kasus2s',
            'meninggal' => 'required|unique:kasus2s',
            'tanggal' => 'required|unique:kasus2s',
        ]);
        $kasus2 = new kasus2();
        $kasus2->id_rw = $request->id_rw;
        $kasus2->positif = $request->positif;
        $kasus2->sembuh = $request->sembuh;
        $kasus2->meninggal = $request->meninggal;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->save();
        return redirect()->route('kasus2.index');
    }

    public function show($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        return view('admin.kasus2.show',compact('kasus2'));
    }


    public function edit($id)
    {
        $rw = Rw::all();
        $kasus2 = Kasus2::findOrFail($id);
        return view('admin.kasus2.edit',compact('kasus2','rw'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'positif' => 'required',
            'sembuh' => 'required',
            'meninggal' => 'required',
            'tanggal' => 'required',
        ]);
        $kasus2 = Kasus2::findOrFail($id);
        $kasus2->id_rw = $request->id_rw;
        $kasus2->positif = $request->positif;
        $kasus2->sembuh = $request->sembuh;
        $kasus2->meninggal = $request->meninggal;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->save();
        return redirect()->route('kasus2.index');
    }

    public function destroy($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $kasus2->delete();
        return redirect()->route('kasus2.index');
    }
}