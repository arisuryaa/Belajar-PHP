<?php

include "layout/header.php";
include 'config/app.php';
if (isset($_POST['submit'])) {
    if (addMahasiswa($_POST) > 0) {
        echo "<script>
        alert('Data Mahasiswa Berhasil Ditambahkan');
        document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Mahasiswa Gagal Ditambahkan');
        document.location.href = 'mahasiswa.php';
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
                    <h1 class="m-0">Tambah Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input required type="text" class="form-control" id="nama" placeholder="Nama mahasiswa"
                        name="namaMahasiswa">
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                            <option value="">--Pilih Jurusan--</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk" required>
                            <option value="">--Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">nomor telepon</label>
                    <input required type="number" class="form-control" id="telepon" placeholder="nomor telepon"
                        name="telepon">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input required type="email" class="form-control" id="email" placeholder="email" name="email">
                </div>
                <div class=" mb-3">
                    <label for="foto" class="form-label">foto</label>
                    <input type="file" class="form-control" id="foto" placeholder="foto" name="foto"
                        onchange="preview()">
                    <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                </div>

                <button type="submit" name="submit" class="btn btn-primary mb-5">submit</button>
            </form>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "layout/footer.php";?>