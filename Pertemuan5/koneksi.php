<?php

$host = "127.0.0.1";
$user = "root";
$password = ""; // isi jika menggunakan password
$port = 3306; // port default MySQL adalah 3306, sesuaikan dengan server

$koneksi = mysqli_connect($host, $user, $password, "akademik2", $port);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi ke server MySQL berhasil!";

?>