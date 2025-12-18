<?php

include '../../data_master/isRole.php';
include '../../koneksi.php';

$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$prodi    = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$email    = $_POST['email'];

$query = "INSERT INTO tbl_mahasiswa (nim, nama, prodi, angkatan, email) VALUES ('$nim', '$nama', '$prodi', '$angkatan', '$email')";

if (mysqli_query($koneksi, $query)) {
    header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
