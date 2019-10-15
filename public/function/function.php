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

?>
