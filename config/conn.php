<?php

$conn = mysqli_connect('localhost', 'root', '','apotek_rpl5');

if (mysqli_error($conn)){
    echo "Error koneksi database";
}

?>