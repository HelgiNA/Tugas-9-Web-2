<?php
include '../../data_master/isRole.php';
include '../../koneksi.php';

if (! isset($_POST['nim'])) {
    header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
}

$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$prodi    = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$email    = $_POST['email'];

// Update Logic with Photo
$query_values = "nama = '$nama', prodi = '$prodi', angkatan = '$angkatan', email = '$email'";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $target_dir         = "../../uploads/";
    $file_extension     = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if (in_array($file_extension, $allowed_extensions)) {
        // 1. Get Old Photo
        $query_old  = "SELECT foto FROM tbl_mahasiswa WHERE nim = '$nim'";
        $result_old = mysqli_query($koneksi, $query_old);
        $data_old   = mysqli_fetch_assoc($result_old);
        $foto_lama  = $data_old['foto'];

        // 2. Delete Old Photo if exists
        if (! empty($foto_lama) && file_exists($target_dir . $foto_lama)) {
            unlink($target_dir . $foto_lama);
        }

        // 3. Upload New Photo
        $new_file_name = $nim . '_' . time() . '.' . $file_extension;
        $target_file   = $target_dir . $new_file_name;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $query_values .= ", foto = '$new_file_name'";
        } else {
            echo "Maaf, terjadi error saat mengupload file.";
            exit;
        }
    } else {
        echo "Format file tidak valid. Hanya JPG, JPEG, dan PNG yang diperbolehkan.";
        exit;
    }
}

$query  = "UPDATE tbl_mahasiswa SET $query_values WHERE nim = '$nim'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: " . BASE_URL . "data_master/mahasiswa/index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
