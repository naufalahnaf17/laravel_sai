<?php

$conn = mysqli_connect("119.235.255.105","root","Saisai2019","dbmagang");
function query($query){
  global $conn;
  $hasil = mysqli_query($conn,$query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($hasil)) {
    $rows[] = $row;
  }

  return $rows;
}


$keyword = $_GET["keyword"];
$query = "SELECT * FROM dev_bayar_m WHERE no_bayar LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR keterangan LIKE '%$keyword%' ";
$bayar = query($query);


?>

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
        <td> <?= $c['no_bayar'] ?> </td>
        <td> <?= $c['tanggal'] ?> </td>
        <td> <?= $c['nim'] ?> </td>
        <td> <?= $c['keterangan'] ?> </td>
        <td> <?= $c['periode'] ?> </td>
        <td>
          <a class="btn btn-warning" href="{{ url('/edit-pembayaran/' .<?= $c['no_bayar'] ?>. '/' .<?= $c['nim'] ?>. '/') }}">Ubah</a>
          <a class="btn btn-danger" href="{{ url('/hapus-pembayaran/' .<?= $c['no_bayar'] ?>. '/') }}">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
    <!-- Akhir Data -->
  </tbody>
</table>
<!-- Akhir Table -->
</div>
<!-- Akhir Table -->
