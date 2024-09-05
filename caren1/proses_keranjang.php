<?php
session_start();
include "koneksi.php"; // Pastikan koneksi database sudah benar

if (isset($_GET['op'])) {
    $op = $_GET['op'];
    $id = $_GET['id'];

    if ($op == 'tambah') {
        // Ambil data barang dari database
        $sql = "SELECT * FROM poltek_jember WHERE no = '$id'";
        $result = mysqli_query($koneksi, $sql);
        $barang = mysqli_fetch_assoc($result);

        if ($barang) {
            $stok_tersedia = $barang['stock_barang']; // Ambil stok yang tersedia

            // Jika keranjang belum ada, buat keranjang baru
            if (!isset($_SESSION['keranjang'])) {
                $_SESSION['keranjang'] = array();
            }

            // Set jumlah barang ke 1 jika barang belum ada di keranjang
            if (!isset($_SESSION['keranjang'][$id])) {
                if ($stok_tersedia > 0) {
                    $_SESSION['keranjang'][$id] = $barang;
                    $_SESSION['keranjang'][$id]['jumlah_barang'] = 1; // Jumlah default
                }
            } else {
                // Jika barang sudah ada di keranjang, periksa stok sebelum update
                $jumlah_sekarang = $_SESSION['keranjang'][$id]['jumlah_barang'];
                if ($jumlah_sekarang < $stok_tersedia) {
                    $_SESSION['keranjang'][$id]['jumlah_barang'] = $jumlah_sekarang + 1;
                }
            }
        }

        header("Location: barang.php?added=true"); // Redirect dengan parameter
        exit;
    } elseif ($op == 'hapus') {
        // Hapus barang dari keranjang
        if (isset($_SESSION['keranjang'][$id])) {
            unset($_SESSION['keranjang'][$id]);
        }

        header("Location: keranjang.php");
        exit;
    } elseif ($op == 'update' && isset($_GET['jumlah'])) {
        // Perbarui jumlah barang di keranjang
        $jumlah = intval($_GET['jumlah']);
        $sql = "SELECT stock_barang FROM poltek_jember WHERE no = '$id'";
        $result = mysqli_query($koneksi, $sql);
        $barang = mysqli_fetch_assoc($result);
        $stok_tersedia = $barang['stock_barang'];

        if (isset($_SESSION['keranjang'][$id])) {
            if ($jumlah <= $stok_tersedia) {
                $_SESSION['keranjang'][$id]['jumlah_barang'] = $jumlah;
            } else {
                $_SESSION['keranjang'][$id]['jumlah_barang'] = $stok_tersedia;
            }
        }

        header("Location: keranjang.php");
        exit;
    }
}

mysqli_close($koneksi);
