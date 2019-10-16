@extends('layout.template')
@section('title' , 'Tambah Tagihan || Admin')

@section('content')

    <link type="text/css" rel="stylesheet" href="{{ URL::to('css/master.css') }}">
    <h3>Tambah Tagihan Siswa</h3>
    <br><br><br>

    <p>  </p>

    <!-- Awal Form -->
    <form action="{{url('/tambah-tagihan/store')}}" method="post">

      {{ csrf_field() }}

      <div class="form-group mt-3">
        <label for="nim" class="mt-3">Nim</label>
        <select name="nim" id="nim" class="form-control">
          <option value="" selected="selected" hidden="">--- Pilih NIM ---</option>
            <?php foreach ($siswa as $b): ?>
                <option value="{{ $b->nim }}">{{ $b->nim }} - {{ $b->nama }}</option>
            <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" placeholder="hh/bb/tt" name="date" id="date">
      </div>

      <div class="form-group">
          <label>Keterangan</label>
          <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
      </div>

      <div class="form-group">
        <label for="jenis_tagihan">Jenis Tagihan</label>
        <select name="jenis_tagihan" id="jenis_tagihan" class="form-control">
          <option value="" selected="selected" hidden="">--- Jenis Tagihan ---</option>
            <?php foreach ($jenis as $n): ?>
              <option value="{{ $n->kode_jenis }}"> {{$n->nama}} </option>
            <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Nilai</label>
        <input type="text" class="form-control" placeholder="Masukan Nilai" name="nilai" id="nilai">
      </div>

      <div class="form-group">
        <input type="hidden" class="form-control" placeholder="Masukan Nama" name="kode_lokasi" id="kode_lokasi" value="bebas">
      </div>

      <div style="float:right;" class="button mb-2">
        <a class="btn btn-danger" href="{{ url('/data-tagihan') }}" name="back">Cancel</a>
        <button class="btn btn-primary" type="submit" name="submit">Save</button>
      </div>
    </form>
    <!-- Akhir Form -->

@endsection
