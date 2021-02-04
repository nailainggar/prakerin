<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kota;
use Illuminate\Support\Facades\DB;
use Validator; 

class KotaController extends Controller
{
    
    public function index()
    {
        $kota =Kota::latest()->get();
        $kot = [
            'success' => true,
            'data'    => $kota,
            'message' => 'Data kota Ditampilkan'
        ];
        return response()->json($kot, 200);
    }

   
    // public function create()
    // {
        
    // }

   
    public function store(Request $request)
    {
        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();

        $kot = [
            'success' => true,
            'data'    => $kota,
            'message' => 'Data berhasil di tambah'
        ];
        return response()->json($prov, 200);
    }

    
    public function show($id)
    {
        $kota= Kota::whereId($id)->first();
        if ($kota) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Kota',
                'data'    => $kota
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'kotaTidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
        return response()->json($kota, 200);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_kota' => 'required',
            'nama_kota' => 'required',
        ],[
            'kode_kota.required' => "Mohon Masukan Kode kota",
            'nama_kota.required' => "Mohon Masukan Nama kota",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors(),
                'message' => 'silakan isi bidang yang kosong',
            ], 400);
        }else {
            $kota= Kota::whereId($id)->update([
                'kode_kota' => $request->kode_kota,
                'nama_kota' => $request->nama_kota,
            ]);

            if ($kota) {
                return response()->json([
                    'success' => true,
                    'message' => 'data berhasil diUpdate!',
                ], 200); 
            }else{
               return response()->json([
                    'success' => false,
                    'message' => 'data gagal diUpdate!',
               ], 500); 
            }
        }
    }

    
    public function destroy($id)
    {
        $kota= Kota::findOrFail($id);
        $kota->delete();

        if ($kota) {
            return response()->json([
                'success' => true,
                'message' => 'data berhasil dihapus!',
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal dihapus',
            ], 500);
        }
    }
    }