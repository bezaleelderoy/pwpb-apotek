<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}



include '../config/conn.php';
include '../components/header.php'; ?>
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

                $title = ucfirst($page);


                ?>
                <h3 class="page-title mb-0 p-0"><?php echo $title ?></h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Input data</a></li>
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
                        <h4 class="card-title">Input data</h4>

                        <?php


                        if ($page == "karyawan") {
                        ?>
                        <form action="karyawan.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama Karyawan</label>
                                <input name="namakaryawan" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Mohon menggunakan nama lengkap.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input name="telp" type="number" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } else if ($page == "obat") { ?>
                        <form action="obat.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama Obat</label>
                                <input name="namaobat" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supplier</label>
                                <select class="form-select" name='id_supplier'>
                                    <option>Supplier</option>
                                    <?php

                                        $query = mysqli_query($conn, "SELECT * FROM tb_supplier");

                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value='$data[id_supplier]' >$data[perusahaan]</option>";
                                        }

                                        ?>
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
                        <form action="pelanggan.php" method="post" enctype="multipart/form-data">
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
                        <?php } else if ($page == "supplier") { ?>
                        <form action="supplier.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input name="perusahaan" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input name="telp" type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } else if ($page == "users") { ?>
                        <form action="users.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input name="username" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input name="password" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Level User</label>
                                <select class="form-select" aria-label="Default select example" name="leveluser">
                                    <option selected>Open this select menu</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Viewer">Viewer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Karyawan</label>
                                <select class="form-select" aria-label="Default select example" name="idkaryawan">
                                    <option selected>Nama</option>
                                    <?php

                                        $query = mysqli_query($conn, "SELECT * FROM tb_karyawan ");

                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value='$data[idkaryawan]' name='idkaryawan'>$data[namakaryawan]</option>";
                                        }

                                        ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } else if ($page == "transaksi") { ?>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <?php
                                
                                if (isset($_POST['transaction'])){
                                    $idkaryawan = $_POST['idkaryawan'];
                                    $idpelanggan = $_POST['idpelanggan'];
                                    $tgltransaksi = $_POST['tgltransaksi'];
                                    $kategoripelanggan = $_POST['kategoripelanggan'];


                                    $query = mysqli_query($conn, "INSERT INTO tb_transaksi VALUES (NULL, $idpelanggan, $idkaryawan, '$tgltransaksi', '$kategoripelanggan', NULL, NULL, NULL)");
                                    
                                    $getData = mysqli_query($conn, "SELECT tb_karyawan.namakaryawan, tb_pelanggan.namalengkap, tb_transaksi.* FROM tb_transaksi 
                                    INNER JOIN tb_karyawan ON tb_transaksi.idkaryawan = tb_karyawan.idkaryawan
                                    INNER JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan  
                                    ORDER BY idtransaksi DESC LIMIT 1");

                                    $row = mysqli_fetch_assoc($getData);
                                    
                                    ?>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <label class="form-label">Karyawan</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $row['namakaryawan'] ?>" disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Date</label>
                                                <input type="text" class="form-control" name="tgltransaksi"
                                                    value="<?= $row['tgltransaksi']?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label">Pelanggan</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $row['namalengkap'] ?>" disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Kategori</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $row['kategoripelanggan'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                } else if (isset($_POST['inputBarang'])) {

                                    $getData = mysqli_query($conn, "SELECT tb_karyawan.namakaryawan, tb_pelanggan.namalengkap, tb_transaksi.* FROM tb_transaksi 
                                    INNER JOIN tb_karyawan ON tb_transaksi.idkaryawan = tb_karyawan.idkaryawan
                                    INNER JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan  
                                    ORDER BY idtransaksi DESC LIMIT 1");

                                    $row = mysqli_fetch_assoc($getData);
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <label class="form-label">Karyawan</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $row['namakaryawan'] ?>" disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Date</label>
                                                <input type="text" class="form-control" name="tgltransaksi"
                                                    value="<?= $row['tgltransaksi']?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label">Pelanggan</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $row['namalengkap'] ?>" disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Kategori</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $row['kategoripelanggan'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                } else {
                                ?>
                                <form action="input.php?data=transaksi" method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Karyawan</label>

                                                    <?php

                                                        $lists = mysqli_query($conn, "SELECT tb_karyawan.idkaryawan, tb_karyawan.namakaryawan FROM tb_karyawan INNER JOIN tb_login ON tb_karyawan.idkaryawan = tb_login.idkaryawan WHERE username = '$_SESSION[name]' ");

                                                        while ($data = mysqli_fetch_assoc($lists)) { ?>

                                                    <input type="text" name="namakaryawan" class="form-control"
                                                        value="<?= $data['namakaryawan'] ?>" disabled>
                                                    <input type="text" name="idkaryawan" class="form-control"
                                                        value="<?= $data['idkaryawan'] ?>" hidden>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="text" class="form-control" name="tgltransaksi"
                                                        value="<?= date("Y/m/d h:i:sa") ?>" disabled>
                                                    <input type="text" class="form-control" name="tgltransaksi"
                                                        value="<?= date("Y-m-d") ?>" hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Pelanggan</label>
                                                    <select name="idpelanggan" class="form-control">
                                                        <?php

                                                            $lists = mysqli_query($conn, "SELECT namalengkap, idpelanggan FROM tb_pelanggan");

                                                            while ($data = mysqli_fetch_assoc($lists)) { ?>

                                                        <option value="<?= $data['idpelanggan'] ?>">
                                                            <?= $data['namalengkap'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" name="kategoripelanggan">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Simpan</label>
                                                    <input type="submit" name="transaction"
                                                        class="form-control btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php }?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <?php
                                            
                                            if (isset($_POST['inputBarang'])){
                                                $idtransaksi = $_POST['idtransaksi'];
                                                $obat = $_POST['obat'];
                                                $jumlah = $_POST['jumlah'];
                                                
                                                $result = mysqli_query($conn, "SELECT id_obat, hargabeli FROM tb_obat WHERE id_obat = '$obat'");
                                                
                                                $row = mysqli_fetch_assoc($result);  
                            
                                                    $id_obat = $row['id_obat'];
                                                    $hargabeli = $row['hargabeli'];
                                                    $totalharga = $jumlah * $hargabeli;
                                                    
                                                    $insertTransaction = mysqli_query($conn, "INSERT INTO tb_detail_transaksi VALUES (NULL, $idtransaksi, $id_obat, $jumlah, $hargabeli, $totalharga)");
                                             
                                                

                                                
                                            }
                                            
                                            ?>
                                            <form action="input.php?data=transaksi" method="post">
                                                <?php 
                                                if (!isset($_POST['inputBarang'])){

                                                    ?>
                                                <input type="number" name="idtransaksi"
                                                    value="<?= $row['idtransaksi'] ?>" hidden>
                                                <?php
                                                } else {
                                                ?>
                                                <input type="number" name="idtransaksi" value="<?= $idtransaksi ?>"
                                                    hidden>
                                                <?php }?>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <label class="form-label">Barang</label>
                                                        <datalist id="obat">
                                                            <?php

                                                            $lists = mysqli_query($conn, "SELECT * FROM tb_obat");

                                                            while ($data = mysqli_fetch_assoc($lists)) { ?>

                                                            <option value=" <?= $data['id_obat']?>">
                                                                <?= $data['namaobat']?></option>
                                                            <?php } ?>
                                                        </datalist>
                                                        <input type="text" name="obat" class="form-control" id="obat"
                                                            list="obat">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" name="jumlah">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="" class="form-label">Add</label>
                                                        <input type="submit" name="inputBarang"
                                                            class="form-control btn btn-primary" value="+">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nama barang</th>
                                                <th class="border-top-0">Harga Satuan</th>
                                                <th class="border-top-0">Jumlah</th>
                                                <th class="border-top-0">Harga</th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['inputBarang'])){
                                            $query = mysqli_query($conn, "SELECT tb_obat.namaobat, tb_detail_transaksi.* FROM tb_detail_transaksi INNER JOIN tb_obat ON tb_detail_transaksi.idobat = tb_obat.id_obat WHERE idtransaksi = $idtransaksi");

                                            while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?= $data['namaobat']?></td>
                                                <td>Rp. <?= number_format($data['hargasatuan'], 0, ',','.')?></td>
                                                <td><?= $data['jumlah']?></td>
                                                <td>Rp. <?= number_format($data['totalharga'], 0, ',','.')?></td>
                                            </tr>
                                            <?php } }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <?php
                                                if (@$_POST['inputBarang'])
                                                $query = mysqli_query($conn, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = $idtransaksi");
                                                $row = mysqli_fetch_assoc($query);
                                                ?>
                                                <th>Total</th>

                                                <th>Rp.
                                                    <?= number_format($row['SUM(totalharga)'], 0, ',','.')?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <label class="form-label">Bayar</label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                    </div>
                                </div>

                            </div>
                        </div>

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