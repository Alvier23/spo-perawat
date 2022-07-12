<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login - SPO Keperawatan</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .login,
        .image {
            min-height: 100vh
        }

        .bg-image {
            background-image: url('assets/img/admin.png');
            background-size: cover;
            background-position: center center
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-6 d-none d-md-flex bg-image"></div>
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-xl-6 mx-auto">
                                <h3 class="display-4">LOGIN!!</h3> <br>
                                <?php
                                session_start();
                                if (isset($_SESSION['gagal'])) {
                                    echo '<div class="alert alert-warning" role="alert">';
                                    echo $_SESSION['gagal'];
                                    echo '</div> ';
                                    session_unset();
                                }
                                ?>
                                <form action="" method="POST">
                                    <div class="form-group mb-3">
                                        <input name="username" id="inputUsername" type="text" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="password" id="inputPassword" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br>
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                </form>
                                <div class="text-center d-flex justify-content-between mt-4">
                                    <p> Belum memiliki Akun ? &nbsp<a href="register.php" class="font-italic text-muted"> <u>Buat Akun Baru</u></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>

<!-- fungsi login -->

<!-- kode proses login -->
<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("Location: index.php");
    } else {
        $_SESSION['gagal'] = "Username dan password salah !!";
        header("Location: login.php");
    }
}

?>