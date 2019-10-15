<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "dev_jurusan";

    public function siswa(){
        return $this->belongsTo('App\Siswa');
    }

}
