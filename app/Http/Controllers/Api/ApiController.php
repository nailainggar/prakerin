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
use Http;

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

public function provinsi($id)
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
//   public function provinsi($id){
//     $positif = DB::table('provinsis')
//     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
//     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
//     ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
//     ->join('rws', 'rws.id_desa', '=', 'desas.id')
//     ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
//     ->select('kasus2s.positif')
//     ->where('provinsis.id',$id)
//     ->sum('kasus2s.positif');

//      $sembuh = DB::table('provinsis')
//      ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
//      ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
//      ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
//      ->join('rws', 'rws.id_desa', '=', 'desas.id')
//      ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
//      ->select('kasus2s.sembuh')
//      ->where('provinsis.id',$id)
//      ->sum('kasus2s.sembuh');

//      $meninggal = DB::table('provinsis')
//      ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
//      ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
//      ->join('desas', 'desas.id_kecamatan', '=', 'kecamatans.id')
//      ->join('rws', 'rws.id_desa', '=', 'desas.id')
//      ->join('kasus2s', 'kasus2s.id_rw', '=', 'rws.id')
//      ->select('kasus2s.meninggal')
//      ->where('provinsis.id',$id)
//      ->sum('kasus2s.meninggal');

//      $provinsi = Provinsi::whereId($id)->first();

//     $res = [
//         'success' => true,
//         'nama_provinsi' =>$provinsi['nama_provinsi'],
//         'positif' => $positif,
//         'sembuh' => $sembuh,
//         'meninggal' => $meninggal,
//         'message' => 'Data Berhasil DItampilkan'
//     ];
//     return response()->json($res, 200);
// }

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
public function kota()
{
    $tampil = DB::table('kotas')
    ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
    ->join('desas','desas.id_kecamatan','=','kecamatans.id')
    ->join('rws','rws.id_desa','=','desas.id')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->select('nama_kota','kode_kota',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_kota','kode_kota')
    ->get();

    $data = [
        'success' => true,
        'Data Kota' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}
public function kotaid($id)
{
    $tampil = DB::table('kotas')
    ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
    ->join('desas','desas.id_kecamatan','=','kecamatans.id')
    ->join('rws','rws.id_desa','=','desas.id')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->where('kotas.id',$id)
    ->select('nama_kota',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_kota')
    ->get();

    $data = [
        'success' => true,
        'Data Kota' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}

public function kecamatan()
{
    $tampil = DB::table('kecamatans')
    ->join('desas','desas.id_kecamatan','=','kecamatans.id')
    ->join('rws','rws.id_desa','=','desas.id')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->select('nama_kecamatan','kode_kecamatan',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_kecamatan','kode_kecamatan')
    ->get();

    $data = [
        'success' => true,
        'Data Kecamatan' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}
public function kecid($id)
{
    $tampil = DB::table('kecamatans')
    ->join('desas','desas.id_kecamatan','=','kecamatans.id')
    ->join('rws','rws.id_desa','=','desas.id')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->where('kecamatans.id',$id)
    ->select('nama_kecamatan',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_kecamatan')
    ->get();

    $data = [
        'success' => true,
        'Data Kota' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}

public function desa()
{
    $tampil = DB::table('desas')
    ->join('rws','rws.id_desa','=','desas.id')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->select('nama_desa','kode_desa',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_desa','kode_desa')
    ->get();

    $data = [
        'success' => true,
        'Data Desa' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}
public function desaid($id)
{
    $tampil = DB::table('desas')
    ->join('rws','rws.id_desa','=','desas.id')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->where('desas.id',$id)
    ->select('nama_desa',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_desa')
    ->get();

    $data = [
        'success' => true,
        'Data Kota' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}
public function rw()
{
    $tampil = DB::table('rws')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->select('nama_rw','kode_rw',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_rw','kode_rw')
    ->get();

    $data = [
        'success' => true,
        'Data Rw' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}
public function rwid($id)
{
    $tampil = DB::table('rws')
    ->join('kasus2s','kasus2s.id_rw','=','rws.id')
    ->where('rws.id',$id)
    ->select('nama_rw',
    DB::raw('sum(kasus2s.positif) as positif'),
    DB::raw('sum(kasus2s.sembuh) as sembuh'),
    DB::raw('sum(kasus2s.meninggal) as meninggal'))
    ->groupBy('nama_rw')
    ->get();

    $data = [
        'success' => true,
        'Data Rw' => $tampil,
        'message' => 'Data Kasus Di tampilkan'
    ];
return response()->json($data,200);


}
public function hari()
{

    $kasus2 = Kasus2::get('created_at')->last();
    $positif = Kasus2::where('tanggal', date('Y-m-d'))->sum('positif');
    $sembuh = Kasus2::where('tanggal', date('Y-m-d'))->sum('sembuh');
    $meninggal = Kasus2::where('tanggal', date('Y-m-d'))->sum('meninggal');

    $join = DB::table('kasus2s')
                ->select('positif', 'sembuh', 'meninggal')
                ->join('rws', 'kasus2s.id_rw', '=', 'rws.id')
                ->get();
    $arr1 = [
        'Data' => 'DATA KASUS SELURUH INDONESIA',
        'positif' =>$join->sum('positif'),
        'sembuh' =>$join->sum('sembuh'),
        'meninggal' =>$join->sum('meninggal'),
    ];
    $arr2 = [
        'Data' => 'DATA KASUS HARI INI',
        'positif' =>$positif,
        'sembuh' =>$sembuh,
        'meninggal' =>$meninggal,
    ];
    $arr = [
        'status' => 200,
        'data' => [
            'Hari ini' => $arr2,
            'total' => $arr1
        ],
        'message' => 'Berhasil'
    ];
    return response()->json($arr, 200);
}
public function dunia()
    {
        $response = Http::get('https://api.kawalcorona.com/global');
            $data =$response->json();
            return $data;
            return response([
                'Message' => ' Berhasil!',
            ]);
    }

}