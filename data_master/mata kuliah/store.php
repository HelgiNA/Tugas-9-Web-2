<?php
include '../../koneksi.php';

$kodeMatkul = $_POST['kodeMatkul'];
$namaMatkul = $_POST['namaMatkul'];
$sks        = $_POST['sks'];
$nidn       = $_POST['nidn'];

$query = "INSERT INTO tbl_matkul (kodeMatkul, namaMatkul, sks, nidn) VALUES ('$kodeMatkul', '$namaMatkul', '$sks', '$nidn')";

if (mysqli_query($koneksi, $query)) {
    header("Location: " . BASE_URL . "data_master/mata kuliah/index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
