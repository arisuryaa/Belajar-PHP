<?php 


include 'config/app.php';
session_start();
if (isset($_POST["submit"])) {

  
    $username = $_POST["username"];
    $password = $_POST["password"];
    $data = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username' ");
  
    if(mysqli_num_rows($data) === 1) {
        $row = mysqli_fetch_assoc($data);

        if (password_verify($password, $row["password"])) {
            echo "<script>
                document.location.href = 'index.php';
            </script>";

            $_SESSION["Login"] = true;
        }  
    } else {
        echo "<script>
                alert('password/username Salah !');
        </script>";
    }   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="foto">
            <img src="asset/img/bg.jpg" alt="">
        </div>
        <div class="form">
            <form action="" method="POST">
                <div class="mb-3">
                    <h1>Login</h1>
                    <label for="username" class="form-label">Username</label>
                    <input required type="text" class="form-control" id="username" placeholder="masukkan username"
                        name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input required type="password" class="form-control" id="password" placeholder="Masukkan Password"
                        name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>







    <!-- <div class="container mt-5 mb-5">
        <h1 class="head">Login</h1>
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
            <button type="submit" name="submit" class="btn btn-primary">submit</button>
        </form>
    </div> -->
</body>

<?php include "layout/footer.php"; ?>

</html>