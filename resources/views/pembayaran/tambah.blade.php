@extends('layout.template')
@section('title' , 'Tambah Pembayaran || Admin')

@section('content')

<h3>Tambah Pembayaran Siswa</h3>
<br><br>

<!-- Awal Form -->
<form action="/tambah-pembayaran/storePembayaran" method="post">

  {{ csrf_field() }}

  <div style="float:right;" class="button mb-2">
    <a class="btn btn-danger" href="/data-tagihan" name="back">Cancel</a>
    <button class="btn btn-primary" type="submit" name="submit" style="color:#fff;">Save</button>
  </div>

  <div class="form-group mt-3">
    <label for="nim" class="mt-3">Nim</label>
    <select name="nim" id="nim" class="form-control">
      <option value="" selected="selected" hidden="">---Pilih Nim Siswa---</option>
      <?php foreach ($siswa as $x): ?>
        <option value="{{$x->nim}}">{{$x->nim}} - {{$x->nama}}</option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Tanggal</label>
    <input type="date" class="form-control" placeholder="hh/bb/tt" name="date" id="date" value="">
  </div>

  <div class="form-group">
      <label>Keterangan</label>
      <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="">
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
      <th scope="col">Keterangan</th>
      <th scope="col">Nilai Tagihan</th>
      <th scope="col">Nilai Bayar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<!-- Akhir Table -->

@endsection
