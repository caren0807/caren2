<?php
include('koneksi.php');

// Pastikan parameter id tersedia dan merupakan angka
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM poltek_jember WHERE no ='$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

    // Periksa hasil query
    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='home.php';</script>";
    }
} else {
    echo "ID tidak valid atau tidak tersedia.";
}
?>
