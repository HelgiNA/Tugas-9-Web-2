<?php
include "koneksi.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query  = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);
    $row    = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($row['role'] == 'dosen') {
            $queryUser        = "SELECT * FROM tbl_dosen WHERE nidn = '$username'";
            $_SESSION['role'] = 'Dosen';
        } else {
            $queryUser        = "SELECT * FROM tbl_mahasiswa WHERE nim = '$username'";
            $_SESSION['role'] = 'Mahasiswa';
        }

        $resultUser             = mysqli_query($koneksi, $queryUser);
        $rowUser                = mysqli_fetch_assoc($resultUser);
        $_SESSION['login_user'] = $rowUser['nama'];
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php');
        echo "<script>alert('Username atau password salah!');
        </script>";
        exit();
    }
}
