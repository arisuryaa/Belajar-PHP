<?php 

include "layout/header.php";
include 'config/app.php';

$data_mahasiswa = select("SELECT * FROM mahasiswa");
session_start();
if(!isset($_SESSION["Login"])) {
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>

<body>


    <div class="container mt-5">
        <h1>Data Mahasiswa</h1>
        <hr>
        <a href="form-tambah-mahasiswa.php"><button type="button" class="btn btn-primary mb-2">tambah</button></a>
        <table class="mt-2 container table table-dark table-striped-columns" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($data_mahasiswa as $siswa) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $siswa['nama'] ?></td>
                    <td><?= $siswa['jurusan'] ?></td>
                    <td><?= $siswa['jk'] ?></td>
                    <td><?= $siswa['telepon'] ?></td>
                    <td>
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $siswa['id_mahasiswa']; ?>"
                            class="btn btn-secondary ">Detail</a>
                        <a href="edit-mahasiswa.php?id_mahasiswa=<?= $siswa['id_mahasiswa']; ?>"
                            class="btn btn-success ">Edit</a>
                        <a href="delete-mahasiswa.php?id_mahasiswa=<?= $siswa['id_mahasiswa']; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('apakah yakin ingin menghapus data')">Delete</a>
                    </td>
                </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



</body>
<?php  include "layout/footer.php"; ?>

</html>