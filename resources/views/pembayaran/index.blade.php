@extends('layout.template')
@section('title' , 'Data Pembayaran || Admin')

<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/pembayaran-script.js"></script>

@section('content')

    <?php if (session('tidak')): ?>
      <script type="text/javascript">
        alert('Data Tagihan Tidak Di Temukan');
      </script>
    <?php endif; ?>

    <h3>Data Pembayaran</h3>
    <a href="/tambah-pembayaran" id="btn-tambah" class="btn btn-success">Tambah Data</a>
    <br><br>


    <div class="live-search">
      <form action="" method="post">
        <input type="text" class="form-control" name="keyword" id="keyword" size="40" placeholder="Cari Pembayaran" autocomplete="off">
      </form>
    </div>

    <!-- Kondisi Awal Apabila Terjadi Sesuatu -->
    <?php if (session('berhasil')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-primary welcome" role="alert">
        <b class="justify-content-center"> Data Pembayaran Berhasil Di Tambahkan </b>
      </div>
    <?php endif; ?>

    <?php if (session('gagal')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Pembayaran Gagal Di Tambahkan </b>
      </div>
    <?php endif; ?>

    <?php if (session('edited')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-success welcome" role="alert">
        <b class="justify-content-center"> Data Pembayaran Berhasil Di Edit </b>
      </div>
    <?php endif; ?>

    <?php if (session('deleted')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Pembayaran Berhasil Di Hapus </b>
      </div>
    <?php endif; ?>

    <?php if (session('failure')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Pembayaran Berhasil Di Hapus </b>
      </div>
    <?php endif; ?>

    <!-- Kondisi Akhir Apabila Terjadi Sesuatu -->


    <!-- Awal Table -->
    <div id="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No Pembayaran</th>
          <th scope="col">Tanggal</th>
          <th scope="col">NIM</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Periode</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- Awal Data -->
        <?php foreach ($bayar as $c): ?>
          <tr>
            <td> {{ $c->no_bayar }} </td>
            <td> {{ $c->nim }} </td>
            <td> {{ $c->tanggal }} </td>
            <td> {{ $c->keterangan }} </td>
            <td> {{ $c->periode }} </td>
            <td>
              <a class="btn btn-warning" href="/edit-pembayaran/{{$c->no_bayar}}/{{$c->nim}}">Ubah</a>
              <a class="btn btn-danger" href="/hapus-pembayaran/{{$c->no_bayar}}">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <!-- Akhir Data -->
      </tbody>
    </table>
    <!-- Akhir Table -->
    </div>
    <!-- Akhir Table -->
@endsection
