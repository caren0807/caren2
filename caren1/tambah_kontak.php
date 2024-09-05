<?php
include "koneksi.php"; // Lakukan koneksi ke database di sini

if (isset($_POST['simpan'])) {
    $name = $_POST['nama'];
    $noHp = $_POST['noHp'];
    $kelas = $_POST['kelas'];

    // Query untuk menyimpan data pengguna ke dalam tabel
    $query = "INSERT INTO kontak ( nama, noHp, password, kelas) VALUES ('$name', '$noHp', '$kelas')";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Alert jika pendaftaran berhasil
        echo "<script>alert('Registration successful!'); location.href='kontak.php';</script>";
        // Redirect ke halaman sukses atau halaman lain yang sesuai
        exit();
    } else {
        // Alert jika pendaftaran gagal
        echo "<script>alert('Registration failed. Please try again.')</script>";
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
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
                    <form>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="noHp" name="noHp">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select name="kelas" id="" class="form-control">
                                    <option value="Petugas">Petugas</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-12">
                            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                        </div>
                    </form>
            </div>
        </div>
        <!-- untuk mengeluarkan data -->

    </div>
</body>