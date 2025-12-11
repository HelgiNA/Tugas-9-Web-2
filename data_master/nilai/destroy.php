<?php
// membuka jalur ke database
include "../../koneksi.php";

// cek apakah ada data yang dikirim
if (isset($_GET['id_nilai'])) {
    // mengambil data dari edit.php
    $id_nilai = $_GET['id_nilai'];

    // query delete
    $queryDelete = "DELETE FROM tbl_nilai WHERE id_nilai='$id_nilai'";

    // eksekusi query delete
    $hasil = mysqli_query($koneksi, $queryDelete);

    if ($hasil) {
        header("Location: " . BASE_URL . "data_master/nilai/index.php");
    } else {
        echo "Error: " . $queryDelete . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
