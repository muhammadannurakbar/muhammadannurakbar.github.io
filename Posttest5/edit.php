<?php
$conn = new mysqli("localhost", "root", "", "pendaftaran");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pengguna WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $umur = $row['umur'];
    } else {
        echo "Data tidak ditemukan!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    $sql = "UPDATE pengguna SET nama=?, umur=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $nama, $umur, $id);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<form method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Nama Lengkap</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <label>Umur</label>
    <input type="number" name="umur" value="<?php echo $umur; ?>">
    <button type="submit">Update</button>
</form>
