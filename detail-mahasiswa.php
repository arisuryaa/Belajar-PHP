<?php 

include "layout/header.php";
include 'config/app.php';
$id_mahasiswa =(int)$_GET["id_mahasiswa"];

$detailmhs = SELECT("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Detail Mahasiswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="">
                <h1>Detail Mahasiswa <?=$detailmhs["nama"] ?></h1>
                <hr>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>Nama</td>
                        <td><?= $detailmhs["nama"] ?></td>
                    </tr>
                    <tr>
                        <td>jurusan</td>
                        <td><?= $detailmhs["jurusan"] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= $detailmhs["jk"] ?></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td><?= $detailmhs["telepon"] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $detailmhs["email"] ?></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td><img src="asset/img/<?= $detailmhs["foto"] ?>" alt="<?= $detailmhs["foto"] ?>"
                                class="w-25 h-auto">
                        </td>
                    </tr>
                </table>
                <a href="mahasiswa.php" class="mt-2 btn btn-primary mb-5" style="float-right">Kembali</a>
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "layout/footer.php";?>