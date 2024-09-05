<?php

include "../config/conn.php";

$id = $_GET['id'];
$page = $_GET['data'];

if ($page == "karyawan") {
    $query = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE idkaryawan = $id");
    header("Location: karyawan.php");
} elseif ($page == "obat") {
    $query = mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat = $id");
    header("Location: obat.php");
}
