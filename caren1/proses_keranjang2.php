<?php
session_start();
include "koneksi.php"; // Pastikan koneksi database sudah benar

if (isset($_GET['op'])) {
    $op = $_GET['op'];
    $id = $_GET['id'];

    if ($op == 'tambah') {
        // Ambil data barang dari database
        $sql = "SELECT * FROM rsi_sidoarjo WHERE no = '$id'";
        $result = mysqli_query($koneksi, $sql);
        $barang = mysqli_fetch_assoc($result);

        if ($barang) {
            $stok_tersedia = $barang['stock_barang']; // Ambil stok yang tersedia

            // Jika keranjangdua belum ada, buat keranjangdua baru
            if (!isset($_SESSION['keranjangdua'])) {
                $_SESSION['keranjangdua'] = array();
            }

            // Set jumlah barang ke 1 jika barang belum ada di keranjangdua
            if (!isset($_SESSION['keranjangdua'][$id])) {
                if ($stok_tersedia > 0) {
                    $_SESSION['keranjangdua'][$id] = $barang;
                    $_SESSION['keranjangdua'][$id]['jumlah_barang'] = 1; // Jumlah default
                }
            } else {
                // Jika barang sudah ada di keranjangdua, periksa stok sebelum update
                $jumlah_sekarang = $_SESSION['keranjangdua'][$id]['jumlah_barang'];
                if ($jumlah_sekarang < $stok_tersedia) {
                    $_SESSION['keranjangdua'][$id]['jumlah_barang'] = $jumlah_sekarang + 1;
                }
            }
        }

        header("Location: barangdua.php?added=true"); // Redirect dengan parameter
        exit;
    } elseif ($op == 'hapus') {
        // Hapus barang dari keranjangdua
        if (isset($_SESSION['keranjangdua'][$id])) {
            unset($_SESSION['keranjangdua'][$id]);
        }

        header("Location: keranjangdua.php");
        exit;
    } elseif ($op == 'update' && isset($_GET['jumlah'])) {
        // Perbarui jumlah barang di keranjangdua
        $jumlah = intval($_GET['jumlah']);
        $sql = "SELECT stock_barang FROM rsi_sidoarjo WHERE no = '$id'";
        $result = mysqli_query($koneksi, $sql);
        $barang = mysqli_fetch_assoc($result);
        $stok_tersedia = $barang['stock_barang'];

        if (isset($_SESSION['keranjangdua'][$id])) {
            if ($jumlah <= $stok_tersedia) {
                $_SESSION['keranjangdua'][$id]['jumlah_barang'] = $jumlah;
            } else {
                $_SESSION['keranjangdua'][$id]['jumlah_barang'] = $stok_tersedia;
            }
        }

        header("Location: keranjangdua.php");
        exit;
    }
}

mysqli_close($koneksi);
