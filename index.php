<?php
include "config/app.php";
include "layout/header.php";

$data_barang = select("SELECT * FROM barang");
$data_mahasiswa = select("SELECT * FROM mahasiswa");
$data_admin = select("SELECT * FROM akun");
$jumlahBarang = count($data_barang);
$data_akun = count($data_admin);
$nedi = count($data_mahasiswa);
// session_start();

    if(!isset($_SESSION["Login"])) {
        echo "
        <script>
          document.location.href = 'login.php';
        </script>
      ";
    }



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlahBarang ?></h3>

                            <p>Jumlah Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $nedi ?></h3>

                            <p>Jumlah Mahasiswa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $data_akun ?></h3>

                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <a href="form-tambah.php"><button type="button"
                                            class="btn btn-primary mb-3">tambah</button></a>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach($data_barang as $barang) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $barang['nama'] ?></td>
                                                <td><?= $barang['jumlah'] ?></td>
                                                <td>Rp. <?= number_format($barang['harga'],0,',','.') ?></td>
                                                <td><?= date('d/m/Y', strtotime($barang['tanggal'])) ?></td>
                                                <td>
                                                    <a href="edit-barang.php?id_barang=<?= $barang['id_barang']; ?>"
                                                        class="btn btn-success ">Edit</a>
                                                    <a href="delete-barang.php?id_barang=<?= $barang['id_barang']; ?>"
                                                        class="btn btn-danger" id="del"
                                                        onclick="return confirm('apakah yakin ingin menghapus data')">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $no++ ?>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "layout/footer.php";?>