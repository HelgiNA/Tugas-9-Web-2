<?php
include '../../koneksi.php';

if (! isset($_POST['id_nilai'])) {
    header("Location: " . BASE_URL . "data_master/nilai/index.php");
}

$id_nilai   = $_POST['id_nilai'];
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

$query  = "UPDATE tbl_nilai SET nim = '$nim', kodeMatkul = '$kodeMatkul', nidn = '$nidn', nilai = '$nilai', nilaiHuruf = '$nilaiHuruf' WHERE id_nilai = '$id_nilai'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: " . BASE_URL . "data_master/nilai/index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
