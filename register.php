<?php 

include "layout/header.php";
include 'config/app.php';

    if (isset($_POST["submit"])) {
        if(registrasi($_POST) > 0) {
            echo "
            <script>
                alert('Berhasil Register');
            </script>
        ";
        } else {
            echo "
            <script>
                alert('gagal register');
            </script>
        ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1>Register</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input required type="text" class="form-control" id="username" placeholder="masukkan username"
                    name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" class="form-control" id="password" placeholder="Masukkan Password"
                    name="password">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <input required type="password" class="form-control" id="password2" placeholder="Konfirmasi Password"
                    name="password2">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</body>

<?php include "layout/footer.php"; ?>

</html>