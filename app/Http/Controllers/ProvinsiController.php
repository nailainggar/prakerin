<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index',compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.create');
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
            'kode_provinsi' => 'required|unique:provinsis',
            'nama_provinsi' => 'required|unique:provinsis',
        ]);

        $provinsi = new Provinsi();
        $provinsi ->kode_provinsi = $request->kode_provinsi;
        $provinsi ->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['success'=>'Data <b>',$provinsi->nama_provinsi,'</b> berhasil diinput']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_provinsi' => 'required',
            'nama_provinsi' => 'required',
        ]);
        $provinsi = Provinsi::findOrFail($id);
        $provinsi ->kode_provinsi = $request->kode_provinsi;
        $provinsi ->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['success'=>'Data <b>',$provinsi->nama_provinsi,'</b> berhasil diinput']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with(['success'=>'Data <b>',$provinsi->nama_provinsi,'</b> berhasil dihapus']);
   
    }
}
