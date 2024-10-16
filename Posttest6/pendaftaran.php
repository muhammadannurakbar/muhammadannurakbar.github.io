<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $institusi = $conn->real_escape_string($_POST['institusi']);
    $whatsapp = $conn->real_escape_string($_POST['whatsapp']);

    $sql = "INSERT INTO users (email, nama, institusi, whatsapp) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $nama, $institusi, $whatsapp);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>