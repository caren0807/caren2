<?php
include "koneksi.php";

// Cek koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$action = isset($_GET['action']) ? $_GET['action'] : 'add'; // 'add' or 'edit'
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Fungsi untuk mendapatkan nomor terbaru
function generateNo($koneksi) {
    $query = "SELECT MAX(no) as max_no FROM rsi_sidoarjo";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    $max_no = $data['max_no'];
    // Jika no terakhir adalah NULL (belum ada data), mulai dari 1
    if (!$max_no) {
        return '1';
    }
    // Menambahkan 1 ke nomor terakhir
    return strval(intval($max_no) + 1);
}

$no = '';
if ($action == 'add') {
    // Generate 'no' otomatis
    $no = generateNo($koneksi);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $no = $_POST['no'];
    $no_bmn = $_POST['no_bmn'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $tahun_pengadaan = $_POST['tahun_pengadaan'];
    $kondisi_baik = $_POST['kondisi_baik'];
    $rusak_ringan = $_POST['rusak_ringan'];
    $rusak_berat = $_POST['rusak_berat'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $durasi_pemakaian = $_POST['durasi_pemakaian'];
    $fungsi_alat = $_POST['fungsi_alat'];
    $stock_barang = $_POST['stock_barang'];
    $foto = $_FILES['foto']['name'];

    if ($foto != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, './img/' . $nama_gambar_baru);
        } else {
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='home2.php';</script>";
            exit;
        }
    }

    if ($action == 'add') {
        $query = mysqli_query($koneksi, "INSERT INTO rsi_sidoarjo (no, no_bmn, nama_barang, spesifikasi, tahun_pengadaan, kondisi_baik, rusak_ringan, rusak_berat, jumlah_barang, durasi_pemakaian, fungsi_alat, stock_barang, foto) VALUES ('$no', '$no_bmn', '$nama_barang', '$spesifikasi', '$tahun_pengadaan', '$kondisi_baik', '$rusak_ringan', '$rusak_berat', '$jumlah_barang', '$durasi_pemakaian', '$fungsi_alat', '$stock_barang', '$nama_gambar_baru')");
        if ($query) {
            echo "<script>alert('Data berhasil dimasukkan');</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan. Silakan coba lagi');</script>";
        }
    } elseif ($action == 'edit2') {
        if ($foto != "") {
            $query = mysqli_query($koneksi, "UPDATE rsi_sidoarjo SET no='$no', no_bmn='$no_bmn', nama_barang='$nama_barang', spesifikasi='$spesifikasi', tahun_pengadaan='$tahun_pengadaan', kondisi_baik='$kondisi_baik', rusak_ringan='$rusak_ringan', rusak_berat='$rusak_berat', jumlah_barang='$jumlah_barang', durasi_pemakaian='$durasi_pemakaian', fungsi_alat='$fungsi_alat', stock_barang='$stock_barang', foto='$nama_gambar_baru' WHERE no='$id'");
        } else {
            $query = mysqli_query($koneksi, "UPDATE rsi_sidoarjo SET no='$no', no_bmn='$no_bmn', nama_barang='$nama_barang', spesifikasi='$spesifikasi', tahun_pengadaan='$tahun_pengadaan', kondisi_baik='$kondisi_baik', rusak_ringan='$rusak_ringan', rusak_berat='$rusak_berat', jumlah_barang='$jumlah_barang', durasi_pemakaian='$durasi_pemakaian', fungsi_alat='$fungsi_alat', stock_barang='$stock_barang' WHERE no='$id'");
        }
        if ($query) {
            echo "<script>alert('Data berhasil diperbarui');</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan. Silakan coba lagi');</script>";
        }
    }

    echo "<script type='text/javascript'> document.location ='home2.php'; </script>";
}

// Jika action adalah edit, ambil data dari database
if ($action == 'edit2' && $id != '') {
    $result = mysqli_query($koneksi, "SELECT * FROM rsi_sidoarjo WHERE no='$id'");
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Barang</title>
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
        <div class="card">
            <div class="card-header">
                <?php echo $action == 'edit2' ? 'Edit Data' : 'Add / Tambah Data'; ?>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="mb-3 row">
                        <label for="no" class="col-sm-2 col-form-label">No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no" name="no" value="<?php echo $action == 'add' ? $no : (isset($data['no']) ? $data['no'] : ''); ?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="no_bmn" class="col-sm-2 col-form-label">No BMN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_bmn" name="no_bmn" value="<?php echo isset($data['no_bmn']) ? $data['no_bmn'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo isset($data['nama_barang']) ? $data['nama_barang'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="spesifikasi" class="col-sm-2 col-form-label">Spesifikasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="<?php echo isset($data['spesifikasi']) ? $data['spesifikasi'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tahun_pengadaan" class="col-sm-2 col-form-label">Tahun Pengadaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tahun_pengadaan" name="tahun_pengadaan" value="<?php echo isset($data['tahun_pengadaan']) ? $data['tahun_pengadaan'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kondisi_baik" class="col-sm-2 col-form-label">Kondisi Baik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kondisi_baik" name="kondisi_baik" value="<?php echo isset($data['kondisi_baik']) ? $data['kondisi_baik'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rusak_ringan" class="col-sm-2 col-form-label">Rusak Ringan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rusak_ringan" name="rusak_ringan" value="<?php echo isset($data['rusak_ringan']) ? $data['rusak_ringan'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rusak_berat" class="col-sm-2 col-form-label">Rusak Berat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rusak_berat" name="rusak_berat" value="<?php echo isset($data['rusak_berat']) ? $data['rusak_berat'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo isset($data['jumlah_barang']) ? $data['jumlah_barang'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="durasi_pemakaian" class="col-sm-2 col-form-label">Durasi Pemakaian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="durasi_pemakaian" name="durasi_pemakaian" value="<?php echo isset($data['durasi_pemakaian']) ? $data['durasi_pemakaian'] : ''; ?>">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="fungsi_alat" class="col-sm-2 col-form-label">Fungsi Alat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fungsi_alat" name="fungsi_alat" value="<?php echo isset($data['fungsi_alat']) ? $data['fungsi_alat'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stock_barang" class="col-sm-2 col-form-label">Stock Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock_barang" name="stock_barang" value="<?php echo isset($data['stock_barang']) ? $data['stock_barang'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto">
                            <?php if ($action == 'edit2' && isset($data['foto'])) : ?>
                                <img src="./img/<?php echo $data['foto']; ?>" width="100" class="mt-2">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="<?php echo $action == 'edit' ? 'Update Data' : 'Simpan Data'; ?>" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
                    <!-- Fields for other data -->
                    <!-- ... -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>
