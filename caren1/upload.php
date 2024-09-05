<?php
// Pastikan tombol submit ditekan
if (isset($_POST["submit"])) {
    $target_dir = "uploads/"; // Direktori tempat menyimpan foto (pastikan folder ini ada)
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Path lengkap ke file yang diunggah
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Periksa apakah file gambar atau bukan
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File adalah gambar - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Periksa jika file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Periksa ukuran file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Maaf, file terlalu besar.";
        $uploadOk = 0;
    }

    // Izinkan format file tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0 karena ada kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, file tidak diunggah.";
    // Jika semuanya beres, coba unggah file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File ". basename( $_FILES["fileToUpload"]["name"]). " berhasil diunggah.";
            // Di sini Anda bisa menyimpan path file ke database atau melakukan tindakan lainnya
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>
