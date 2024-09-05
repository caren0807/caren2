<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

      $query = mysqli_query($koneksi, "UPDATE rsi_sidoarjo SET no_bmn='$no_bmn', nama_barang='$nama_barang', spesifikasi='$spesifikasi', tahun_pengadaan='$tahun_pengadaan', kondisi_baik='$kondisi_baik', rusak_ringan='$rusak_ringan', rusak_berat='$rusak_berat', jumlah_barang='$jumlah_barang', durasi_pemakaian='$durasi_pemakaian', fungsi_alat='$fungsi_alat', stock_barang='$stock_barang', foto='$nama_gambar_baru' WHERE no='$no'");
      if ($query) {
        echo "<script>alert('Data berhasil diperbarui');</script>";
        echo "<script type='text/javascript'> document.location ='home2.php'; </script>";
      } else {
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi');</script>";
      }
    } else {
      echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='home2.php';</script>";
    }
  } else {
    // Jika tidak ada gambar baru, update data tanpa mengubah foto
    $query = mysqli_query($koneksi, "UPDATE rsi_sidoarjo SET no_bmn='$no_bmn', nama_barang='$nama_barang', spesifikasi='$spesifikasi', tahun_pengadaan='$tahun_pengadaan', kondisi_baik='$kondisi_baik', rusak_ringan='$rusak_ringan', rusak_berat='$rusak_berat', jumlah_barang='$jumlah_barang', durasi_pemakaian='$durasi_pemakaian', fungsi_alat='$fungsi_alat', stock_barang='$stock_barang' WHERE no='$no'");
    if ($query) {
      echo "<script>alert('Data berhasil diperbarui');</script>";
      echo "<script type='text/javascript'> document.location ='home2.php'; </script>";
    } else {
      echo "<script>alert('Terjadi kesalahan. Silakan coba lagi');</script>";
    }
  }
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
        Create / Edit Data
      </div>
      <div class="card-body">
        <?php if ($error) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error;
            header("refresh:3;url=home2.php"); ?>
          </div>
        <?php endif; ?>
        <?php if ($sukses) : ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses;
            header("refresh:3;url=home2.php"); ?>
          </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="mb-3 row">
            <label for="no" class="col-sm-2 col-form-label">No</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="no" name="no" value="<?php echo $no; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="no_bmn" class="col-sm-2 col-form-label">No BMN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="no_bmn" name="no_bmn" value="<?php echo $no_bmn; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $nama_barang; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="spesifikasi" class="col-sm-2 col-form-label">Spesifikasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="<?php echo $spesifikasi; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tahun_pengadaan" class="col-sm-2 col-form-label">Tahun Pengadaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tahun_pengadaan" name="tahun_pengadaan" value="<?php echo $tahun_pengadaan; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="kondisi_baik" class="col-sm-2 col-form-label">Kondisi Baik</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kondisi_baik" name="kondisi_baik" value="<?php echo $kondisi_baik; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="rusak_ringan" class="col-sm-2 col-form-label">Rusak Ringan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="rusak_ringan" name="rusak_ringan" value="<?php echo $rusak_ringan; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="rusak_berat" class="col-sm-2 col-form-label">Rusak Berat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="rusak_berat" name="rusak_berat" value="<?php echo $rusak_berat; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="durasi_pemakaian" class="col-sm-2 col-form-label">Durasi Pemakaian</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="durasi_pemakaian" name="durasi_pemakaian" value="<?php echo $durasi_pemakaian; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="fungsi_alat" class="col-sm-2 col-form-label">Fungsi Alat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fungsi_alat" name="fungsi_alat" value="<?php echo $fungsi_alat; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="stock_barang" class="col-sm-2 col-form-label">Stock Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="stock_barang" name="stock_barang" value="<?php echo $stock_barang; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="tambah_foto" class="col-sm-2 col-form-label">Tambah Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="tambah_foto" name="foto" value="<?php echo $foto; ?>">
            </div>
          </div>

          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>