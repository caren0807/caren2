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
    <!-- (Copy your sidebar code here) -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <!-- (Copy your topbar code here) -->
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
                          <th>Tanggal Minjam</th>
                          <th>Tanggal Pengembalian</th>
                          <th>Jumlah Barang</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include "koneksi.php";

                        // Query SQL untuk mengambil data dari tabel transaksi
                        $sql = "SELECT * FROM transaksi";
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
                            echo "<td>" . $row['tanggal_minjam'] . "</td>";
                            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                            echo "<td>" . $row['jumlah_barang'] . "</td>";
                            echo "</tr>";
                            $no++;
                          }
                        } else {
                          echo "<tr><td colspan='8'>Tidak ada data ditemukan</td></tr>";
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
<script type="text/javascript">
    window.print();
</script>
</html>
