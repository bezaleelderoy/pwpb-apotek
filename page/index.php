<?php

include('../config/conn.php');
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: login.php');
exit;
}


include '../components/header.php';






include "../components/footer.php"; ?>