@extends('layout.template')
@section('title' , 'Data Siswa || Admin')

<script src="{{url('/js/jquery-3.4.1.min.js')}}"></script>

@section('content')

    <h3>Data Siswa</h3>

    <button style="float:right;margin-right:30px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswa">Tambah Siswa</button>
    <br class="mt-2"><hr>


    <div class="live-search" style="position:relative;height:50px;">
      <input type="text" class="form-control" onkeyup="search()" name="keyword" id="keyword" size="40" placeholder="Cari Mahasiswa" autocomplete="off">
    </div>

    <!-- Kondisi Awal Apabila Terjadi Sesuatu -->
    <?php if (session('berhasil')): ?>
      <div style="width:600px;position:relative;height:50px;" class="alert alert-primary welcome" role="alert">
        <b class="justify-content-center"> Data Berhasil Di Tambahkan </b>
      </div>
    <?php endif; ?>

    <?php if (session('error')): ?>
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
    <!-- Kondisi Akhir Apabila Terjadi Sesuatu -->

    <!-- Awal Table -->
    <div id="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="success">
        <!-- Awal Data -->
          <?php foreach ($siswa as $a): ?>
          <tr>
            <td>{{ $a->nim }}</td>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->kode_jur }}</td>
            <td>
              <a class="btn btn-warning" href="{{ url('/edit-siswa/edit/' .$a->nim. '/') }}">Edit Data</a>
              <a class="btn btn-danger" href="{{ url('/hapus-siswa/hapus/' .$a->nim. '/' ) }}">Hapus Data</a>
            </td>
          </tr>
          <?php endforeach; ?>
        <!-- Akhir Data -->
      </tbody>
    </table>
    <!-- Akhir Table -->
    </div>
    <!-- Akhir Table -->


    <!-- Modal Tambah Siswa -->
    <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- Awal Form  -->

              <form method="post" action="{{ url('/tambah-siswa/store') }}">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control" placeholder="Masukan nim" name="nim" id="nim" required>
                  </div>

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" id="nama" required>
                  </div>

                  <div class="form-group">
                    <label for="kode_jur">Kode Jurusan</label>
                    <select name="kode_jur" id="kode_jur" class="form-control">
                      <option value="" selected="selected" hidden="">--- Pilih Jurusan ---</option>

                        <!-- Awal Pilihan Jurusan -->
                        <option value="B01">B01 - Teknik Elektronika Industri</option>
                        <option value="B02">B02 - Teknik Elektronika Komunikasi</option>
                        <option value="B03">B03 - Rekayasa Perangkat Lunak</option>
                        <option value="B04">B04 - Teknik Penyiaran Program Pertelevisian</option>
                        <option value="B05">B05 - Teknik Pendingin dan Tata Udara</option>
                        <option value="B06">B06 - Teknik Komputer dan Jaringan</option>
                        <option value="B07">B07 - Kontrol Proses</option>
                        <option value="B08">B08 - Kontrol Mekanik</option>
                        <option value="B09">B09 - Teknik Otomasi Industri</option>
                        <!-- Akhir Pilihan Jurusan -->

                      </select>
                  </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control" placeholder="Masukan Nama" name="kode_lokasi" id="kode_lokasi" value="bebas">
                  </div>

                  <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kambali</button>
                    <input type="submit" class="btn btn-success" value="Simpan">
                  </div>

              </form>

              <!-- Akhir Form -->

          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Tambah Siswa -->

    <!-- live search javascript -->
    <script type="text/javascript">

      function search(){
        var search = $('#keyword').val();
        console.log(search);
      }

    </script>

@endsection
