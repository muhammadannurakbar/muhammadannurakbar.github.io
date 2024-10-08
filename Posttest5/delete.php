<?php
$conn = new mysqli("localhost", "root", "", "pendaftaran");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pengguna WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
