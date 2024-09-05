<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

    <style>
    .bg-gradient-primary {
      background: linear-gradient(to right, #004e92, #0093e9);/* Contoh gradient */
    }
  </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                        <p class="mb-4">Please enter your username and new password.</p>
                                    </div>
                                    <form class="user" action="reset_password.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="new_password" placeholder="New Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Back to Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>

<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $new_password = mysqli_real_escape_string($koneksi, $_POST['new_password']);
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Periksa apakah username ada di database
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Update password baru
        $sql_update = "UPDATE user SET password='$hashed_password' WHERE username='$username'";
        if (mysqli_query($koneksi, $sql_update)) {
            echo "<script>alert('Password has been reset successfully.'); window.location.href='index.php';</script>";
        } else {
            echo "Error resetting password: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('Username not found.'); window.location.href='reset_password.php';</script>";
    }

    mysqli_close($koneksi);
}
?>
