<?php 

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
    <style>

* {
    margin : 0;
    font-family: "Poppins", sans-serif;
}

body {
    height : 100vh;
    overflow: hidden;   
}

 .container {
    height : 100vh;
    display: flex;
    align-items: center;
    background-color: #f8f9fa;
}

.foto {
    width: 50%;
    height : 100%;
    background-color : #0656d0;
    box-shadow:  0 4px 4px 0px rgba(0,0,0,0.25);
    display :flex;
    align-items : center;
    justify-content : center;
}

.foto img {
    width : auto;
    height : 22rem;
}


.forme {
    border : 1px solid black;
    height: 100%;
    width: 65%;
    display :flex;
    align-items : center;
    justify-content : center;
}

div .form-isi1 h1 {
    padding-bottom : 10px;
}

div .form-isi1 p {
    border-bottom : 1px solid gray;
    padding-bottom : 20px;
 
}

form input[type="text"] {
    width: 95%;
    padding: 10px;
    display: block;
    margin: 15px 0;
    border: 1px solid #000000;
    border-radius: 5px;
    background-color: #fff;
}

form input[type="password"] {
    width: 95%;
    padding: 10px;
    display: block;
    margin: 15px 0;
    border: 1px solid #000000;
    border-radius: 5px;
    background-color: #fff;
}

.button-submit button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

.regist {
    padding-top : 1.4rem;
    text-align : center;
}

.regist a {
    text-decoration : none;
    color : #007bff;
}

</style>
</head>

<body> <div class="container">
        <div class="foto">
            <img src="asset/img/WhatsApp Image 2024-07-08 at 15.40.30.jpeg" alt="">
        </div>
        <div class="forme">
            <form action="" method="POST">
                <div class="mb-3 form-isi1">
                    <h1>Register Account</h1>
                    <p>Please Register Account</p>
                    <input required type="text" class="form-control" id="username" placeholder="masukkan username"
                        name="username">
                </div>
                <div class="mb-3 form-isi">
                    <input required type="password" class="form-control" id="password" placeholder="Masukkan Password"
                        name="password">
                </div>
                <div class="mb-3 form-isi">
                    <input required type="password" class="form-control" id="password2" placeholder="Masukkan password2"
                        name="password2">
                </div>
                <div class="button-submit">
                    <button type="submit" name="submit">Submit</button>
                </div>
                <div class="regist">
                    <span>
                        already have an account? 
                        <a href="login.php">Login</a>
                    </span>
                </div>
            </form>
        </div>
    </div>



    //<div class="foto">
       <img src="asset/img/WhatsApp Image 2024-07-08 at 15.40.30.jpeg"alt="">
  </div>
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