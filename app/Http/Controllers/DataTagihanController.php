<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tagihan;
use App\Siswa;
use App\TagihanDetail;
use Illuminate\Support\Facades\Session;

class DataTagihanController extends Controller
{

  public function index(){

    if (!Session::get('login')) {
      return view('auth.login');
    }else {
      $tagihan = DB::table('dev_tagihan_m')->paginate(5);
      return view('tagihan.index' , ['tagihan'=>$tagihan]);
    }

  }

  public function tambahTagihan(Request $request){

      // Insert Data Ke Model Tagihan
      $kode_lokasi = "";
      $periode = "2019/10";

      $status = Tagihan::create([
        'nim' => $request->nim,
        'tanggal' => $request->date,
        'kode_lokasi' =>$kode_lokasi,
        'keterangan' => $request->keterangan,
        'periode' => $periode
      ]);

      if ($status) {
        $hasil = Tagihan::where('nim' , $request->nim)->get()->toArray();
      }else {
        return redirect('/data-tagihan')->with('gagal ' , 'gagal');
      }

      $detail = TagihanDetail::create([
        'no_tagihan' => $hasil[0]['no_tagihan'],
        'kode_lokasi' => $kode_lokasi,
        'kode_jenis' => $request->jenis_tagihan,
        'nilai' => $request->nilai
      ]);

      if ($detail) {
        return redirect('/data-tagihan')->with('berhasil ' , 'berhasil');
      }else {
        return redirect('/data-tagihan')->with('gagal ' , 'gagal');
      }


  }

  public function hapusTagihan($no_tagihan){
    $tagihan = Tagihan::find($no_tagihan);
    $detail = TagihanDetail::where('no_tagihan' , $no_tagihan);
    $tagihan->delete();
    $detail->delete();

    return redirect('/data-tagihan')->with('deleted' , 'Data Berhasil Di Hapus');
  }

  public function tagihanForm(){
    $siswa = Siswa::all();
    $jenis = DB::table('dev_jenis')->get();
    return view('tagihan.tambah' , ['siswa'=>$siswa] , ['jenis'=>$jenis]);
  }

  public function editTagihan($no_tagihan,$nim){

    // Ambil Data Tagihan
    $tagihan = DB::table('dev_tagihan_m')->where('no_tagihan' , $no_tagihan)->first();

    // Ambil Data Detail Tagihan
    $tagihan_detail = DB::table('dev_tagihan_d')->where('no_tagihan' , $no_tagihan)->get();

    // Masuk Ke View Edit Siswa
    return view('tagihan.edit' , ['tagihan_detail'=>$tagihan_detail] , ['tagihan'=>$tagihan]);
  }

  public function tambahDetail($no_tagihan,Request $request){

    $kode_lokasi = "";

    $tagihan_detail = TagihanDetail::create([
      'no_tagihan' => $no_tagihan,
      'kode_lokasi' => $kode_lokasi,
      'kode_jenis' => $request->jenis_tagihan,
      'nilai' => $request->nilai
    ]);

    if ($tagihan_detail) {
      return redirect('/data-tagihan')->with('berhasil' , 'berhasil');
    }else {
      return redirect('/data-tagihan')->with('gagal' , 'gagal');
    }

  }

  public function storeEdit($no_tagihan,Request $request){
    $kode_lokasi ="";
    $periode = "2019/10";

    $tagihan = Tagihan::find($no_tagihan);
    $tagihan->kode_lokasi = $kode_lokasi;
    $tagihan->nim = $request->nim;
    $tagihan->tanggal = $request->date;
    $tagihan->keterangan = $request->keterangan;
    $tagihan->periode = $periode;
    $hasil = $tagihan->save();

    if ($hasil) {
      return redirect('/data-tagihan')->with('edited' , 'Data Berhasil Di Edit');
    }else {
      return redirect('/data-tagihan')->with('no' , 'Data Gagal Di Edit');
    }


  }

  public function modal($nilai){
    $detail = DB::table('dev_tagihan_d')->where('nilai' , $nilai)->first();
    return back()->with('ada' , $detail->nilai);
  }

  public function editDetail($nilai,Request $request){
    $status = DB::table('dev_tagihan_d')->where('nilai',$nilai)->update([
		'kode_jenis' => $request->kode_jenis,
		'nilai' => $request->nilai
	 ]);

    if ($status) {
      return back()->with('berhasil' , 'berhasil');
    }else {
      return back()->with('gagal' , 'gagal');
    }

  }


}
