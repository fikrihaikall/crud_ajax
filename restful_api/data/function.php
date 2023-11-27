<?php
include 'koneksi_db.php';

function getMahasiswa(){
   die($conn);
   $sql = "select * from mahasiswa";

   try {
      $data = $conn->fetch_all($sql);
      
      return $data;
   } catch (\Throwable $th) {
      //throw $th;
      die($th);
   }
}
?>