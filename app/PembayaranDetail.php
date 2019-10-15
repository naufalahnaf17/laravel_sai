<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranDetail extends Model
{
  protected $table = "dev_bayar_d";
  public $timestamps = false;

  protected $fillable = ['no_bayar' , 'kode_lokasi' ,  'no_tagihan' ,'nilai'];

}
