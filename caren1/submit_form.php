<?php
include "koneksi.php";

// Ambil data dari formulir
$nama_lengkap = $_POST['nama_lengkap'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];

// Validasi data (contoh sederhana)
$errors = [];
if (empty($nama_lengkap)) {
    $errors[] = "Nama Lengkap harus diisi.";
}
if (empty($tanggal_lahir)) {
    $errors[] = "Tanggal Lahir harus diisi.";
}
if (empty($jenis_kelamin)) {
    $errors[] = "Jenis Kelamin harus dipilih.";
}

// Jika ada error, tampilkan pesan error dan hentikan eksekusi
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>Error: $error</p>";
    }
    echo '<a href="barang.php">Kembali ke formulir</a>';
    exit;
}

// Persiapkan dan eksekusi query SQL untuk memasukkan data
$sql = "INSERT INTO identitas (nama_lengkap, tanggal_lahir, jenis_kelamin, nomor_telepon, alamat)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("sssss", $nama_lengkap, $tanggal_lahir, $jenis_kelamin, $nomor_telepon, $alamat);

if ($stmt->execute()) {
    // Jika berhasil, tampilkan alert dan arahkan ke halaman barang.php
    echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'barang.php';
          </script>";
    exit();
} else {
    echo "<p>Terjadi kesalahan: " . $stmt->error . "</p>";
}

// Tutup koneksi
$stmt->close();
$koneksi->close();
