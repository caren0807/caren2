<?php
include "koneksi.php"; // Pastikan file koneksi.php ada di path yang benar

if (!isset($conn)) {
    die("Koneksi database belum diatur.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $conn->real_escape_string($_POST['id_barang']);
    $nama_peminjam = $conn->real_escape_string($_POST['nama_peminjam']);
    $nama_barang = $conn->real_escape_string($_POST['nama_barang']);
    $spesifikasi = $conn->real_escape_string($_POST['spesifikasi']);
    $tanggal_minjam = $conn->real_escape_string($_POST['tanggal_minjam']);
    $tanggal_pengembalian = $conn->real_escape_string($_POST['tanggal_pengembalian']);
    $jumlah_barang = (int) $_POST['jumlah_barang'];
    $kondisi_barang = $conn->real_escape_string($_POST['kondisi_barang']);
    $kerusakan = $conn->real_escape_string($_POST['kerusakan']);
    $metode = $conn->real_escape_string($_POST['metode']);
    $pilihan = $conn->real_escape_string($_POST['pilihan']);

    $sql = "INSERT INTO pengembalian_barang (id_barang, nama_peminjam, nama_barang, spesifikasi, tanggal_minjam, tanggal_pengembalian, jumlah_barang, kondisi_barang, kerusakan, metode, pilihan) 
            VALUES ('$id_barang', '$nama_peminjam', '$nama_barang', '$spesifikasi', '$tanggal_minjam', '$tanggal_pengembalian', $jumlah_barang, '$kondisi_barang', '$kerusakan', '$metode', '$pilihan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data pengembalian berhasil disimpan.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
