<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kampus";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (! $koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://";

$server_name = $_SERVER['HTTP_HOST'];

$script_path = str_replace('\\', '/', __DIR__);
$doc_root    = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

$folder_name = str_replace($doc_root, '', $script_path);

define('BASE_URL', $protocol . $server_name . $folder_name . '/');
