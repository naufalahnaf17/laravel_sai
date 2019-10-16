@extends('layout.template')
@section('title' , 'Edit Siswa || Admin')

@section('content')

    <link type="text/css" rel="stylesheet" href="{{ URL::to('css/master.css') }}">
    <h3>Edit Data Siswa</h3>
    <br><br><br>

    <p>  </p>

    <!-- Awal Form -->
    <form action="{{ url('/edit-siswa/update/' .$siswa->first()->nim. '/') }}" method="post">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

    <div class="form-group">
      <label>NIM</label>
      <input type="text" class="form-control" placeholder="Masukan nim" name="nim" id="nim" value="{{ $siswa->first()->nim }}">
    </div>

    <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" id="nama" value="{{ $siswa->first()->nama }}" required>
    </div>

    <div class="form-group">
      <label for="kode_jur">Kode Jurusan</label>
      <select name="kode_jur" id="kode_jur" class="form-control">
        <option value="{{ $siswa->first()->kode_jur }}" selected="" hidden="">{{ $siswa->first()->kode_jur }}</option>
          <option value="B01">B01 - Teknik Elektronika Industri</option>
          <option value="B02">B02 - Teknik Elektronika Komunikasi</option>
          <option value="B03">B03 - Rekayasa Perangkat Lunak</option>
          <option value="B04">B04 - Teknik Penyiaran Program Pertelevisian</option>
          <option value="B05">B05 - Teknik Pendingin dan Tata Udara</option>
          <option value="B06">B06 - Teknik Komputer dan Jaringan</option>
          <option value="B07">B07 - Kontrol Proses</option>
          <option value="B08">B08 - Kontrol Mekanik</option>
          <option value="B09">B09 - Teknik Otomasi Industri</option>
        </select>
    </div>

    <div class="button">
    <button class="btn btn-danger" type="submit" name="back">Kembali</button>
    <button class="btn btn-success" type="submit" name="edit">Edit Data</button>
    </div>

    </form>


@endsection
