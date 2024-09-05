<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $peminjam_id = $_POST['peminjam_id']; // ID peminjam
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    // Validasi jumlah barang
    $valid = true;
    foreach ($_SESSION['keranjang'] as $id => $barang) {
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
    $check_query = "SELECT * FROM transaksi_jember WHERE id_barang = ? AND status_pengembalian = 'belum'";
    $check_stmt = $koneksi->prepare($check_query);
    $check_stmt->bind_param("i", $peminjam_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Anda belum mengembalikan barang sebelumnya. Silakan kembalikan barang sebelum meminjam lagi.'); window.history.back();</script>";
        exit();
    }

    // Proses simpan transaksi jika validasi lolos
    $errors = []; // Array untuk menyimpan error
    foreach ($_SESSION['keranjang'] as $id => $barang) {
        $id_barang = $barang['no'];
        $jumlah_barang = $barang['jumlah_barang'];

        // Verifikasi apakah id_barang ada di tabel poltek_jember
        $check_query = "SELECT no FROM poltek_jember WHERE no = ?";
        $check_stmt = $koneksi->prepare($check_query);
        $check_stmt->bind_param("i", $id_barang);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows == 0) {
            $errors[] = "ID barang $id_barang tidak ditemukan di tabel referensi.";
            continue; // Skip barang yang tidak valid
        }

        $query = "INSERT INTO transaksi_jember (id_barang, nama_peminjam, tanggal_pinjam, tanggal_pengembalian, jumlah_barang) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("isssi", $id_barang, $nama_peminjam, $tanggal_pinjam, $tanggal_pengembalian, $jumlah_barang);
        $result = $stmt->execute();

        if (!$result) {
            $errors[] = "Terjadi kesalahan saat menyimpan transaksi untuk barang ID $id_barang.";
        }
    }

    if (empty($errors)) {
        // Hapus keranjang setelah transaksi berhasil
        unset($_SESSION['keranjang']);
        echo "<script>alert('Transaksi berhasil disimpan.'); window.location.href='transaksijember.php';</script>";
    } else {
        // Tampilkan error
        $error_message = implode("<br>", $errors);
        echo "<script>alert('$error_message'); window.history.back();</script>";
    }
}
