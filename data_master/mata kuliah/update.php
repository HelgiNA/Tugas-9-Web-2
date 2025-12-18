<?php
include '../../data_master/isRole.php';

include '../../koneksi.php';

if (! isset($_POST['kodeMatkul'])) {
    header("Location: " . BASE_URL . "data_master/mata kuliah/index.php");
}

$kodeMatkul = $_POST['kodeMatkul'];
$namaMatkul = $_POST['namaMatkul'];
$sks        = $_POST['sks'];
$nidn       = $_POST['nidn'];

$query  = "UPDATE tbl_matkul SET namaMatkul = '$namaMatkul', sks = '$sks', nidn = '$nidn' WHERE kodeMatkul = '$kodeMatkul'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: " . BASE_URL . "data_master/mata kuliah/index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);