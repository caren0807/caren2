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
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home2.php">
          <div class="sidebar-brand-icon rotate-n-0">
            <i class="fas fa-boxes"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Peminjaman Barang</div>

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
          <a class="nav-link" href="barangdua.php">
            <i class="fas fa-fw fa-box"></i>
            <span>Peminjaman Barang</span></a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="pengembalian2.php">
            <i class="fas fa-fw fa-box"></i>
            <span>Pengembalian Barang</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>Pilihan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="barang.php">RSI Jember</a>
              <a class="collapse-item active" href="barangdua.php">RSI Sidoarjo</a>

            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#keranjang" aria-expanded="true" aria-controls="keranjang">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Keranjang</span>
          </a>
          <div id="keranjang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="keranjang.php">RSI Jember</a>
              <a class="collapse-item" href="keranjangdua.php">RSI Sidoarjo</a>

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
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Button to Form Identitas -->
            <li class="nav-item active">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#formIdentitasModal">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Form Identitas
              </a>
            </li>
            <!-- Nav Item - User Name -->
            <li class="nav-item active">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <?php echo htmlspecialchars($_SESSION['nama']); ?>
              </a>
            </li>
            <!-- Nav Item - Logout -->
            <li class="nav-item active">
              <a class="nav-link" href="index.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </li>
          </ul>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Peminjaman Barang Politeknik Sidoarjo</h2>
          </div>

          <!-- Content Row -->
        </div>

        <div class="container-fluid">

          <!-- Modal Form Identitas -->
          <div class="modal fade" id="formIdentitasModal" tabindex="-1" aria-labelledby="formIdentitasModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formIdentitasModalLabel">Form Identitas</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="formIdentitas" action="submit_form.php" method="POST">
                    <div class="mb-3">
                      <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="mb-3">
                      <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                      <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                      <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                      <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon">
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat:</label>
                      <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Pesan Kesalahan -->
          <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="errorModalLabel">Terjadi Kesalahan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="errorMessage">
                  <!-- Pesan kesalahan akan ditampilkan di sini -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>


          <!-- DataTales Example -->
          <?php
          include "koneksi.php"; // Pastikan koneksi database sudah benar

          // Query SQL untuk mengambil data dari tabel rsi_sidoarjo
          $sql = "SELECT * FROM rsi_sidoarjo";
          $result = mysqli_query($koneksi, $sql);

          ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
              <h3 class="m-0 font-weight-bold text-dark">RSI Sidoarjo</h3>
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
                      <th>Durasi Pemakaian/bulan</th>
                      <th>Fungsi Alat</th>
                      <th>Stock Barang</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
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

                        // Kolom untuk tombol pilih
                        echo "<td>";
                        echo "<a href='proses_keranjang2.php?op=tambah&id=" . $row['no'] . "' class='btn btn-primary btn-sm mr-1'>Pilih</a>";
                        echo "</td>";

                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='13'>Tidak ada data ditemukan</td></tr>";
                    }

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
  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="js/sb-admin-2.min.js"></script>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Fungsi untuk menampilkan modal dengan pesan kesalahan
      function showError(message) {
        document.getElementById('errorMessage').innerText = message;
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
      }

      // Cek jika ada pesan kesalahan dari server
      <?php if (isset($_SESSION['error_message'])): ?>
        showError('<?php echo $_SESSION['error_message']; ?>');
        <?php unset($_SESSION['error_message']); ?>
      <?php endif; ?>
    });
    document.querySelector('.btn-secondary').addEventListener('click', function() {
      // Menghapus data formulir
      document.getElementById('formIdentitas').reset();
      // Jika formulir berada di dalam modal, menutup modal
      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
      myModal.hide();
    });
  </script>
  <script>
    $(document).ready(function() {
      // Cek jika parameter 'added' ada di URL
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('added')) {
        alert('Barang berhasil ditambahkan ke keranjang!');
      }
    });
  </script>

</body>

</html>