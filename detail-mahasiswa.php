<?php 

include "layout/header.php";
include 'config/app.php';
$id_mahasiswa =(int)$_GET["id_mahasiswa"];

$detailmhs = SELECT("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Detail Mahasiswa <?=$detailmhs["nama"] ?></h1>
        <hr>
        <table class="mt-2 container table table-dark table-striped-columns">
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
                <td><img src="asset/img/<?= $detailmhs["foto"] ?>" alt="<?= $detailmhs["foto"] ?>" class="w-25 h-auto">
                </td>
            </tr>
        </table>
        <a href="mahasiswa.php" class="mt-2 btn btn-primary" style="float-right">Kembali</a>
    </div>


</body>

<?php include "layout/footer.php" ?>

</html>