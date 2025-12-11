<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kampus";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (! $koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

define('BASE_URL', 'http://localhost/Tugas-9-Web-2/');
