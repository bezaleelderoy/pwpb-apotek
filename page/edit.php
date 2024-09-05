<?php

include '../config/conn.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE idkaryawan = $id");

while ($data = mysqli_fetch_array($query)) {
    $id = $data['idkaryawan'];
    $namakaryawan = $data['namakaryawan'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];
}


?>
<?php include '../components/header.php'; ?>
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
                <?php
                $page = $_GET['data'];

                if ($page == "karyawan") {
                    $title = "Karyawan";
                } else if ($page == "obat") {
                    $title = "Obat";
                } else if ($page == "pelanggan") {
                    $title = "Pelanggan";
                }


                ?>
                <h3 class="page-title mb-0 p-0"><?php echo $title ?></h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Edit data</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
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
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit data</h4>


                        <?php

                        if ($page == "karyawan") {
                        ?>
                            <form action="karyawan.php" method="post">
                                <div class="mb-3">
                                    <input type="hidden" name="idkaryawan" value="<?php echo $id ?>">
                                    <label class="form-label">Nama Karyawan</label>
                                    <input name="namakaryawan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $namakaryawan ?>">
                                    <div id="emailHelp" class="form-text">Mohon menggunakan nama lengkap.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control"><?php echo $alamat ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input name="telp" type="number" class="form-control" value="<?php echo $telp ?>">
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                        <?php } else if ($page == "obat") { ?>
                            <form action="obat.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Nama Obat</label>
                                    <input name="namaobat" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Supplier</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Supplier</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori Obat</label>
                                    <input name="kategoriobat" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga Jual</label>
                                    <input name="hargajual" type="number" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga Beli</label>
                                    <input name="hargabeli" type="number" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stock Obat</label>
                                    <input name="stok_obat" type="number" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control"></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } else if ($page == "pelanggan") { ?>
                            <form action="obat.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input name="namalengkap" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telp</label>
                                    <input name="telp" type="number" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Usia</label>
                                    <input name="usia" type="number" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Bukti Foto Resep</label>
                                    <input name="buktifotoresep" type="file" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } ?>
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
        © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
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