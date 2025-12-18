<?php

include '../../block.php';
if ($_SESSION['role'] != 'Dosen') {
    header("Location: index.php");
    exit();
}
