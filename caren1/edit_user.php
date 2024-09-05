<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    if (isset($_GET['id'])) {
        // Update data
        $iduser = $_GET['id'];
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $noHp = mysqli_real_escape_string($koneksi, $_POST['noHp']);
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);

        // Hanya hash password jika diisi
        $password_clause = "";
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password_clause = ", `password`='$password'";
        }

        $sql = "UPDATE `user` SET `nama`='$nama', `noHp`='$noHp', `username`='$username', `kelas`='$kelas' $password_clause WHERE id_user='$iduser'";
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            echo "<script>alert('You have successfully updated the data');</script>";
            echo "<script type='text/javascript'> document.location ='Users.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}

// Dapatkan data pengguna untuk form
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE id_user='$iduser'");
    $data = mysqli_fetch_assoc($query);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peminjaman barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Add / Tambah Data
            </div>
            <div class="card-body">
                <form action="" method="POST">

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo isset($data['nama']) ? htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="noHp" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="noHp" name="noHp" value="<?php echo isset($data['noHp']) ? htmlspecialchars($data['noHp'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($data['username']) ? htmlspecialchars($data['username'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo isset($data['password']) ? htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="Petugas" <?php echo isset($data['kelas']) && $data['kelas'] == 'Petugas' ? 'selected' : ''; ?>>Petugas</option>
                                <option value="Admin" <?php echo isset($data['kelas']) && $data['kelas'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-sm float-right" style="background-color: #8ab6d6; color: #000000;"/>
                    </div>

                </form>

            </div>
        </div>
        <!-- untuk mengeluarkan data -->

    </div>
</body>