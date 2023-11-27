<?php

include 'koneksi_db.php';

$sql = "INSERT INTO mahasiswa (NAMA, NPM, KELAS) 
         VALUES (
            '{$_POST['nama']}',
            '{$_POST['npm']}',
            '{$_POST['kelas']}'
         )";

// var_dump($sql);die();

$result = $conn->query($sql);

if ($result === TRUE) {
   echo "Data berhasil ditambahkan";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}
