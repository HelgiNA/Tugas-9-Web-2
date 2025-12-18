<?php
session_start();
if (! isset($_SESSION['login_user'])) {
    header("Location: login.php");
}

if (! isset($_SESSION['role'])) {
    exit();
}
