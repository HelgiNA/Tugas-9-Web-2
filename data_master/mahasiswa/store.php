<?php

include '../../data_master/isRole.php';
include '../../koneksi.php';

$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$prodi    = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$email    = $_POST['email'];

// Upload Foto Logic
$foto_nama = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $target_dir         = "../../uploads/";
    $file_extension     = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if (in_array($file_extension, $allowed_extensions)) {
        $new_file_name = $nim . '_' . time() . '.' . $file_extension;
        $target_file   = $target_dir . $new_file_name;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $foto_nama = $new_file_name;
        } else {
            echo "Maaf, terjadi error saat mengupload file.";
            exit;
        }
    } else {
        echo "Format file tidak valid. Hanya JPG, JPEG, dan PNG yang diperbolehkan.";
        exit;
    }
}

$query = "INSERT INTO tbl_mahasiswa (nim, nama, prodi, angkatan, email, foto) VALUES ('$nim', '$nama', '$prodi', '$angkatan', '$email', '$foto_nama')";

if (mysqli_query($koneksi, $query)) {
    header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
