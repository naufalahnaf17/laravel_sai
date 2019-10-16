@extends('layout.template')
@section('title' , 'Data Tagihan || Admin')

@section('content')

    <h3>Data Tagihan</h3>

    <a style="float:right;margin-right:30px;" href="{{ url('/tambah-tagihan') }}" class="btn btn-primary">Tambah Tagihan</a>
    <br class="mt-2"><hr>


    <div class="live-search" style="position:relative;height:50px;">
      <form action="" method="post">
        <input type="text" class="form-control" name="keyword" id="keyword" size="40" placeholder="Cari Tagihan" autocomplete="off">
      </form>
    </div>

    <!-- Kondisi Awal Apabila Terjadi Sesuatu -->
    <?php if (session('berhasil')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-primary welcome" role="alert">
        <b class="justify-content-center"> Data Berhasil Di Tambahkan </b>
      </div>
    <?php endif; ?>

    <?php if (session('gagal')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Gagal Di Tambahkan </b>
      </div>
    <?php endif; ?>

    <?php if (session('deleted')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Berhasil Di Hapus </b>
      </div>
    <?php endif; ?>

    <?php if (session('edited')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-success welcome" role="alert">
        <b class="justify-content-center"> Data Berhasil Di Edit </b>
      </div>
    <?php endif; ?>

    <?php if (session('no')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Berhasil Di Edit </b>
      </div>
    <?php endif; ?>
    <!-- Kondisi Akhir Apabila Terjadi Sesuatu -->

    <!-- Awal Table -->
    <div id="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No Tagihan</th>
          <th scope="col">Nim</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- Awal Data -->
          <?php foreach ($tagihan as $b): ?>
            <tr>
              <td> {{ $b->no_tagihan }} </td>
              <td> {{ $b->nim }} </td>
              <td> {{ $b->tanggal }} </td>
              <td> {{ $b->keterangan }} </td>
              <td>
                <a class="btn btn-warning" href="{{ url('/edit-tagihan/edit/' .$b->no_tagihan. '/' .$b->nim. '/') }}">Edit Tagihan</a>
                <a class="btn btn-danger" href="{{ url('/hapus-tagihan/hapus/' .$b->no_tagihan. '/') }}">Hapus Tagihan</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <!-- Akhir Data -->
      </tbody>
    </table>
    <!-- Akhir Table -->
    </div>
    <!-- Akhir Table -->

    <!-- Awal Pagination -->
    <!-- Akhir Pagination -->

@endsection
