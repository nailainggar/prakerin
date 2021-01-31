<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'kode_kecamatan',
        'nama_kecamatan',
        'id_kota',    
    ];

    public function Kota(){
        return $this->belongsTo('App\Models\Kota','id_kota');
    }
    public function Desa(){
        return $this->hasMany('App\Model\Desa','id_kecamatan');
    }
}
