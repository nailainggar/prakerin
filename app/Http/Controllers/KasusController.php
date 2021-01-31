<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Rw;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasus= Kasus::with('rw')->get();
        return view('admin.kasus.index' , compact('kasus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view('admin.kasus.create' , compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'positif' => 'required|unique:kasus',
            'sembuh' => 'required|unique:kasus',
            'meninggal' => 'required|unique:kasus',
            'tanggal' => 'required|unique:kasus',
        ]);
        $kasus= new Kasus();
        $kasus->id_rw = $request->id_rw;
        $kasus->positif = $request->positif;
        $kasus->sembuh = $request->sembuh;
        $kasus->meninggal= $request->meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['success'=>'Data <b>', $kasus->positif, $kasus->sembuh, $kasus->meninggal,  $kasus->tanggal, '</b>berhasil diinput']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus= Kasus::findOrFail($id);
        return view('admin.kasus.show', compact('kasus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw= Rw::all();
        $kasus = Kasus::findOrFail($id);
        return view('admin.kasus.edit', compact('rw' , 'kasus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $validate = $request->validate([
            'positif' => 'required|unique:kasus',
            'sembuh' => 'required|unique:kasus',
            'meninggal' => 'required|unique:kasus',
            'tanggal' => 'required|unique:kasus',
        ]);
        $kasus= new Kasus();
        $kasus->id_rw = $request->id_rw;
        $kasus->positif = $request->positif;
        $kasus->sembuh = $request->sembuh;
        $kasus->meninggal = $request->meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['success'=>'Data <b>', $kasus->positif, $kasus->sembuh, $kasus->meninggal,  $kasus->tanggal, '</b>berhasil diedit']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->delete();
        return redirect()->route('kasus.index')->with(['success'=>'Data <b>', $kasus->positif, $kasus->sembuh, $kasus->meninggal,  $kasus->tanggal, '</b>berhasil dihapus']);
    
    }
}
