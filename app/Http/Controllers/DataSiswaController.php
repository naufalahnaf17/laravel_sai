<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Siswa;
use Illuminate\Support\Facades\Session;

class DataSiswaController extends Controller
{

  public function index()
  {

    if (!Session::get('login')) {
      return view('auth.login');
    }else {
      $siswa = DB::table('dev_siswa')->get();
      return view('siswa.index' , ['siswa'=>$siswa]);
   }

  }

  public function tambahSiswa(Request $request)
   {
     // Validasi Terlebih Dahulu Apakah Ada Field Yang Kosong
       $this->validate($request,[
         'nim' => 'required',
         'nama' => 'required',
         'kode_jur' => 'required'
       ]);

     $kode_lokasi = null;
     // Insert Data Ke Database Dengan Model Siswa
      $status = Siswa::create([
       'nim' => $request->nim,
       'nama' => $request->nama,
       'kode_lokasi' => $request->kode_lokasi,
       'kode_jur' => $request->kode_jur
     ]);

     // Redirect Ke Halaman Pegawai Dengan Pesan Berhasil Atau Gagal
     if ($status) {
       return redirect('/data-siswa')->with('berhasil' , 'Data Berhasil Di Tambah');
     }else {
       return redirect('/data-siswa')->with('error' , 'Data Gagal Di Tambahkan');
     }

   }


   public function hapusSiswa($nim)
   {
    $siswa = Siswa::find($nim);
    $siswa->delete();

    return redirect('/data-siswa')->with('deleted' , 'Data Berhasil Di Hapus');
   }

   public function editSiswa($nim)
   {
    $siswa = Siswa::where('nim',$nim);
    return view('siswa.edit' , ['siswa'=>$siswa]);
   }

   public function storeEdit($nim ,Request $request){

      $siswa = Siswa::find($nim);
      $siswa->nim = $request->nim;
      $siswa->nama = $request->nama;
      $siswa->kode_jur = $request->kode_jur;
      $siswa->save();

      return redirect('/data-siswa')->with('edited' , 'Data Berhasil Di Edit');
   }

   public function search(Request $request){

     if ($request->search {

       $hasil = DB::table('dev_siswa')
                ->where('name', 'like', '%' .$request->search. '%')
                ->get();
     }

     if ($hasil) {

       foreach ($hasil as $a) {
         echo '<tr> <td>' . $hasil->nim . '</td> <td>' . $hasil->nama . '</td> <td>' .$hasil->kode_jur. '</td> </tr>' ;
       }

     }

   }

}
