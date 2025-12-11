<?php
include '../../koneksi.php';

if (! isset($_POST['nim'])) {
    header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
}

$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$prodi    = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$email    = $_POST['email'];

$query  = "UPDATE tbl_mahasiswa SET nama = '$nama', prodi = '$prodi', angkatan = '$angkatan', email = '$email' WHERE nim = '$nim'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}