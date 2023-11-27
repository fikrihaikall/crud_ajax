<?php

include 'koneksi_db.php';

// var_dump($_POST);die();

$sql = "UPDATE mahasiswa SET 
            NAMA = '{$_POST['nama']}',
            NPM = '{$_POST['npm']}',
            KELAS = '{$_POST['kelas']}'
         WHERE
            ID = '{$_POST['id']}'";

// var_dump($sql);die();

$result = $conn->query($sql);

if ($result === TRUE) {
   echo "Data berhasil dirubah";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}
