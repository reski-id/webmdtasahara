<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'tabel_siswa';

    public function absen(){
        return $this->belongsTo('App\Absen');
    }
}
