@extends('layout.template')
@section('title' , 'Edit Pembayaran || Admin')

@section('content')

<!-- Php Situational -->
<?php
  $siswa = DB::table('dev_siswa')->where('nim' , $bayar->nim)->first();
?>
<!-- Akhir php Situational -->

<link type="text/css" rel="stylesheet" href="{{ URL::to('css/master.css') }}">

<h3>Edit Pembayaran Siswa</h3>
<br><br>

<!-- Awal Form -->
<form action="{{url('/edit-pembayaran/storeEdit/{{$bayar->no_bayar}}')}}" method="post">

  {{ csrf_field() }}
  {{ method_field('PUT') }}

  <div style="float:right;" class="button mb-2">
    <a class="btn btn-danger" href="{{url('/data-tagihan')}}" name="back">Cancel</a>
    <button class="btn btn-primary" type="submit" name="submit" style="color:#fff;">Save</button>
  </div>

  <div class="form-group mt-3">
    <label for="nim" class="mt-3">Nim</label>
    <select name="nim" id="nim" class="form-control">
      <option value="{{$siswa->nim}}" selected="selected" hidden="">{{$siswa->nim}} - {{$siswa->nama}}</option>
    </select>
  </div>

  <div class="form-group">
    <label>Tanggal</label>
    <input type="date" class="form-control" placeholder="hh/bb/tt" name="date" id="date" value="{{$bayar->tanggal}}">
  </div>

  <div class="form-group">
      <label>Keterangan</label>
      <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="{{$bayar->keterangan}}">
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" placeholder="Masukan Nama" name="kode_lokasi" id="kode_lokasi" value="bebas">
  </div>

</form>
<!-- Akhir Form -->

<!-- Awal Table -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No Tagihan</th>
      <th scope="col">Nilai Tagihan</th>
      <th scope="col">Nilai Yang Harus Di Bayar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tagihan_detail as $r): ?>
      <tr>
        <td>{{$r->no_tagihan}}</td>
        <td>{{$r->nilai}}</td>
        <td>{{$r->nilai}}</td>
        <td>
          <a href="{{url('/pembayaran/bayar-tagihan/{{$r->no_tagihan}}/{{$r->nilai}}')}}" class="btn btn-primary">Bayar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<!-- Akhir Table -->

@endsection
