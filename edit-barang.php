<?php

include 'layout/header.php';
include 'config/app.php';

$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
        alert('Data Barang Berhasil Diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Barang Gagal Diubah');
        document.location.href = 'index.php';
        </script>";
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Barang</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main content -->
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama'];?>"
                        placeholder="Nama Barang..." required>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah'];?>"
                        placeholder="Jumlah Barang..." required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga'];?>"
                        placeholder="Harga Barang..." required>
                </div>

                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                <form>

                    <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "layout/footer.php";?>