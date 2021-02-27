<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Desa;
use App\Models\Rw;
use App\Models\Provinsi;
use App\Models\Kasus2;
class WellcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $positif = DB::table('rws')->select('kasus2s.positif','kasus2s.sembuh','kasus2s.meninggal')
            ->join ('kasus2s','rws.id','=','kasus2s.id_rw')
            ->sum('kasus2s.positif');
           
         $sembuh = DB::table('rws')->select('kasus2s.positif','kasus2s.sembuh','kasus2s.meninggal')
            ->join ('kasus2s','rws.id','=','kasus2s.id_rw')
            ->sum('kasus2s.sembuh');

         $meninggal = DB::table('rws')->select('kasus2s.positif','kasus2s.sembuh','kasus2s.meninggal')
            ->join ('kasus2s','rws.id','=','kasus2s.id_rw')
            ->sum('kasus2s.meninggal');

            $front = DB::table('provinsis')
             ->join('kotas','kotas.id_provinsi','=','provinsis.id')
             ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
             ->join('desas','desas.id_kecamatan','=','kecamatans.id')
             ->join('rws','rws.id_desa','=','desas.id')
            ->join('kasus2s','kasus2s.id_rw','=','rws.id')
            ->select('nama_provinsi',
                         DB::raw('sum(kasus2s.positif) as positif'),
                         DB::raw('sum(kasus2s.sembuh) as sembuh'),
                        DB::raw('sum(kasus2s.meninggal) as meninggal'))
                         ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                         ->get();

            //$global = file_get_contents('https://api.kawalcorona.com/positif');
            //$getglobal = json_decode($global, TRUE);

             // Table Global
        ///$dataglobal= file_get_contents("https://api.kawalcorona.com/");
        //$globall = json_decode($dataglobal, TRUE);
  return view('frontend.welcome', compact('positif','sembuh','meninggal','front'));
    }
}