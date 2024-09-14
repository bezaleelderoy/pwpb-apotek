<?php

include('../config/conn.php');
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login/login.php');
    exit;
}


if (isset($_POST['submit'])) {

    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $usia = $_POST['usia'];
    $buktifotoresep = $_FILES['buktifotoresep']['name'];
    $img = $_FILES['buktifotoresep']['tmp_name'];

    move_uploaded_file($img, "img/" . $buktifotoresep);

    $query = mysqli_query($conn, "INSERT INTO tb_pelanggan VALUES (NULL, '$namalengkap', '$alamat', '$telp', $usia, '$buktifotoresep')");
}

if (isset($_POST['update'])) {
    $idpelanggan = $_POST['idpelanggan'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $usia = $_POST['usia'];
    $buktifotoresep = $_FILES['buktifotoresep']['name'];
    $img = $_FILES['buktifotoresep']['tmp_name'];

    move_uploaded_file($img, "img/" . $buktifotoresep);


    $query = mysqli_query($conn, "UPDATE tb_pelanggan SET namalengkap = '$namalengkap', alamat = '$alamat', telp = '$telp', usia = $usia, buktifotoresep = '$buktifotoresep' WHERE idpelanggan = $idpelanggan");
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
                <h3 class="page-title mb-0 p-0">Pelanggan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
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
        <a href="crud/input.php?data=pelanggan" class="btn btn-primary mb-2">Insert data</a>
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
                                        <th class="border-top-0">Nama</th>
                                        <th class="border-top-0">Alamat</th>
                                        <th class="border-top-0">Telp</th>
                                        <th class="border-top-0">Usia</th>
                                        <th class="border-top-0">Bukti Foto Resep</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php



                                    $query = mysqli_query($conn, 'SELECT * FROM tb_pelanggan');
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                        $modalId = 'delBackdrop' . $data['idpelanggan'];

                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $data['namalengkap'] . "</td>";
                                        echo "<td>" . $data['alamat'] . "</td>";
                                        echo "<td>" . $data['telp'] . "</td>";
                                        echo "<td>" . $data['usia'] . "</td>";
                                        echo "<td><img src='img/$data[buktifotoresep]' width='50px'></td>";
                                        echo "<td><a href='crud/edit.php?id=" . $data['idpelanggan'] . "&data=pelanggan' type='button' class='btn btn-warning'><i class='bi bi-pencil-square'></i></a></td>";
                                        echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#" . $modalId . "'><i class='bi bi-trash'></i></button></td>";
                                        echo "<div class='modal fade' id='" . $modalId . "' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                 <div class='modal-dialog'>
                                                     <div class='modal-content'>
                                                         <div class='modal-header'>
                                                             <h1 class='modal-title fs-5' id='staticBackdropLabel'>Delete data</h1>
                                                         </div>
                                                         <div class='modal-body'>
                                                             Apakah anda ingin menghapus data $data[namalengkap] ? Aksi ini <strong> TIDAK DAPAT </strong> dibatalkan!
                                                         </div>
                                                         <div class='modal-footer'>
                                                             <a href='crud/delete.php?id=" . $data['idpelanggan'] . "&data=pelanggan' class='btn btn-danger text-light'>HAPUS</a>
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