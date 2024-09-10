<?php

include "../config/conn.php";
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$page = $_GET['data'];

if ($page == "karyawan") {
    $query = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE idkaryawan = $id");
    header("Location: karyawan.php");
} elseif ($page == "obat") {
    $query = mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat = $id");
    header("Location: obat.php");
} elseif ($page == "pelanggan") {
    $query = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE idpelanggan = $id");
    header("Location: pelanggan.php");
} elseif ($page == "supplier") {
    $query = mysqli_query($conn, "DELETE FROM tb_supplier WHERE id_supplier = $id");
    header("Location: supplier.php");
} elseif ($page == "users") {
    $query = mysqli_query($conn, "DELETE FROM tb_login WHERE username = '$id'");
    header("Location: users.php");
}
