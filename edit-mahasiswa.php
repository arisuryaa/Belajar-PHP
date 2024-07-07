<?php

include 'layout/header.php';
include 'config/app.php';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
        alert('Data Mahasiswa Berhasil Diubah');
        document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Mahasiswa Gagal Diubah');
       document.location.href = 'mahasiswa.php';
        </script>";
    }
}

?>

<div class="container mt-5">
    <h1>Edit Data Mahasiswa</h1>
    <hr>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa["id_mahasiswa"]; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mahasiswa["foto"]; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input required type="text" class="form-control" id="nama" placeholder="Nama mahasiswa" name="namaMahasiswa"
                value="<?= $mahasiswa["nama"] ?>">
        </div>


        <div class="row">
            <div class="mb-3 col-6">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-control" name="jurusan" id="jurusan" required>
                    <?php $jurusanMhs = $mahasiswa["jurusan"]; ?>
                    <?= var_dump($jurusanMhs); ?>
                    <option value="Rekayasa Perangkat Lunak"
                        <?= $jurusanMhs == 'Rekayasa Perangkat Lunak' ? 'selected' : null  ?>>
                        Rekayasa Perangkat Lunak </option>
                    <option value="Multimedia" <?= $jurusanMhs == 'Multimedia' ? 'selected' : null  ?>>
                        Multimedia</option>
                    <option value="Teknik Komputer Jaringan"
                        <?= $jurusanMhs == 'Teknik Komputer Jaringan' ? 'selected' : null  ?>>
                        Teknik Komputer Jaringan</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jk" id="jk" required>
                    <?php $jenisKelamin = $mahasiswa["jk"]; ?>
                    <option value="Laki-Laki" <?= $jenisKelamin == 'Laki-Laki' ? 'selected' : null  ?>> Laki-Laki
                    </option>
                    <option value="Perempuan" <?= $jenisKelamin == 'Perempuan' ? 'selected' : null  ?>> Perempuan
                    </option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">nomor telepon</label>
            <input required type="number" class="form-control" id="telepon" placeholder="nomor telepon" name="telepon"
                value="<?= $mahasiswa["telepon"] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input required type="email" class="form-control" id="email" placeholder="email" name="email"
                value="<?= $mahasiswa["email"] ?>">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" id="foto" placeholder="foto" name="foto" onchange="preview()">
            <img src="" alt="" class="img-thumbnail img-preview" width="100px">
            <div class="foto-sebelum">
                <p>Gambar Sebelumnya : </p>
                <img src="asset/img/<?= $mahasiswa["foto"] ?>" alt="" width="50px" height="auto">

            </div>
        </div>

        <button type="ubah" name="ubah" class="btn btn-primary">submit</button>
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

<?php 

include 'layout/footer.php';

?>