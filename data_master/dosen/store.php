<?php
include '../../koneksi.php';

$nidn  = $_POST['nidn'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

$query = "INSERT INTO tbl_dosen (nidn, nama, prodi, email) VALUES ('$nidn', '$nama', '$prodi', '$email')";

if (mysqli_query($koneksi, $query)) {
    header("Location: " . BASE_URL . "data_master/dosen/index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);