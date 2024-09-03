<?php

include('conn.php');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inner Join</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="#">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="karyawan.php">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="#">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="transaksi.php">Transaksi</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid pt-5">
        <table class="table table-striped" style="margin: 0 auto;">
            <th>ID Transaksi</th>
            <th>Nama Karyawan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Transaksi</th>
            <th>Kategori Pelanggan</th>
            <th>Total Bayar</th>
            <th>Bayar</th>
            <th>Kembalian</th>
            <?php

            $query = mysqli_query($conn, 'SELECT tb_pelanggan.namalengkap, tb_karyawan.namakaryawan, tb_transaksi.* FROM tb_transaksi 
                                        INNER JOIN tb_pelanggan ON tb_pelanggan.idpelanggan = tb_transaksi.idpelanggan 
                                        INNER JOIN tb_karyawan ON tb_karyawan.idkaryawan = tb_transaksi.idkaryawan');


            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $data['idtransaksi'] . "</td>";
                echo "<td>" . $data['namakaryawan'] . "</td>";
                echo "<td>" . $data['namalengkap'] . "</td>";
                echo "<td>" . $data['tgltransaksi'] . "</td>";
                echo "<td>" . $data['kategoripelanggan'] . "</td>";
                echo "<td>" . $data['totalbayar'] . "</td>";
                echo "<td>" . $data['bayar'] . "</td>";
                echo "<td>" . $data['kembali'] . "</td>";
                echo "</tr>";
            }


            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>