<?php
// membuka jalur ke database
include "../../koneksi.php";

// cek apakah ada data yang dikirim
if (isset($_GET['nim'])) {
    // mengambil data dari edit.php
    $nim = $_GET['nim'];

    // query delete
    $queryDelete = "DELETE FROM tbl_mahasiswa WHERE nim='$nim'";

    // eksekusi query delete
    $hasil = mysqli_query($koneksi, $queryDelete);

    if ($hasil) {
        header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
    } else {
        echo "Error: " . $queryDelete . "<br>" . mysqli_error($koneksi);
    }
}