<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peminjam_id = $_POST['peminjam_id'];
    $id_barang = $_POST['id_barang'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    // Validasi ID Peminjam dan ID Barang
    $check_query = "SELECT * FROM transaksi_jember WHERE id_barang = '$id_barang' AND nama_peminjam = '$peminjam_id' AND status_pengembalian = 'belum'";
    $check_result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        echo "<script>alert('Tidak ada transaksi yang cocok dengan ID peminjam dan ID barang.'); window.history.back();</script>";
        exit();
    }

    // Update status pengembalian
    $update_query = "UPDATE transaksi_jember SET status_pengembalian = 'sudah', tanggal_pengembalian = '$tanggal_pengembalian' WHERE id_barang = '$id_barang' AND nama_peminjam = '$peminjam_id' AND status_pengembalian = 'belum'";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        echo "<script>alert('Pengembalian barang berhasil.'); window.location.href='pengembalian.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memproses pengembalian.'); window.history.back();</script>";
    }
}
