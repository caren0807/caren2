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

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <!-- Sidebar Toggler can be placed here if needed -->
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
            <!-- Nav Item - Logout -->
            <li class="nav-item">
              <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Heading can be added here if needed -->
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- DataTales Example -->
            <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <!-- Tombol Kembali -->
                  <a href="home.php"><button class="btn btn-sm float-right" style="background-color: #8ab6d6; color: #000000;">Kembali</button></a>
                 <a href="cetak.php"><button class="btn btn-sm float-right" style="background-color: #8ab6d6; color: #000000;">CETAK</button></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="container">
                      <h1>Laporan Tahunan Peminjaman Barang</h1>
                      <form method="GET" action="">
                        <label for="tahun">Pilih Tahun:</label>
                        <select id="tahun" name="tahun">
                          <?php
                          // Menampilkan opsi tahun dari 2020 hingga tahun sekarang
                          $tahun_sekarang = date('Y');
                          for ($tahun = 2020; $tahun <= $tahun_sekarang; $tahun++) {
                            echo "<option value='$tahun'>$tahun</option>";
                          }
                          ?>
                        </select>
                        <input type="submit" value="Tampilkan">
                      </form>

                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Id Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Jumlah Barang</th>
                            <th>Status Pengembalian</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include "koneksi.php";

                          // Cek apakah user telah memilih tahun
                          if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
                            $tahun = $_GET['tahun'];

                            // Query SQL untuk mengambil data transaksi berdasarkan tahun yang dipilih
                            $sql = "SELECT * FROM transaksi_jember WHERE YEAR(tanggal_pinjam) = '$tahun'";
                          } else {
                            // Jika tahun tidak dipilih, tampilkan semua data
                            $sql = "SELECT * FROM transaksi_jember";
                          }

                          $result = mysqli_query($koneksi, $sql);

                          // Periksa apakah query berhasil dieksekusi
                          if ($result && mysqli_num_rows($result) > 0) {
                            // Iterasi hasil query dan tampilkan dalam tabel
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                              echo "<td>" . $no . "</td>";
                              echo "<td>" . (isset($row['id_barang']) ? $row['id_barang'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['nama_peminjam']) ? $row['nama_peminjam'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['nama_barang']) ? $row['nama_barang'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['spesifikasi']) ? $row['spesifikasi'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['tanggal_pinjam']) ? $row['tanggal_pinjam'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['tanggal_pengembalian']) ? $row['tanggal_pengembalian'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['jumlah_barang']) ? $row['jumlah_barang'] : 'N/A') . "</td>";
                              echo "<td>" . (isset($row['status_pengembalian']) ? $row['status_pengembalian'] : 'N/A') . "</td>";
                              echo "</tr>";
                              $no++;
                            }
                          } else {
                            echo "<tr><td colspan='9'>Tidak ada data ditemukan</td></tr>";
                          }

                          // Tutup koneksi
                          mysqli_close($koneksi);
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
