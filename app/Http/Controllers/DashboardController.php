<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Tagihan;
use App\Pembayaran;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){

      if (!Session::get('login')) {
          return view('auth.login');
      }else {
        $siswa = Siswa::count();
        $tagihan = Tagihan::count();
        $bayar = Pembayaran::count();
        return view('dashboard.dashboard')->with('siswa' , $siswa )->with('tagihan' , $tagihan)->with('bayar' , $bayar);
    }

  }

}
