<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Rw;

class Kasus2 extends Model
{
    protected $table = "kasus2s";
    protected $fillable = [
        'positif',
        'meninggal',
        'sembuh',
        'tanggal',
        'id_rw',
    ];

    public function  Rw(){
        return $this->belongsTo('App\Models\Rw','id_rw');
    }}
