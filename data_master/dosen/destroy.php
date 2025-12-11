<?php
// membuka jalur ke database
include "../../koneksi.php";

// cek apakah ada data yang dikirim
if (isset($_GET['nidn'])) {
    // mengambil data dari edit.php
    $nidn = $_GET['nidn'];

    // query delete
    $queryDelete = "DELETE FROM tbl_dosen WHERE nidn='$nidn'";

    // eksekusi query delete
    $hasil = mysqli_query($koneksi, $queryDelete);

    if ($hasil) {
        header("Location: " . BASE_URL . "data_master/dosen/index.php");
    } else {
        echo "Error: " . $queryDelete . "<br>" . mysqli_error($koneksi);
    }
}