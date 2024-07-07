<?php
include 'layout/header.php';
include 'config/app.php';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (hapusMahasiswa($id_mahasiswa) > 0) {
    echo 
        "<script>
            alert('data Mahasiswa berhasil dihapus');
            document.location.href = 'mahasiswa.php';
        </script>";
} else {
    echo 
        "<script>
            alert('data Mahasiswa gagal dihapus');
             document.location.href = 'mahasiswa.php';
        </script>";
}

?>