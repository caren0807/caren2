<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SB Admin - Dashboard</title>

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
    background: linear-gradient(to right, #8ab4f8, #a2c2e0); /* Pastel blue with darker shades */
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
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-cube"></i>
          <span>Rekayasa Sistem Informasi Jember</span></a>

        <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="home2.php">
          <i class="fas fa-fw fa-cube"></i>
          <span>Rekayasa Sistem Informasi Sidoarjo</span></a>

      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list"></i>
          <span>Pilihan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="barang.php">Rekayasa Sistem Informasi Jember</a>
            <a class="collapse-item" href="barangdua.php">Rekayasa Sistem Informasi Sidoarjo</a>

          </div>
        </div>
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
            <a class="dropdown-item" href="#">
              <?php echo $_SESSION['nama']; ?>
            </a>
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
            <h2 class="h3 mb-0 text-gray-800">Peminjaman Barang Rekayasa Sistem Informasi Jember</h2>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
  <div class="card" style="background-color: #a3c6e4; /* Pastel Blue 1 - Slightly Darker */">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="peminjam.php">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
              Jumlah Peminjam
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-light"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card" style="background-color: #8ab9e6; /* Pastel Blue 2 - Slightly Darker */">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="Users.php">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
              Jumlah Pengguna
            </div>
          </a>
          <div class="h5 mb-0 font-weight-bold text-light"></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-users fa-2x text-light"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card" style="background-color: #9dbaf4; /* Pastel Blue 3 - Slightly Darker */">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="harian.php">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
              Jumlah Barang Dipinjam Perhari
            </div>
            <div class="h5 mb-0 font-weight-bold text-light"></div>
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-box fa-2x text-light"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card" style="background-color: #7aa1d1; /* Pastel Blue 4 - Slightly Darker */">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="bulanan.php">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
              Jumlah Barang Dipinjam Perbulan
            </div>
            <div class="h5 mb-0 font-weight-bold text-light"></div>
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-box fa-2x text-light"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card" style="background-color: #6a8ccf; /* Pastel Blue 5 - Slightly Darker */">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="tahunan.php">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
              Jumlah Barang Dipinjam Pertahun
            </div>
            <div class="h5 mb-0 font-weight-bold text-light"></div>
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-box fa-2x text-light"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card" style="background-color: #d0f0ff;"> <!-- Light Blue Color -->
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <a href="laporan_p.php">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"> <!-- Dark Text Color -->
              Laporan Pengembalian Barang 
            </div>
            <div class="h5 mb-0 font-weight-bold text-dark"></div> <!-- Dark Text Color -->
          </a>
        </div>
        <div class="col-auto">
          <i class="fas fa-undo fa-2x text-dark"></i> <!-- Dark Icon Color -->
        </div>
      </div>
    </div>
  </div>
</div>



 <!-- Other boxes... -->
 </div>


          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
              <h3 class="m-0 font-weight-bold text-dark">RSI</h3>
              <a href="tambah.php?op=tambah" class="btn btn-sm float-right" style="background-color: #8ab6d6; color: #000000;">Tambah Data</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No BMN</th>
                      <th>Nama Barang</th>
                      <th>Spesifikasi</th>
                      <th>Tahun Pengadaan</th>
                      <th>Kondisi Baik</th>
                      <th>Rusak Ringan</th>
                      <th>Rusak Berat</th>
                      <th>Jumlah Barang</th>
                      <th>Durasi Pemakaian</th>
                      <th>Fungsi Alat</th>
                      <th>Stock Barang</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "koneksi.php";

                    // Query SQL untuk mengambil data dari tabel poltek_jember
                    $sql = "SELECT * FROM poltek_jember";

                    $result = mysqli_query($koneksi, $sql);

                    // Periksa apakah query berhasil dieksekusi
                    if ($result && mysqli_num_rows($result) > 0) {
                      // Iterasi hasil query dan tampilkan dalam tabel
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['no'] . "</td>";
                        echo "<td>" . $row['no_bmn'] . "</td>";
                        echo "<td>" . $row['nama_barang'] . "</td>";
                        echo "<td>" . $row['spesifikasi'] . "</td>";
                        echo "<td>" . $row['tahun_pengadaan'] . "</td>";
                        echo "<td>" . $row['kondisi_baik'] . "</td>";
                        echo "<td>" . $row['rusak_ringan'] . "</td>";
                        echo "<td>" . $row['rusak_berat'] . "</td>";
                        echo "<td>" . $row['jumlah_barang'] . "</td>";
                        echo "<td>" . $row['durasi_pemakaian'] . "</td>";
                        echo "<td>" . $row['fungsi_alat'] . "</td>";
                        echo "<td>" . $row['stock_barang'] . "</td>";
                        echo "<td><img src='./img/" . $row['foto'] . "' width='100' height='100'></td>";

                        // Kolom untuk tombol edit dan delete
                       // Kolom untuk tombol edit dan delete
echo "<td>";
echo "<a href='tambah.php?action=edit&id=" . $row['no'] . "' class='btn' style='background-color: #a3c2e6; color: #000000; border-color: #a3c2e6;' class='btn btn-sm mr-1'>Edit</a>";
echo "<a href='delete.php?op=delete&id=" . $row['no'] . "' class='btn' style='background-color: #f4a1a1; color: #000000; border-color: #f4a1a1;' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>";
echo "</td>";

echo "</tr>";

                      }
                    } else {
                      echo "<tr><td colspan='14'>Tidak ada data ditemukan</td></tr>";
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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
</body>

</html>