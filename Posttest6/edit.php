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
<?php
require "koneksi.php";

// Mengambil ID yang dilempar oleh link
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM mhs WHERE id = $id");
$mahasiswa = mysqli_fetch_assoc($result);

if (!$mahasiswa) {
    echo "<script>
            alert('Data tidak ditemukan!');
            document.location.href = 'CRUDAdmin.php';
          </script>";
    exit;
}

if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE mhs SET nama='$nama', nim='$nim', kelas='$kelas', prodi='$prodi' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'CRUDAdmin.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'CRUDAdmin.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data Mahasiswa | Pendataan Mahasiswa Universitas Mulawarman</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/base.css" />
    <link rel="stylesheet" href="styles/home.css" />
    <link rel="stylesheet" href="styles/admin.css" />
    <link rel="stylesheet" href="styles/crud.css" />
</head>

<body>

    <main class="data-mahasiswa-section">
        <h1 class="data-mahasiswa-title">Ubah Data Mahasiswa</h1>

        <div class="container">
            <a href="CRUDAdmin.php">
                <button class="back">Kembali</button>
            </a>
        </div>

                <input class="button" type="submit" value="Ubah" name="ubah">
            </form>
        </div>

    </main>

    <script src="/scripts/script.js"></script>
</body>

</html>
