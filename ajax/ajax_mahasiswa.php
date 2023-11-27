<?php

include 'koneksi_db.php';

// getMahasiswa();
$sql = "select * from mahasiswa";
$result = $conn->query($sql);
if ($result) {
   $data = [];
   while ($row = $result->fetch_assoc()) {
      $data[] = $row;
   }
   echo json_encode($data);
}
// echo $data;
// foreach ($result->fetch_assoc() as $k => $v) {
//    var_dump($v);
// }
// die();