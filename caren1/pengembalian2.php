<?php
include "koneksi.php";

// Deklarasikan variabel $search dengan nilai default
$search = '';

// Periksa apakah ada parameter pencarian dalam query string
if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($koneksi, $_GET['search']);
}

// Query SQL untuk mendapatkan daftar peminjam yang belum mengembalikan barang berdasarkan pencarian nama
$nama_query = "SELECT DISTINCT nama_peminjam FROM transaksi_sidoarjo WHERE nama_peminjam LIKE ? AND status_pengembalian = 'belum'";
$nama_stmt = $koneksi->prepare($nama_query);
$search_param = "%$search%";
$nama_stmt->bind_param('s', $search_param);
$nama_stmt->execute();
$result_nama = $nama_stmt->get_result();

// Proses ketika nama peminjam dipilih
$result_barang = false;
if (isset($_POST['nama_peminjam'])) {
  $selected_nama = mysqli_real_escape_string($koneksi, $_POST['nama_peminjam']);

  // Query SQL untuk mendapatkan daftar barang yang belum dikembalikan oleh peminjam yang dipilih
  $barang_query = "SELECT id_barang, tanggal_pinjam, tanggal_pengembalian, jumlah_barang, status_pengembalian
                     FROM transaksi_sidoarjo 
                     WHERE nama_peminjam = ? AND status_pengembalian = 'belum'";
  $barang_stmt = $koneksi->prepare($barang_query);
  $barang_stmt->bind_param('s', $selected_nama);
  $barang_stmt->execute();
  $result_barang = $barang_stmt->get_result();
}

// Update status pengembalian jika tombol "Pilih" diklik
if (isset($_POST['transaksi_id'])) {
  $transaksi_id = mysqli_real_escape_string($koneksi, $_POST['transaksi_id']);

  // Update status pengembalian menjadi 'sudah dikembalikan'
  $update_query = "UPDATE transaksi_sidoarjo SET status_pengembalian = 'sudah' WHERE id_barang = ?";
  $update_stmt = $koneksi->prepare($update_query);
  $update_stmt->bind_param('i', $transaksi_id);
  $update_result = $update_stmt->execute();

  if ($update_result) {
    echo "<script>alert('Status pengembalian berhasil diperbarui.'); window.location.href='';</script>";
  } else {
    echo "<script>alert('Gagal memperbarui status pengembalian.'); window.history.back();</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pencarian Peminjam</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="page-header mb-4">
      <h2>Pencarian Peminjam</h2>
    </div>

    <!-- Form pencarian -->
    <form id="searchForm" method="GET" action="" class="mb-4">
      <div class="input-group">
        <input type="text" id="search" name="search" placeholder="Masukkan nama peminjam" class="form-control" value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
    </form>

    <!-- Tabel hasil pencarian -->
    <div class="card">
      <div class="card-header">
        <h3>Hasil Pencarian Nama Peminjam</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Peminjam</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result_nama && $result_nama->num_rows > 0) {
                while ($row = $result_nama->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['nama_peminjam'], ENT_QUOTES, 'UTF-8') . "</td>";
                  echo "<td>
                          <form method='POST' action=''>
                              <input type='hidden' name='nama_peminjam' value='" . htmlspecialchars($row['nama_peminjam'], ENT_QUOTES, 'UTF-8') . "'>
                              <button type='submit' name='pilih' class='btn btn-primary btn-sm'>Pilih</button>
                          </form>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='2'>Tidak ada hasil untuk pencarian '" . htmlspecialchars($search, ENT_QUOTES, 'UTF-8') . "'</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Tabel daftar barang yang belum dikembalikan -->
    <?php if ($result_barang && $result_barang->num_rows > 0) { ?>
      <div class="card mt-4">
        <div class="card-header">
          <h3>Daftar Barang yang Belum Dikembalikan</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Jumlah Barang</th>
                  <th>Status Pengembalian</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = $result_barang->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['id_barang'], ENT_QUOTES, 'UTF-8') . "</td>";
                  echo "<td>" . htmlspecialchars($row['tanggal_pinjam'], ENT_QUOTES, 'UTF-8') . "</td>";
                  echo "<td>" . htmlspecialchars($row['tanggal_pengembalian'], ENT_QUOTES, 'UTF-8') . "</td>";
                  echo "<td>" . htmlspecialchars($row['jumlah_barang'], ENT_QUOTES, 'UTF-8') . "</td>";

                  // Menampilkan status pengembalian
                  $status_pengembalian = htmlspecialchars($row['status_pengembalian'], ENT_QUOTES, 'UTF-8');
                  $status_pengembalian_text = ($status_pengembalian == 'belum') ? 'Belum Dikembalikan' : 'Sudah Dikembalikan';

                  echo "<td>" . $status_pengembalian_text . "</td>";

                  // Menampilkan tombol berdasarkan status pengembalian
                  if ($status_pengembalian == 'belum') {
                    echo "<td>
                        <form method='POST' action=''>
                            <input type='hidden' name='transaksi_id' value='" . htmlspecialchars($row['id_barang'], ENT_QUOTES, 'UTF-8') . "'>
                            <button type='submit' name='update_status' class='btn btn-success btn-sm'>Sudah Dikembalikan</button>
                        </form>
                      </td>";
                  } else {
                    echo "<td></td>"; // Jika sudah dikembalikan, tidak ada aksi tambahan
                  }

                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- Tombol Kembali -->
    <a href="home.php" class="btn btn-secondary mt-4">Kembali</a>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>