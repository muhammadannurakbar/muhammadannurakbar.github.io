<?php
require "koneksi.php";

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];

    $sql = "INSERT INTO mhs (nama, nim, kelas, prodi) VALUES ('$nama', '$nim', '$kelas', '$prodi')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
                alert('Berhasil menambah data mahasiswa!');
                document.location.href = 'CRUDAdmin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambah data mahasiswa!');
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
    <title>Tambah Data Mahasiswa | Pendataan Mahasiswa Universitas Mulawarman</title>

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
        <h1 class="data-mahasiswa-title">Tambah Data Mahasiswa</h1>

        <div class="container">
            <a href="CRUDAdmin.php">
                <button class="back">Kembali</button>
            </a>
        </div>

        <div class="form-mhs">
            <form action="" method="post">
                <div class="input-field">
                    <label class="label-field" for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="" required>
                <div class="input-field">
                    <label class="label-field" for="prodi">Program Studi</label>
                    <select name="prodi" id="prodi" required>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                    </select>
                </div>
                <input class="button" type="submit" value="Tambah" name="tambah">
            </form>
        </div>

    </main>

    <script src="/scripts/script.js"></script>
</body>

</html>
