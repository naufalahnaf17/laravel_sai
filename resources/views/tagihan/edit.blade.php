@extends('layout.template')
@section('title' , 'Edit Tagihan || Admin')

@section('content')

  <!-- Syntax Untuk Mengambil Nama Siswa Yang Mau Di Edit -->
  <?php
    $siswa = DB::table('dev_siswa')->where('nim' , $tagihan->nim)->first();
    $jenis = DB::table('dev_jenis')->get();
  ?>
  <!-- Akhir Syntax Yang Sangat Situasional Sekali -->

  <?php if (session('ada')): ?>
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#exampleModal').modal('show');
        });
    </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <!-- Awal Form -->
          <form action="{{ url('/edit-detail/store/' .session('ada'). '/') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group mt-3">
              <label for="kode_jenis" class="mt-3">Kode Jenis Tagihan</label>
              <select name="kode_jenis" id="kode_jenis" class="form-control">
                <option value="" selected="selected" hidden="" required>-- Pilih Kode Jenis --</option>
                <?php foreach ($jenis as $x): ?>
                  <option value="{{$x->kode_jenis}}">{{$x->kode_jenis}} - {{$x->nama}}</option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
                <label>Nilai</label>
                <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" value="{{session('ada')}}">
            </div>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" type="button" class="btn btn-primary">Edit Data</button>

          </form>
          <!-- Akhir Form -->
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>


    <link type="text/css" rel="stylesheet" href="{{ URL::to('css/master.css') }}">
    <h3>Edit Tagihan Siswa</h3>
    <br><br>

    <?php if (session('berhasil')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-primary welcome" role="alert">
        <b class="justify-content-center"> Data Berhasil Di Edit </b>
      </div>
    <?php endif; ?>

    <?php if (session('gagal')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-danger welcome" role="alert">
        <b class="justify-content-center"> Data Gagal Di Tambahkan </b>
      </div>
    <?php endif; ?>

    <!-- Awal Form -->
    <form action="{{ url('/edit-tagihan/store/' .$tagihan->no_tagihan. '/') }}" method="post">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div style="float:right;" class="button mb-2">
        <a class="btn btn-danger" href="{{url('/data-tagihan')}}" name="back">Cancel</a>
        <button class="btn btn-primary" type="submit" name="submit">Save</button>
      </div>

      <div class="form-group mt-3">
        <label for="nim" class="mt-3">Nim</label>
        <select name="nim" id="nim" class="form-control">
          <option value="{{$siswa->nim}}" selected="selected" hidden="">{{$siswa->nim}} - {{$siswa->nama}}</option>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" placeholder="hh/bb/tt" name="date" id="date" value="{{$tagihan->tanggal}}">
      </div>

      <div class="form-group">
          <label>Keterangan</label>
          <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="{{$tagihan->keterangan}}">
      </div>

      <div class="form-group">
        <input type="hidden" class="form-control" placeholder="Masukan Nama" name="kode_lokasi" id="kode_lokasi" value="bebas">
      </div>

    </form>
    <!-- Akhir Form -->

    <button class="btn btn-primary mb-2" type="button" name="button" data-toggle="modal" data-target="#tambahDetail">Tambah Tagihan</button>

    <!-- Awal Table -->
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Jenis Tagihan</th>
          <th scope="col">Nilai</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tagihan_detail as $r): ?>
          <tr>
            <td>{{$r->no_tagihan}}</td>
            <td>{{$r->kode_jenis}}</td>
            <td>{{$r->nilai}}</td>
            <td>
              <a href="{{ url('/edit-detail/' .$r->nilai. '/') }}" class="btn btn-warning">Edit</a>
              <a href="{{ url('/hapus-detail/store/' .$r->nilai. '/') }}" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- Akhir Table -->

    <!-- Modal -->
    <div class="modal fade" id="tambahDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Tagihan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- Awal Form -->
            <form action="{{ url('/tambah-detail/' .$tagihan->no_tagihan. '/') }}" method="post">

              {{ csrf_field() }}

              <div class="form-group">
                <label for="jenis_tagihan">Jenis Tagihan</label>
                <select name="jenis_tagihan" id="jenis_tagihan" class="form-control" required>
                  <option value="" selected="selected" hidden="">--- Jenis Tagihan ---</option>
                    <?php foreach ($jenis as $n): ?>
                      <option value="{{ $n->kode_jenis }}"> {{$n->nama}} </option>
                    <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label>Nilai</label>
                <input type="text" class="form-control" placeholder="Masukan Nilai" name="nilai" id="nilai" required>
              </div>

              <input type="hidden" name="kode_lokasi" value="bebas">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Tagihan</button>

            </form>
            <!-- Akhir Form -->

          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal -->

@endsection
