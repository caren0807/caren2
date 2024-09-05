<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    if (isset($_GET['id'])) {
        // Update data
        $idkontak2 = $_GET['id'];
        $nama = $_POST['nama'];
        $noHp = $_POST['noHp'];
      
        $kelas = $_POST['kelas'];

        $sql =  mysqli_query($koneksi, "UPDATE `kontak2` SET`nama`='$nama',`noHp`='$noHp', `kelas`='$kelas' WHERE id_kontak2='$idkontak2'");
        if ($sql) {
            echo "<script>alert('You have successfully updated the data');</script>";
            echo "<script type='text/javascript'> document.location ='kontak2.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
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
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="noHp" name="noHp" value="<?php echo isset($data['noHp']) ? $data['noHp'] : ''; ?>">
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