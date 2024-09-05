<?php
session_start();
include "koneksi.php";

// Cek jika koneksi database berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $peminjam_id = intval($_POST['peminjam_id']); // ID peminjam
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    // Validasi jumlah barang
    $valid = true;
    foreach ($_SESSION['keranjangdua'] as $id => $barang) {
        if ($barang['jumlah_barang'] > 2) {
            $valid = false;
            break;
        }
    }

    if (!$valid) {
        echo "<script>alert('Jumlah barang tidak boleh lebih dari 2 per item.'); window.history.back();</script>";
        exit();
    }

    // Validasi durasi pinjaman
    $tanggalPinjam = new DateTime($tanggal_pinjam);
    $tanggalPengembalian = new DateTime($tanggal_pengembalian);
    $lamaPinjam = $tanggalPengembalian->diff($tanggalPinjam)->days;

    if ($lamaPinjam > 2) {
        echo "<script>alert('Peminjaman tidak boleh lebih dari 2 hari.'); window.history.back();</script>";
        exit();
    }

    // Cek apakah ID peminjam valid dan ambil nama peminjam
    $check_query = "SELECT id, nama_lengkap FROM identitas WHERE id = ?";
    $check_stmt = $koneksi->prepare($check_query);
    if ($check_stmt === false) {
        die('Prepare failed: ' . $koneksi->error );
    }
    $check_stmt->bind_param("i", $peminjam_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        echo "<script>alert('ID peminjam tidak ditemukan.'); window.history.back();</script>";
        exit();
    }

    $peminjam = $check_result->fetch_assoc();
    $nama_peminjam = $peminjam['nama_lengkap'];

    // Cek apakah peminjam memiliki barang yang belum dikembalikan
    $check_query = "SELECT * FROM transaksi_sidoarjo WHERE id_barang = ? AND status_pengembalian = 'belum'";
    $check_stmt = $koneksi->prepare($check_query);
    if ($check_stmt === false) {
        die('Prepare faileds: ' . $koneksi->error);
    }
    $check_stmt->bind_param("i", $peminjam_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Anda belum mengembalikan barang sebelumnya. Silakan kembalikan barang sebelum meminjam lagi.'); window.history.back();</script>";
        exit();
    }

    // Proses simpan transaksi jika validasi lolos
    $errors = []; // Array untuk menyimpan error
    foreach ($_SESSION['keranjangdua'] as $id => $barang) {
        $id_barang = $barang['no'];
        $jumlah_barang = $barang['jumlah_barang'];

        // Verifikasi apakah id_barang ada di tabel rsi_sidoarjo
        $check_query = "SELECT no FROM rsi_sidoarjo WHERE no = ?";
        $check_stmt = $koneksi->prepare($check_query);
        if ($check_stmt === false) {
            $errors[] = 'Prepare failed: ' . $koneksi->error;
            continue;
        }
        $check_stmt->bind_param("i", $id_barang);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows == 0) {
            $errors[] = "ID barang $id_barang tidak ditemukan di tabel referensi.";
            continue; // Skip barang yang tidak valid
        }

        $query = "INSERT INTO transaksi_sidoarjo (id_barang, nama_peminjam, tanggal_pinjam, tanggal_pengembalian, jumlah_barang) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        if ($stmt === false) {
            $errors[] = 'Prepare failed: ' . $koneksi->error;
            continue;
        }
        $stmt->bind_param("isssi", $id_barang, $nama_peminjam, $tanggal_pinjam, $tanggal_pengembalian, $jumlah_barang);
        $result = $stmt->execute();

        if (!$result) {
            $errors[] = "Terjadi kesalahan saat menyimpan transaksi untuk barang ID $id_barang. Error: " . $stmt->error;
        }
    }

    if (empty($errors)) {
        // Hapus keranjang setelah transaksi berhasil
        unset($_SESSION['keranjangdua']);
        echo "<script>alert('Transaksi berhasil disimpan.'); window.location.href='transaksisidoarjo.php';</script>";
    } else {
        // Tampilkan error
        $error_message = implode("<br>", $errors);
        echo "<script>alert('$error_message'); window.history.back();</script>";
    }
}
?>
