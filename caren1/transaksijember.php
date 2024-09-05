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
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
      <style>
        .bg-gradient-primary {
          background: linear-gradient(to right, #004e92, #0093e9);
          /* Contoh gradient */
        }
      </style>
      </head>

      <body class="bg-gradient-primary">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
          <div class="sidebar-brand-icon rotate-n-0">
            <i class="fas fa-boxes"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Peminjaman Barang</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="barang.php">
            <i class="fas fa-fw fa-box"></i>
            <span>Peminjaman Barang</span></a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="pengembalian.php">
            <i class="fas fa-fw fa-box"></i>
            <span>Pengembalian Barang</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>Pilihan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="barang.php">RSI Jember</a>
              <a class="collapse-item" href="barangdua.php">RSI Sidoarjo</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="keranjang.php">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Keranjang</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="transaksijember.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaksi</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
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
            <h2 class="h3 mb-0 text-gray-800">Daftar Transaksi</h2>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="container-fluid">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                  <h3 class="m-0 font-weight-bold text-dark">Transaksi</h3>
                  <button class="btn btn-primary">
                    <a class="text-white" target="_blank" href="cetak.php">CETAK</a>
                  </button>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
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

                        // Query SQL untuk mengambil data dari tabel transaksi_jember dan menggabungkannya dengan tabel poltek_jember
                        $sql = "SELECT t.id AS no, t.id_barang, t.nama_peminjam, p.nama_barang, p.spesifikasi, t.tanggal_pinjam, t.tanggal_pengembalian, t.jumlah_barang, t.status_pengembalian
                        FROM transaksi_jember t JOIN poltek_jember p ON t.id_barang = p.no ORDER BY t.status_pengembalian ASC";
                        $result = mysqli_query($koneksi, $sql);

                        // Periksa apakah query berhasil dieksekusi
                        if ($result && mysqli_num_rows($result) > 0) {
                          // Iterasi hasil query dan tampilkan dalam tabel
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['id_barang'] . "</td>";
                            echo "<td>" . $row['nama_peminjam'] . "</td>";
                            echo "<td>" . $row['nama_barang'] . "</td>";
                            echo "<td>" . $row['spesifikasi'] . "</td>";
                            echo "<td>" . $row['tanggal_pinjam'] . "</td>";
                            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                            echo "<td>" . $row['jumlah_barang'] . "</td>";
                            echo "<td>" . $row['status_pengembalian'] . "</td>";
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