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
$query = "SELECT * FROM dev_siswa WHERE nama LIKE '%$keyword%' ";
$siswa = query($query);

?>

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
  <tbody>
    <!-- Awal Data -->
      <?php foreach ($siswa as $a): ?>
      <tr>
        <td><?= $a['nim'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['kode_jur'] ?></td>
        <td>
          <a class="btn btn-warning" href="{{ url('/edit') }}">Edit Data</a>
        </td>
      </tr>
      <?php endforeach; ?>
    <!-- Akhir Data -->
  </tbody>
</table>
<!-- Akhir Table -->
</div>
