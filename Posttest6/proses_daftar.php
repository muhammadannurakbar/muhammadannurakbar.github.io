<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = intval($_POST['umur']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO pengguna (nama, umur, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $nama, $umur, $password);

    if ($stmt->execute()) {
        echo "Pendaftaran berhasil!";
        echo "<a href='tampil.php'>Lihat Data Pengguna</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>