<?php
include 'koneksi.php'; // Menyertakan koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <h1>Data Pengguna Terdaftar - Detail</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Institusi</th>
                <th>Whatsapp</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk menampilkan data detail pengguna
            $sql = "SELECT id, nama, email, institusi, whatsapp, file FROM pengguna";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".htmlspecialchars($row["id"])."</td>
                            <td>".htmlspecialchars($row["nama"])."</td>
                            <td>".htmlspecialchars($row["email"])."</td>
                            <td>".htmlspecialchars($row["institusi"])."</td>
                            <td>".htmlspecialchars($row["whatsapp"])."</td>
                            <td><a href='".htmlspecialchars($row["file"])."'>Lihat File</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data pengguna.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h1>Data Pengguna Terdaftar - Sederhana</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk menampilkan data sederhana pengguna
            $sql = "SELECT id, nama, umur FROM pengguna";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".htmlspecialchars($no++)."</td>
                            <td>".htmlspecialchars($row['nama'])."</td>
                            <td>".htmlspecialchars($row['umur'])."</td>
                            <td><a href='edit.php?id=".htmlspecialchars($row['id'])."'>Edit</a> | 
                                <a href='delete.php?id=".htmlspecialchars($row['id'])."' onclick='return confirm(\"Apakah Anda yakin?\");'>Hapus</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada data.</td></tr>";
            }

            // Menutup koneksi database
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>
