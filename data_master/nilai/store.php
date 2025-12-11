<?php
include '../../koneksi.php';

$nim        = $_POST['nim'];
$kodeMatkul = $_POST['kodeMatkul'];
$nidn       = $_POST['nidn'];
$nilai      = $_POST['nilai'];
$nilaiHuruf = '';

if ($nilai >= 80) {
    $nilaiHuruf = 'A';
} elseif ($nilai >= 75) {
    $nilaiHuruf = 'B';
} elseif ($nilai >= 70) {
    $nilaiHuruf = 'C';
} elseif ($nilai >= 65) {
    $nilaiHuruf = 'D';
} else {
    $nilaiHuruf = 'E';
}

$query = "INSERT INTO tbl_nilai (nim, kodeMatkul, nidn, nilai, nilaiHuruf) VALUES ('$nim', '$kodeMatkul', '$nidn', '$nilai', '$nilaiHuruf')";

if (mysqli_query($koneksi, $query)) {
    header("Location: " . BASE_URL . "data_master/nilai/index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
