<?php
include "koneksi.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_array($cek);

        // Periksa apakah password cocok
        if (password_verify($password, $data['password'])) { // gunakan password_verify jika password di-hash
            session_start();
            $_SESSION['id'] = $data['id_user'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['noHp'] = $data['noHp'];

            // Periksa kelas pengguna dan arahkan sesuai ke halaman yang sesuai
            if ($data['kelas'] == 'admin') {
                echo '<script>alert("Selamat datang ' . $data['nama'] . ' di sarana peminjaman barang"); location.href="home.php";</script>';
            } elseif ($data['kelas'] == 'petugas') {
                echo '<script>alert("Selamat datang ' . $data['nama'] . ' di sarana peminjaman barang"); location.href="barang.php";</script>';
            } else {
                echo '<script>alert("Akses tidak diizinkan");</script>';
            }
        } else {
            echo '<script>alert("Password salah");</script>';
        }
    } else {
        echo '<script>alert("Username tidak ditemukan");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Nunito', sans-serif;
        }

        .bg {
            background-image: url('kita.jpg'); /* Pastikan mengganti dengan path gambar yang benar */
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('kita.jpg');
            background-size: cover;
        }

        .form-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-box {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-box h3 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 50px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            padding: 10px 30px;
            border-radius: 50px;
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
        }

        .text-center a {
            text-decoration: none;
            color: #007bff;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="form-container">
            <div class="form-box">
                <h3>Login</h3>
                <p>Silahkan masukkan Nama dan Password terlebih dahulu!</p>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="signin" class="btn btn-primary" value="Login">
                    </div>
                </form>
                <div class="text-center mt-4">
                    <a href="reset_password.php">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
