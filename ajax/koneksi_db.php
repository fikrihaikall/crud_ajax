<?php
   // $servername = "127.0.0.1";
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "crud_mahasiswa";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>