<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Transaksi - RSI Jember</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="container-fluid">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <!-- Tombol Kembali -->
                  <a href="home.php"><button class="btn btn-primary">Kembali</button></a>
                  <button class="btn btn-primary">
                    <a class="text-white" target="_blank" href="cetak.php">CETAK</a>
                  </button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="container">
                      <h1>Laporan Pengembalian Barang RSI Jember</h1>
                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                        <thead>
                          <tr>
                          <th>ID Barang</th>
                          <th>Nama Peminjam</th>
                          <th>Tanggal Pinjam</th>
                          <th>Tanggal Pengembalian</th>
                          <th>Jumlah Barang</th>
                          <th>Status Pengembalian</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "koneksi.php";

// Query SQL untuk mengambil data yang sudah dikembalikan
$sql = "SELECT * FROM transaksi_jember WHERE status_pengembalian = 'sudah'";
$result = mysqli_query($koneksi, $sql);

// Debugging: Periksa apakah query berhasil
if ($result) {
  if (mysqli_num_rows($result) > 0) {
    // Iterasi hasil query dan tampilkan dalam tabel
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($row['id_barang'], ENT_QUOTES, 'UTF-8') . "</td>";
      echo "<td>" . htmlspecialchars($row['nama_peminjam'], ENT_QUOTES, 'UTF-8') . "</td>";
      echo "<td>" . htmlspecialchars($row['tanggal_pinjam'], ENT_QUOTES, 'UTF-8') . "</td>";
      echo "<td>" . htmlspecialchars($row['tanggal_pengembalian'], ENT_QUOTES, 'UTF-8') . "</td>";
      echo "<td>" . htmlspecialchars($row['jumlah_barang'], ENT_QUOTES, 'UTF-8') . "</td>";

      // Menampilkan status pengembalian
      $status_pengembalian = htmlspecialchars($row['status_pengembalian'], ENT_QUOTES, 'UTF-8');
      $status_pengembalian_text = ($status_pengembalian == 'belum') ? 'Belum Dikembalikan' : 'Sudah Dikembalikan';

      echo "<td>" . $status_pengembalian_text . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='6'>Tidak ada data.</td></tr>"; // Kolom diperbarui menjadi 6 tanpa aksi
  }
} else {
  echo "Query gagal: " . mysqli_error($koneksi);
}
?>



                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; E-CAPOL</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
              Cancel
            </button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>
