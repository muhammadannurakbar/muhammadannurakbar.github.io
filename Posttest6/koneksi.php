<?php
$servername = "localhost"; // Server database Anda
$username = "root"; // Username default XAMPP
$password = ""; // Kosongkan jika menggunakan XAMPP
$dbname = "pendaftar"; // Nama database di phpMyAdmin

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
