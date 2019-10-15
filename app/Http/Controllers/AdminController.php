<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Cookie;
use App\Admin;
use App\Siswa;
use App\Tagihan;
use App\Pembayaran;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index(){

      if (Session::get('login')) {
        $siswa = Siswa::count();
        $tagihan = Tagihan::count();
        $bayar = Pembayaran::count();
        return view('dashboard.dashboard')->with('siswa' , $siswa )->with('tagihan' , $tagihan)->with('bayar' , $bayar);
      }else {
        return view('auth.login');
      }

    }

    public function loginStore(Request $request){
      $username = $request->username;
      $password = $request->password;

      $status = Admin::where('username' , $username)->first();
      if ($status) {

        if(Hash::check($password,$status->password)){
          $siswa = Siswa::count();
          $tagihan = Tagihan::count();
          $bayar = Pembayaran::count();
          Session::put('login',TRUE);
          return view('dashboard.dashboard')->with('siswa' , $siswa )->with('tagihan' , $tagihan)->with('bayar' , $bayar);
        }

      }else {
        return back()->with('gagal' , 'Gagal Login');
      }

    }

    public function logout(){
      Session::flush();
      return view('auth.login');
    }

}
