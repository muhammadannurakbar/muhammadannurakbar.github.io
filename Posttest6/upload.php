<?php
include 'koneksi.php'; // Menyertakan koneksi ke database

if(isset($_POST["submit"])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $institusi = $_POST['institusi'];
    $whatsapp = $_POST['whatsapp'];

    // Folder tujuan upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file yang diunggah adalah file asli atau palsu
    $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
    if ($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.<br>";
        $uploadOk = 0;
    }

    // Cek jika file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.<br>";
        $uploadOk = 0;
    }

    // Cek ukuran file (maksimum 5MB)
    if ($_FILES["file_upload"]["size"] > 5000000) {
        echo "Maaf, file Anda terlalu besar. Maksimum 5MB.<br>";
        $uploadOk = 0;
    }

    // Batasi tipe file yang diizinkan
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.<br>";
        $uploadOk = 0;
    }

    // Jika tidak ada error, proses pengunggahan file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["file_upload"]["name"])) . " berhasil diunggah.<br>";

            // Query untuk memasukkan data pengguna dan file ke dalam database
            $sql = "INSERT INTO pengguna (nama, email, institusi, whatsapp, file)
                    VALUES ('$nama', '$email', '$institusi', '$whatsapp', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "Data dan file berhasil disimpan di database!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.<br>";
        }
    }

    $conn->close(); // Menutup koneksi
}
?>
<form method="POST" action="upload.php" enctype="multipart/form-data">
