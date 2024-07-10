<?php
include "layout/header.php";
include 'config/app.php';

$data_barang = select("SELECT * FROM barang");

session_start();

    
    if(!isset($_SESSION["Login"])) {
        header("Location: index.php");
    }

?>

<div class="container mt-5">
    <h1>Data Barang</h1>
    <hr>
    <a href="form-tambah.php"><button type="button" class="btn btn-primary mb-2">tambah</button></a>
    <table class="mt-2 container table table-dark table-striped-columns" id="example">
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
                    <a href="edit-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success ">Edit</a>
                    <a href="delete-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" id="del"
                        onclick="return confirm('apakah yakin ingin menghapus data')">Delete</a>
                </td>
            </tr>
            <?php $no++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include "layout/footer.php"; ?>

</html>