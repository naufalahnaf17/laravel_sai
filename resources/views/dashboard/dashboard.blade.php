@extends('layout.template')
@section('title' , 'Dashboard || Admin')

@section('content')
<link rel="stylesheet" href="/css/master.css">
<h4>Dashboard Admin</h4>
      <!-- Awal Card -->
      <div class="row">
        <div id="kartu" class="col-sm-4">
          <div id="card-satu" class="card bg-warning">
            <div class="card-body justify-content-center">
              <center><h4 class="card-text">Siswa</h4>
              <img id="cuk" src="/gambar/student.png"><br><br>
              <p class="card-text">{{ $siswa }}</p>
              <a href="/data-siswa" class="btn btn-primary">Lihat Detail</a></center>
            </div>
          </div>
        </div>
        <div id="kartu" class="col-sm-4">
          <div id="card-satu" class="card bg-success">
            <div class="card-body justify-content-center">
              <center><h4 class="card-text">Tagihan</h4>
              <img id="cuk" src="/gambar/notebook.png"><br><br>
              <p class="card-text">{{ $tagihan }}</p>
              <a href="/data-tagihan" class="btn btn-primary">Lihat Detail</a></center>
            </div>
          </div>
        </div>
        <div id="kartu" class="col-sm-4">
          <div id="card-satu" class="card bg-danger">
            <div class="card-body justify-content-center">
              <center><h4 class="card-text">Pembayaran</h4>
              <img id="cuk" src="/gambar/money.png"><br><br>
              <p class="card-text"> {{ $bayar }} </p>
              <a href="/data-pembayaran" class="btn btn-primary">Lihat Detail</a></center>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Card -->
      <br>
      <h3>Grafik Dashboard Admin </h3><br><br>
      <div id="siswaChart" style="height: 200px;"></div>
</div>
</div>


    <script type="text/javascript">
      Morris.Bar({
      element: 'siswaChart',
      data: [
      { y: 'siswa', a: {{ $siswa }} },
      { y: 'tagihan', a: {{ $tagihan }} },
      { y: 'pembayaran', a: {{ $bayar }} }
      ],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Size']
      });
    </script>

@endsection
