<?php
// membuka jalur ke database
include "../../koneksi.php";

// cek apakah ada data yang dikirim
if (isset($_GET['kodeMatkul'])) {
    // mengambil data dari edit.php
    $kodeMatkul = $_GET['kodeMatkul'];

    // query delete
    $queryDelete = "DELETE FROM tbl_matkul WHERE kodeMatkul='$kodeMatkul'";

    // eksekusi query delete
    $hasil = mysqli_query($koneksi, $queryDelete);

    if ($hasil) {
        header("Location: " . BASE_URL . "data_master/mata kuliah/index.php");
    } else {
        echo "Error: " . $queryDelete . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
