<?php

namespace App\Http\Controllers\Api;
use App\Models\Kasus2;
use App\Models\Provinsi;
use App\Models\Desa;
use App\Models\kecamatan;
use App\Models\RW;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
public function index(){
    $positif = DB::table('rws')
                ->select('kasus2s.positif',
                'kasus2s.sembuh', 'kasus2s.meninggal')
                ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                ->sum('kasus2s.positif');
    
    $sembuh = DB::table('rws')
                ->select('kasus2s.positif',
                'kasus2s.sembuh', 'kasus2s.meninggal')
                ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                ->sum('kasus2s.sembuh');

    $meninggal = DB::table('rws')
                ->select('kasus2s.positif',
                'kasus2s.sembuh', 'kasus2s.meninggal')
                ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                ->sum('kasus2s.meninggal');


    $res = [
        'success' => true,
        'data' => 'Data Kasus Indonesia',
        'positif' => $positif,
        'sembuh' => $sembuh,
        'meninggal' => $meninggal,
        'message' => 'Data Kasus Ditampilkan'
    ];
    return response()->json($res,200);
}
  public function provinsi($id){
    $positif = DB::table('provinsis')
    ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
    ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
    ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_desa', '=', 'desas.id')
    ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
    ->select('kasus2s.positif')
    ->where('provinsis.id',$id)
    ->sum('kasus2s.positif');

     $sembuh = DB::table('provinsis')
     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
     ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
     ->join('rws', 'rws.id_desa', '=', 'desas.id')
     ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
     ->select('kasus2s.sembuh')
     ->where('provinsis.id',$id)
     ->sum('kasus2s.sembuh');

     $meninggal = DB::table('provinsis')
     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
     ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
     ->join('rws', 'rws.id_desa', '=', 'desas.id')
     ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
     ->select('kasus2s.meninggal')
     ->where('provinsis.id',$id)
     ->sum('kasus2s.meninggal');

     $provinsi = Provinsi::whereId($id)->first();

    $res = [
        'success' => true,
        'nama_provinsi' => $provinsi['nama_provinsi'],
        'positif' => $positif,
        'sembuh' => $sembuh,
        'meninggal' => $meninggal,
        'message' => 'Data Berhasil DItampilkan'
    ];
    return response()->json($res, 200);
}

public function provinsikasus(){
    $var = DB::table('provinsis')
    ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
    ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
    ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_desa', '=', 'desas.id')
    ->join('kasus2s', 'kasus2s.id_rw', 'rws.id')
    ->select('nama_provinsi',
        DB::raw('sum(kasus2s.positif) as Positif'),
        DB::raw('sum(kasus2s.sembuh) as sembuh'),
        DB::raw('sum(kasus2s.meninggal) as meninggal'),
    )
    ->groupBy('nama_provinsi')
    ->get();

$data = [
    'status' => true,
    'message' => 'Menampilkan Provinsi',
    'data' => $var,
];

return response()->json($data, 200);
}
}