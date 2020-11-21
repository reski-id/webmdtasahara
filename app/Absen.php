<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'tabel_absen';

    public function siswa(){
        return $this->hasMany('App\Siswa');
    }
}
