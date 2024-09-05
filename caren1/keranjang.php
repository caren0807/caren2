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
    <script>
        function validateForm() {
            const inputs = document.querySelectorAll('input[name^="jumlah["]');
            let isValid = true;

            inputs.forEach(input => {
                const jumlah = parseInt(input.value) || 0;
                if (jumlah > 2) {
                    alert("Jumlah barang untuk item dengan ID " + input.name.match(/\d+/)[0] + " tidak boleh lebih dari 2.");
                    isValid = false;
                }
            });

            const tanggalPinjam = new Date(document.getElementById('tanggal_pinjam').value);
            const tanggalPengembalian = new Date(document.getElementById('tanggal_pengembalian').value);
            const lamaPinjam = (tanggalPengembalian - tanggalPinjam) / (1000 * 60 * 60 * 24);

            if (lamaPinjam > 2) {
                alert("Peminjaman tidak boleh lebih dari 2 hari.");
                isValid = false;
            }

            if (isValid) {
                showSuccessMessage();
            }

            return isValid;
        }

        function showSuccessMessage() {
            alert("Peminjaman berhasil!");
        }
    </script>


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
                        <span>pengembalian Barang</span></a>
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
                            <a class="collapse-item" href="barangdua.php">RSI Sidoarjo</a>
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
                            <a class="collapse-item active" href="keranjang.php">RSI Jember</a>
                            <a class="collapse-item" href="keranjangdua.php">RSI Sidoarjo</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksijember.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Transaksi</span></a>
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
                        <h2 class="h3 mb-0 text-gray-800">Peminjaman Barang RSI Jember</h2>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="container-fluid">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h3 class="m-0 font-weight-bold text-dark">RSI Jember</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <!-- Tampilkan Barang yang Sudah Dipilih -->
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Spesifikasi</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) {
                                                    $no = 1; // Inisialisasi nomor
                                                    foreach ($_SESSION['keranjang'] as $id => $barang) {
                                                        echo "<tr>";
                                                        echo "<td>" . $no . "</td>"; // Tampilkan nomor urut
                                                        echo "<td>" . $barang['nama_barang'] . "</td>";
                                                        echo "<td>" . $barang['spesifikasi'] . "</td>";
                                                        echo "<td>";
                                                        // Form untuk mengubah jumlah barang
                                                        echo "<input type='number' class='jumlah-barang' data-id='" . $barang['no'] . "' value='" . $barang['jumlah_barang'] . "' min='1' />";
                                                        echo "</td>";
                                                        echo "<td><img src='./img/" . $barang['foto'] . "' width='100' height='100'></td>";
                                                        echo "<td><a href='proses_keranjang.php?op=hapus&id=" . $barang['no'] . "' class='btn btn-danger btn-sm'>Hapus</a></td>";
                                                        echo "</tr>";

                                                        $no++; // Increment nomor urut
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6'>Keranjang kosong</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        <!-- Formulir Pencarian Peminjam -->
                                        <?php
                                        include "koneksi.php";

                                        // Deklarasikan variabel $search dengan nilai default
                                        $search = '';

                                        // Periksa apakah ada parameter pencarian dalam query string
                                        if (isset($_GET['search'])) {
                                            $search = $_GET['search'];
                                        }

                                        // Query SQL dengan pencarian
                                        $sql = "SELECT * FROM identitas";
                                        if ($search) {
                                            $search = mysqli_real_escape_string($koneksi, $search);
                                            $sql .= " WHERE nama_lengkap LIKE '%$search%' OR nomor_telepon LIKE '%$search%'";
                                        }

                                        // Jalankan query
                                        $result = mysqli_query($koneksi, $sql);
                                        ?>

                                        <!-- HTML untuk menampilkan hasil pencarian -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <h3>Daftar Identitas Peminjam</h3>
                                                <form id="searchForm" method="GET" action="">
                                                    <label for="search">Cari Nama Peminjam:</label>
                                                    <input type="text" id="search" name="search" placeholder="Masukkan nama peminjam" value="<?php echo htmlspecialchars($search); ?>">
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </form>

                                                <table class="table table-bordered dataTable" id="identitasTable" width="100%" cellspacing="0" role="grid" aria-describedby="identitasTable_info" style="<?php echo $search ? 'display: table;' : 'display: none;'; ?>">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nama Peminjam</th>
                                                            <th>Nomor Telepon</th>
                                                            <th>Alamat</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($result && mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['id'] . "</td>";
                                                                echo "<td>" . $row['nama_lengkap'] . "</td>";
                                                                echo "<td>" . $row['nomor_telepon'] . "</td>";
                                                                echo "<td>" . $row['alamat'] . "</td>";
                                                                echo "<td><button class='btn btn-primary btn-sm select-btn' data-id='" . $row['id'] . "' data-nama='" . $row['nama_lengkap'] . "'>Pilih</button></td>";
                                                                echo "</tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='5'>Tidak ada data ditemukan</td></tr>";
                                                        }
                                                        mysqli_close($koneksi);
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Formulir untuk Kirim Transaksi (sembunyikan secara default) -->
                                        <form id="transactionForm" action="proses_transaksi.php" method="POST" style="display: none;">
                                            <h3>Isi form dibawah ini!</h3>
                                            <input type="hidden" id="peminjam_id" name="peminjam_id">
                                            <label for="nama_peminjam">Nama Peminjaman:</label><br>
                                            <input type="text" id="nama_peminjam" name="nama_peminjam" required readonly><br><br>

                                            <label for="tanggal_pinjam">Tanggal Pinjam:</label><br>
                                            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required><br><br>

                                            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label><br>
                                            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" required><br><br>

                                            <input type="submit" name="kirim" value="Kirim">
                                        </form>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Menampilkan tabel jika ada hasil pencarian
                                        var search = new URLSearchParams(window.location.search).get('search');
                                        if (search) {
                                            document.getElementById('identitasTable').style.display = 'table';
                                        } else {
                                            document.getElementById('identitasTable').style.display = 'none';
                                        }

                                        // Menambahkan event listener pada tombol "Pilih"
                                        document.querySelectorAll('.select-btn').forEach(button => {
                                            button.addEventListener('click', function() {
                                                // Ambil data dari tombol
                                                const id = this.getAttribute('data-id');
                                                const nama = this.getAttribute('data-nama');

                                                // Isi formulir dengan nama peminjam
                                                document.getElementById('nama_peminjam').value = nama;
                                                document.getElementById('peminjam_id').value = id;

                                                // Tampilkan formulir peminjaman
                                                document.getElementById('transactionForm').style.display = 'block';
                                            });
                                        });

                                        // Mengupdate jumlah barang secara otomatis saat diubah
                                        document.querySelectorAll('.jumlah-barang').forEach(input => {
                                            input.addEventListener('change', function() {
                                                const id = this.getAttribute('data-id');
                                                const jumlah = this.value;

                                                // Buat permintaan AJAX untuk memperbarui jumlah barang
                                                fetch('proses_keranjang.php?op=update&id=' + id + '&jumlah=' + jumlah, {
                                                        method: 'GET'
                                                    })
                                                    .then(response => response.text())
                                                    .then(result => {
                                                        console.log('Update berhasil:', result);
                                                        // Anda bisa menambahkan notifikasi atau feedback lainnya di sini
                                                    })
                                                    .catch(error => {
                                                        console.error('Error:', error);
                                                    });
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>RSI Jember © Your Website 2024</span>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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

</body>

</html>