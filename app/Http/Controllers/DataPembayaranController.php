<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Siswa;
use App\Pembayaran;
use App\Tagihan;
use App\TagihanDetail;
use Illuminate\Support\Facades\Session;

class DataPembayaranController extends Controller
{

  public function index(){

    if (!Session::get('login')) {
      return view('auth.login');
    }else {
      $bayar = DB::table('dev_bayar_m')->paginate(5);
      return view('pembayaran.index' , ['bayar'=>$bayar]);
    }

  }

  public function tambahPembayaran(){
    $siswa = Siswa::all();
    return view('pembayaran.tambah' , ['siswa'=>$siswa]);
  }

  public function addDataPembayaran(Request $request){
    $kode_lokasi = "";
    $periode = "2019/11";

    $status = Pembayaran::create([
      'kode_lokasi'=>$kode_lokasi,
      'nim'=>$request->nim,
      'tanggal'=>$request->date,
      'keterangan'=>$request->keterangan,
      'periode'=>$periode
    ]);

    if ($status) {
      return redirect('/data-pembayaran')->with('berhasil' , 'Data Pembayaran Berhasil Di Tambah');
    }else {
      return redirect('/data-pembayaran')->with('gagal' , 'Data Pembayaran Gagal Di Tambah');
    }

  }

  public function editPembayaran($no_bayar,$nim){
    //Ambil Data Tagihan Detail Untuk bayar
    try {
      $tagihan = DB::table('dev_tagihan_m')->where('nim' , $nim)->first();
      $tagihan_detail = DB::table('dev_tagihan_d')->where('no_tagihan' , $tagihan->no_tagihan)->get();
    } catch (\Exception $e) {
      return redirect('/data-pembayaran')->with('tidak' , 'Data Tagihan Tidak Ditemukan');
    }


    //Ambil Data Pembayaran Yang Akan Di Edit / Bayar
    $bayar = DB::table('dev_bayar_m')->where('no_bayar' , $no_bayar)->first();
    return view('pembayaran.edit' , ['bayar'=>$bayar] , ['tagihan_detail'=>$tagihan_detail]);
  }

  public function bayar($no_tagihan,$nilai){
    $detail = TagihanDetail::where('nilai' , $nilai);
    $detail->delete();

    if ($detail) {
      return redirect('/data-pembayaran');
    }else {
      return redirect('/data-pembayaran');
    }

  }

  public function storeEdit($no_bayar , Request $request){
    $bayar = Pembayaran::find($no_bayar);
    $bayar->nim = $request->nim;
    $bayar->tanggal = $request->date;
    $bayar->keterangan = $request->keterangan;
    $bayar->save();

    return redirect('/data-pembayaran')->with('edited' , 'Data Berhasil Di Edit');
  }

  public function hapus($no_bayar){
    $status = Pembayaran::find($no_bayar);
    $status->delete();

    if ($status) {
      return redirect('/data-pembayaran')->with('deleted' , 'Data Berhasil Di Delete');
    }else {
      return redirect('/data-pembayaran')->with('failure' , 'Data Gagal Di Delete');
    }

  }

}
