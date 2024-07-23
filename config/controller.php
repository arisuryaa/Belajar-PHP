<?php 

include "database.php";

// READ
function select($query) {
    global $db;
  
      $results = mysqli_query($db,$query);
      $rows = [];
      while($row = mysqli_fetch_assoc($results)) {
          $rows[] = $row;
      }
    return $rows;
  
  }

// CREATE
  function addBarang($post) {
    global $db;

    $nama = $post["namaBarang"];
    $jumlah = $post["jumlahBarang"];
    $harga = $post["hargaBarang"];

    $query = "INSERT INTO barang VALUES (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db,$query);
    return mysqli_affected_rows($db);
  }

  // UPDATE
  function update_barang($post) {
    global $db;

    $id_barang = strip_tags( $post['id_barang']);
    $nama      = strip_tags( $post['nama']);
    $jumlah    = strip_tags( $post['jumlah']);
    $harga     = strip_tags( $post['harga']);

    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// DELETE
function hapusBarang($id_barang) {
    global $db;
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db,$query);
    return mysqli_affected_rows($db);
}

function addmahasiswa($post) {
  global $db;
  $nama =  strip_tags( $post["namaMahasiswa"]);
  $jurusan =  strip_tags( $post["jurusan"]);
  $jk =  strip_tags( $post["jk"]);
  $telepon =  strip_tags( $post["telepon"]);
  $email =  strip_tags( $post["email"]);
  $foto = uploadFile();

  $query = "INSERT INTO mahasiswa VALUES (null, '$nama', '$jurusan', '$jk','$telepon','$email','$foto')";

  mysqli_query($db,$query);
  return mysqli_affected_rows($db);
}

function uploadFile() {
  $namaFile = $_FILES['foto'] ['name'];
  $ukuranFile = $_FILES['foto'] ['size'];
  $error = $_FILES['foto'] ['error'];
  $tmpName = $_FILES['foto'] ['tmp_name'];

  // Check File
  $extensiFileValid = ['jpg','png','jpeg'];
  $extensiFile = explode('.',$namaFile);
  $extensiFile = strtolower(end($extensiFile));

  // Check Extensi File
  if(!in_array($extensiFile,$extensiFileValid)) {
    echo "
    <script>
      alert('format file tidak sesuai');
      document.location.href = 'form-tambah-mahasiswa.php';
    </script>
    ";
    die();
  } 

  // Check File Size (2MB)
  if($ukuranFile > 2048000) {
    echo "
      <script>
        alert('ukuran file terlalu besar, maximal 2MB')
        document.location.href = 'mahasiswa.php';
      </script>
    ";
    die();
  }

  // Mengacak Nama File 
  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $extensiFile;

  // pindahkan ke folder local untuk ditampilkan
  move_uploaded_file($tmpName,'asset/img/'.$namaFileBaru);  
  return $namaFileBaru;

}

function hapusMahasiswa($id_mahasiswa) {
  global $db;

  $data = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
  unlink("asset/img/". $data['foto']);

  $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
  mysqli_query($db,$query);
  return mysqli_affected_rows($db);
}

function update_mahasiswa($post) {
  global $db;

  $id_mahasiswa =  strip_tags( $post["id_mahasiswa"]);
  $nama =  strip_tags( $post["namaMahasiswa"]);
  $jurusan =  strip_tags( $post["jurusan"]);
  $jk =  strip_tags( $post["jk"]);
  $telepon =  strip_tags( $post["telepon"]);
  $email =  strip_tags( $post["email"]);
  $fotoLama = strip_tags( $post["fotoLama"]);


  if($_FILES['foto']['error'] == 4) {
    $foto = $fotoLama;
  } else {
    $foto = uploadFile();
  }

  $query = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan', jk = '$jk', telepon = '$telepon', email = '$email' , foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}


function login ($post) {
  global $db;
  $username = $post["username"];
  $password = $post["password"];

  // echo $post["remember"];
  $data = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username' ");

  if(mysqli_num_rows($data) === 1) {
      $row = mysqli_fetch_assoc($data);

      if (password_verify($password, $row["password"])) {
          echo "<script>
              document.location.href = 'barang.php';
          </script>";

          $_SESSION["Login"] = true;
          if(isset($post["remember"]) == "on") {
            setcookie("login","sukarya", time() + 60 * 60 * 24 * 7);
          }
      }  
  } else {
      echo "<script>
              alert('password/username Salah !');
      </script>";
  }  


}



function registrasi ($data) {
  global $db;

  $username = strtolower($data["username"]);
  $password = $data["password"];
  $password2 = $data["password2"];

  $alreadytaken = mysqli_query($db, "SELECT username FROM akun WHERE username = '$username' ");

  if(mysqli_fetch_assoc($alreadytaken)) {
    echo "
      <script>
        alert('username sudah terdaftar!');
      </script>
    ";
    return false;
  }

  if ($password !== $password2) {
    echo "
    <script>
      alert('password Salah!');
    </script>
  ";
  return false;
  }

  $password = password_hash($password,PASSWORD_DEFAULT);

  $query = "INSERT INTO akun VALUES (null, '$username', '$password')";

  mysqli_query($db,$query);

  return mysqli_affected_rows($db);

}

?>