<?php

include 'layout/header.php';
include 'config/app.php';

$id_barang = (int)$_GET['id_barang'];

if (hapusBarang($id_barang) > 0) {
    echo 
        "<script>
            alert('data Mahasiswa berhasil dihapus');
            document.location.href = 'index.php';
        </script>";
} else {
    echo 
        "<script>
            alert('data Mahasiswa gagal dihapus');
             document.location.href = 'index.php';
        </script>";
}

?>