<?php
include '../../data_master/isRole.php';

// membuka jalur ke database
include "../../koneksi.php";

// mengambil data dari edit.php
$nidn  = $_POST['nidn'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

// query update
$queryUpdate = "UPDATE tbl_dosen SET nama='$nama', prodi='$prodi', email='$email' WHERE nidn='$nidn'";

// eksekusi query update
if (mysqli_query($koneksi, $queryUpdate)) {
    header("Location: " . BASE_URL . "data_master/dosen/index.php");
} else {
    echo "Error: " . $queryUpdate . "<br>" . mysqli_error($koneksi);
}