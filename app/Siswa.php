<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // inisialisasi table dev_siswa
    protected $table = "dev_siswa";
    protected $primaryKey = "nim";
    public $timestamps = false;
    protected $fillable = ['nim' ,  'nama' , 'kode_lokasi' ,  'kode_jur'];

    public function jurusan(){
      return $this->hasOne('App\Jurusan');
    }
}
