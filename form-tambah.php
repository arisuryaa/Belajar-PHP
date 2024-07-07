<?php

include "layout/header.php"; 
include 'config/app.php';

if (isset($_POST['submit'])) {
    if ($_POST > 0) {
        addBarang($_POST);
        echo "<script>
        alert('Data Barang Berhasil Ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Barang Gagal Ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-tambah</title>
</head>


<div class="container mt-5">
    <h1>Tambah Barang</h1>
    <hr>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input required type="text" class="form-control" id="nama" placeholder="Nama Barang" name="namaBarang">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input required type="number" class="form-control" id="jumlah" placeholder="Jumlah Barang"
                name="jumlahBarang">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input required type="number" class="form-control" id="harga" placeholder="Harga Barang" name="hargaBarang">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">submit</button>
    </form>
</div>



<?php include "layout/footer.php" ?>

</html>