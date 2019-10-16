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
$query = "SELECT * FROM dev_tagihan_m WHERE nim LIKE '%$keyword%' OR keterangan LIKE '%$keyword%' OR no_tagihan LIKE '%$keyword%'  ";
$tagihan = query($query);

?>

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
          <td> <?= $b['no_tagihan'] ?> </td>
          <td> <?= $b['nim'] ?> </td>
          <td> <?= $b['tanggal'] ?> </td>
          <td> <?= $b['keterangan'] ?> </td>
          <td>
            <a class="btn btn-warning" href="">Edit Data</a>
            <a class="btn btn-danger" href="">Hapus Data</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <!-- Akhir Data -->
  </tbody>
</table>
<!-- Akhir Table -->
</div>
