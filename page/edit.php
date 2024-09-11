<?php

include '../config/conn.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$data = $_GET['data'];


if ($data == "karyawan"){

    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE idkaryawan = $id");
    
    while ($data = mysqli_fetch_array($query)) {
        $id = $data['idkaryawan'];
        $namakaryawan = $data['namakaryawan'];
        $alamat = $data['alamat'];
        $telp = $data['telp'];
    }
} else if ($data == "obat") {
    $query = mysqli_query($conn, "SELECT * FROM tb_obat INNER JOIN tb_supplier ON tb_obat.id_supplier = tb_supplier.id_supplier WHERE id_obat = $id");
    
    while ($data = mysqli_fetch_array($query)) {
        $id = $data['id_obat'];
        $id_supplier = $data['id_supplier'];
        $perusahaan = $data['perusahaan'];
        $namaobat = $data['namaobat'];
        $kategoriobat = $data['kategoriobat'];
        $hargajual = $data['hargajual'];
        $hargabeli = $data['hargabeli'];
        $stok_obat = $data['stok_obat'];
        $keterangan = $data['keterangan'];
    }
} else if ($data == "pelanggan") {
    $query = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE idpelanggan = $id");
    while ($data = mysqli_fetch_array($query)) {
        $id = $data['idpelanggan'];
        $namalengkap = $data['namalengkap'];
        $alamat = $data['alamat'];
        $telp = $data['telp'];
        $usia = $data['usia'];
        $buktifotoresep = $data['buktifotoresep'];
    }
} else if ($data == "supplier") {
    $query = mysqli_query($conn, "SELECT * FROM tb_supplier WHERE id_supplier = $id");
    while ($data = mysqli_fetch_array($query)) {
        $id = $data['id_supplier'];
        $perusahaan = $data['perusahaan'];
        $telp = $data['telp'];
        $alamat = $data['alamat'];
        $keterangan = $data['keterangan'];
    }
} else if ($data == "users") {
    $query = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$id'");
    while ($data = mysqli_fetch_array($query)) {
        $username = $data['username'];
        $password = $data['password'];
        $leveluser = $data['leveluser'];
        $idkaryawan = $data['idkaryawan'];
    }
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

                $title = ucfirst($page);


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


                        <?php if ($page == "karyawan") {?>
                        <form action="karyawan.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="idkaryawan" value="<?php echo $id ?>">
                                <label class="form-label">Nama Karyawan</label>
                                <input name="namakaryawan" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $namakaryawan ?>">
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
                            <input type="hidden" name="id_obat" value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label class="form-label">Nama Obat</label>
                                <input name="namaobat" type="text" class="form-control" value="<?php echo $namaobat ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supplier</label>
                                <select class="form-select" aria-label="Default select example" name="id_supplier">
                                    <option selected>Supplier</option>
                                    <?php 
                                
                                    $query = mysqli_query($conn, "SELECT * FROM tb_obat INNER JOIN tb_supplier ON tb_obat.id_supplier = tb_supplier.id_supplier");
                                    
                                    while ($data = mysqli_fetch_array($query)){
                                        echo "<option value='$data[id_supplier]'>$data[perusahaan]</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label class="form-label">Kategori Obat</label>
                                <input name="kategoriobat" type="text" class="form-control"
                                    value="<?php echo $kategoriobat?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Jual</label>
                                <input name="hargajual" type="number" class="form-control"
                                    value="<?php echo $hargajual?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Beli</label>
                                <input name="hargabeli" type="number" class="form-control"
                                    value="<?php echo $hargabeli?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock Obat</label>
                                <input name="stok_obat" type="number" class="form-control"
                                    value="<?php echo $stok_obat?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control"><?php echo $keterangan?></textarea>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } else if ($page == "pelanggan") { ?>
                        <form action="pelanggan.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="idpelanggan" value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input name="namalengkap" type="text" class="form-control"
                                    value="<?php echo $namalengkap?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control"><?= $alamat?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telp</label>
                                <input name="telp" type="number" class="form-control" value="<?= $telp?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Usia</label>
                                <input name="usia" type="number" class="form-control" value="<?= $usia?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bukti Foto Resep</label>
                                <input name="buktifotoresep" type="file" class="form-control">
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } else if ($page == "supplier") {?>
                        <form action="supplier.php" method="post">
                            <input type="hidden" name="id_supplier" value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input value="<?= $perusahaan?>" name="perusahaan" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input value="<?= $telp?>" name="telp" type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control"><?= $alamat?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control"><?= $keterangan?></textarea>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } else if ($page == "users") {?>
                        <form action="users.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input value="<?= $username ?>" name="username" type="text" class="form-control"
                                    disabled>
                                <input value="<?= $username ?>" name="username" type="text" class="form-control" hidden>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input value="<?= $password ?>" name="password" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Level User</label>
                                <select name="leveluser" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Viewer">Viewer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Karyawan</label>
                                <select name="idkaryawan" class="form-select" aria-label="Default select example">
                                    <option selected>Nama</option>
                                    <?php 
                                
                                    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan");
                                    
                                    
                                    while ($data = mysqli_fetch_array($query)){
                                        echo "<option value='$data[idkaryawan]' name='idkaryawan'>$data[namakaryawan]</option>";
                                    }
                                    

                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </form>
                        <?php }?>
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