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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah-mahasiswa</title>
</head>


<div class="container mt-5">
    <h1>Tambah Mahasiswa</h1>
    <hr>
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
            <input required type="number" class="form-control" id="telepon" placeholder="nomor telepon" name="telepon">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input required type="email" class="form-control" id="email" placeholder="email" name="email">
        </div>
        <div class=" mb-3">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" id="foto" placeholder="foto" name="foto" onchange="preview()">
            <img src="" alt="" class="img-thumbnail img-preview" width="100px">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">submit</button>
    </form>
</div>


<script>
function preview() {
    const foto = document.querySelector("#foto");
    const imgPreview = document.querySelector(".img-preview");
    console.log(imgPreview);

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
</script>


<?php include "layout/footer.php" ?>

</html>