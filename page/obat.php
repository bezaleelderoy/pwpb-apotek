<?php

include('../config/conn.php');
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}


if (isset($_POST['submit'])) {

    $id_supplier = $_POST['id_supplier'];
    $namaobat = $_POST['namaobat'];
    $kategoriobat = $_POST['kategoriobat'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stok_obat = $_POST['stok_obat'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($conn, "INSERT INTO tb_obat VALUES (NULL, $id_supplier, '$namaobat', '$kategoriobat', $hargajual, $hargabeli, $stok_obat, '$keterangan')");
}

if (isset($_POST['update'])) {
    $id_obat = $_POST['id_obat'];
    $id_supplier = $_POST['id_supplier'];
    $namaobat = $_POST['namaobat'];
    $kategoriobat = $_POST['kategoriobat'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stok_obat = $_POST['stok_obat'];
    $keterangan = $_POST['keterangan'];

    $query = mysqli_query($conn, "UPDATE tb_obat SET id_supplier = $id_supplier, namaobat = '$namaobat', kategoriobat = '$kategoriobat', hargajual = $hargajual, hargabeli = $hargabeli, stok_obat = $stok_obat, keterangan = '$keterangan' WHERE id_obat = $id_obat");
}

include '../components/header.php';

?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb pb-0">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Obat</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Obat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <?php if (isset($_POST['submit'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data succesfully added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <?php if (isset($_POST['update'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data succesfully updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <a href="input.php?data=obat" class="btn btn-primary mb-2">Insert data</a>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic Table</h4>
                        <h6 class="card-subtitle">Add class <code>.table</code></h6>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Nama Obat</th>
                                        <th class="border-top-0">Supplier</th>
                                        <th class="border-top-0">Kategori</th>
                                        <th class="border-top-0">Harga Jual</th>
                                        <th class="border-top-0">Harga Beli</th>
                                        <th class="border-top-0">Stock Obat</th>
                                        <th class="border-top-0">Keterangan</th>
                                        <th class="border-top-0">Edit</th>
                                        <th class="border-top-0">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php



                                    $query = mysqli_query($conn, 'SELECT * FROM tb_obat INNER JOIN tb_supplier ON tb_obat.id_supplier = tb_supplier.id_supplier');
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                        $modalId = 'delBackdrop' . $data['id_obat'];

                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $data['namaobat'] . "</td>";
                                        echo "<td>" . $data['perusahaan'] . "</td>";
                                        echo "<td>" . $data['kategoriobat'] . "</td>";
                                        echo "<td>" . $data['hargajual'] . "</td>";
                                        echo "<td>" . $data['hargabeli'] . "</td>";
                                        echo "<td>" . $data['stok_obat'] . "</td>";
                                        echo "<td>" . $data['keterangan'] . "</td>";
                                        echo "<td><a href='edit.php?id=" . $data['id_obat'] . "&data=obat' type='button' class='btn btn-warning'><i class='bi bi-pencil-square'></i></a></td>";
                                        echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#" . $modalId . "'><i class='bi bi-trash'></i></button></td>";
                                        echo "<div class='modal fade' id='" . $modalId . "' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                 <div class='modal-dialog'>
                                                     <div class='modal-content'>
                                                         <div class='modal-header'>
                                                             <h1 class='modal-title fs-5' id='staticBackdropLabel'>Delete data</h1>
                                                         </div>
                                                         <div class='modal-body'>
                                                             Apakah anda ingin menghapus data $data[namaobat] ? Aksi ini <strong> TIDAK DAPAT </strong> dibatalkan!
                                                         </div>
                                                         <div class='modal-footer'>
                                                             <a href='delete.php?id=" . $data['id_obat'] . "&data=obat' class='btn btn-danger text-light'>HAPUS</a>
                                                             <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Batal</button>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>";
                                        echo "</tr>";
                                    }




                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a> Distributed By <a
            href="https://themewagon.com">ThemeWagon</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<?php include "../components/footer.php"; ?>