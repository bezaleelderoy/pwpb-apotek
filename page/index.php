<?php

include('../config/conn.php');
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}


include '../components/header.php';


?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaksi</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM tb_transaksi");
                                $transaksi = mysqli_num_rows($query);
                                echo $transaksi ?>
                            </h2>
                            <span class="text-muted">Transaction</span>
                        </div>
                        <span class="text-success">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Weekly Sales</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> $5,000</h2>
                            <span class="text-muted">Todays Income</span>
                        </div>
                        <span class="text-info">30%</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar"
                                style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">Latest Transaction</h4>
                            <div class="col-md-2 ms-auto">
                                <select class="form-select shadow-none col-md-2 ml-auto">
                                    <option selected>January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                            </div>
                        </div>
                        <a href="input.php?data=transaksi" class="btn btn-success mt-2 text-white">New transaction</a>
                        <div class="table-responsive mt-2">
                            <table class="table stylish-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Customer</th>
                                        <th class="border-top-0">User</th>
                                        <th class="border-top-0">Amount</th>
                                        <th class="border-top-0">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM tb_transaksi INNER JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan INNER JOIN tb_karyawan ON tb_transaksi.idkaryawan = tb_karyawan.idkaryawan INNER JOIN tb_detail_transaksi ON tb_transaksi.idtransaksi = tb_detail_transaksi.idtransaksi");

                                    while ($data = mysqli_fetch_assoc($query)) {
                                        $modalId = 'staticBackdrop' . $data['idtransaksi'];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="align-middle"><?= $data['tgltransaksi'] ?></td>
                                            <td class="align-middle"><?= $data['namalengkap'] ?></td>
                                            <td class="align-middle"><?= $data['namakaryawan'] ?></td>
                                            <td class="align-middle"><?= $data['totalharga'] ?></td>
                                            <td class="align-middle"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">...</button></td>

                                            <div class="modal fade" id="<?= $modalId ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $data['namalengkap'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Understood</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php
                                    }


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>


<?php include "../components/footer.php"; ?>