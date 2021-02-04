<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kasus2;

class ApiController extends Controller
{
    public function index()
    {
        $positif = DB::table('rws')
                   ->select('kasus2s.positif',
                            'kasus2s.sembuh',
                            'kasus2s.meninggal')
                   ->join('kasus2s','rws.id', '=' ,'kasus2s.id_rw')
                   ->sum('kasus2s.positif');
        $sembuh = DB::table('rws')
                   ->select('kasus2s.positif',
                            'kasus2s.sembuh',
                            'kasus2s.meninggal')
                   ->join('kasus2s','rws.id', '=' ,'kasus2s.id_rw')
                   ->sum('kasus2s.sembuh');
        $meninggal = DB::table('rws')
                   ->select('kasus2s.positif',
                            'kasus2s.sembuh',
                            'kasus2s.meninggal')
                   ->join('kasus2s','rws.id', '=' ,'kasus2s.id_rw')
                   ->sum('kasus2s.meninggal');

        $res = [
            'succes'           => true,
            'Data'             => 'Data Kasus Indonesia',
            'Jumlah Positif'   => $positif,
            'Jumlah Sembuh'    => $sembuh,
            'Jumlah Meninggal' => $meninggal,
            'message'          => 'Data Kasus Ditampilkan'
        ];

        return response()->json($res,200);
    }
    public function show($id)
    {
        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('desas','desas.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_desa','=','desas.id')
        ->join('kasus2s','kasus2s.id_rw','=','rws.id')
        ->where('provinsis.id',$id)
        ->select('nama_provinsi',
        DB::raw('sum(kasus2s.positif) as positif'),
        DB::raw('sum(kasus2s.sembuh) as sembuh'),
        DB::raw('sum(kasus2s.meninggal) as meninggal'))
        ->groupBy('nama_provinsi')
        ->get();

        $data = [
            'success' => true,
            'Data Provinsi' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
return response()->json($data,200);


    }

    
}