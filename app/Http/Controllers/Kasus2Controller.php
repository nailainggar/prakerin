<?php

namespace App\Http\Controllers;

use App\Models\Kasus2;
use App\Models\Rw;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class Kasus2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response<?php
     * namespace App\Http\Controller;
     * 
     * use App\Models\Rw;
     * use App\Models\Kasus;
     * use Illuminute\Http\Request;
     * use App\Http\Controllers\DB;
     * 
     * class KasusController extends Controller
     * {
     *  @return \Illuminate\Http\Response
     * }
     */
    public function index()
    {
       $kasus2= Kasus2::with('rw')->get();
        return view('admin.kasus2.index' , compact('kasus2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view('admin.kasus2.create' , compact('rw'));
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
            'positif' => 'required|unique:kasus2s',
            'sembuh' => 'required|unique:kasus2s',
            'meninggal' => 'required|unique:kasus2s',
            'tanggal' => 'required|unique:kasus2s',
        ]);
       $kasus2= new Kasus2();
       $kasus2->id_rw = $request->id_rw;
       $kasus2->positif = $request->positif;
       $kasus2->sembuh = $request->sembuh;
       $kasus2->meninggal= $request->meninggal;
       $kasus2->tanggal = $request->tanggal;
       $kasus2->save(); 
        return redirect()->route('kasus2.index')->with(['success'=>'Data <b>', $kasus2->positif, $kasus2->sembuh, $kasus2->meninggal, $kasus2->tanggal, '</b>berhasil diinput']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus $kasus2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $kasus2= Kasus2::findOrFail($id);
        return view('admin.kasus2.show', compact('kasus2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus $kasus2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw= Rw::all();
       $kasus2 = Kasus2::findOrFail($id);
        return view('admin.kasus2.edit', compact('rw' , 'kasus2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus $kasus2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'positif' => 'required|unique:kasus2s',
            'sembuh' => 'required|unique:kasus2s',
            'meninggal' => 'required|unique:kasus2s',
            'tanggal' => 'required|unique:kasus2s',
        ]);
       $kasus2=Kasus::findOrFail($id);
       $kasus2->id_rw = $request->id_rw;
       $kasus2->positif = $request->positif;
       $kasus2->sembuh = $request->sembuh;
       $kasus2->meninggal = $request->meninggal;
       $kasus2->tanggal = $request->tanggal;
       $kasus2->save();
        return redirect()->route('kasus2.index')->with(['success'=>'Data <b>', $kasus2->positif, $kasus2->sembuh, $kasus2->meninggal, $kasus2->tanggal, '</b>berhasil diedit']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus $kasus2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $kasus2 = Kasus2::findOrFail($id);
       $kasus2->delete();
       return redirect()->route('kasus2.index')->with(['success'=>'Data <b>', $kasus2->positif, $kasus2->sembuh, $kasus2->meninggal,  $kasus2->tanggal, '</b>berhasil dihapus']);
       
        }
    }
