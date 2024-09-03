<?php

include 'conn.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE idkaryawan = $id");

while ($data = mysqli_fetch_array($query)) {
    $id = $data['idkaryawan'];
    $nama = $data['namakaryawan'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];
}

if (isset($_POST['submit'])) {
    $inputNama = $_POST['nama'];
    $inputAlamat = $_POST['alamat'];
    $inputTelp = $_POST['telepon'];

    $result = mysqli_query($conn, "UPDATE tb_karyawan SET namakaryawan = '$inputNama', alamat = '$inputAlamat', telp = '$inputTelp' WHERE idkaryawan = $id");

    header("Location: karyawan.php?success");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="">Apotek</a>
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

    <div class="container-sm py-5">
        <h1>Edit Data</h1>
        <div>
            <form action="edit.php?id=<?php echo $id ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $alamat ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Telp</label>
                    <input type="text" name="telepon" class="form-control" value="<?php echo $telp ?>">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>