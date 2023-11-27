<?php

include 'koneksi_db.php';

// die('aa');
// var_dump($_POST);die();

$sql = "DELETE FROM mahasiswa WHERE ID = '{$_POST['id']}'";

// var_dump($sql);die();

$result = $conn->query($sql);

if ($result === TRUE) {
   echo "Data berhasil dihapus";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}
