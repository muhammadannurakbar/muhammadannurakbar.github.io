<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .result-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            color: #555;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Hasil Pendaftaran</h1>
        <?php
            $servername = "localhost";
            $username = "root"; 
            $password_db = ""; 
            $dbname = "pendaftaran"; 

            $conn = new mysqli($servername, $username, $password_db, $dbname);

            if ($conn->connect_error) {
                die("<p class='error'>Koneksi gagal: " . $conn->connect_error . "</p>");
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = htmlspecialchars(trim($_POST['nama']));
                $umur = htmlspecialchars(trim($_POST['umur']));
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

                $sql = "INSERT INTO pengguna (nama, umur, password) VALUES ('$nama', '$umur', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p><strong>Nama Lengkap:</strong> $nama</p>";
                    echo "<p><strong>Umur:</strong> $umur</p>";
                    echo "<p><strong>Password:</strong> (disembunyikan demi keamanan)</p>";
                    echo "<p class='success'>Data berhasil disimpan ke database.</p>";
                } else {
                    echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p class='error'>Tidak ada data yang dikirim.</p>";
            }

            $conn->close();
        ?>
    </div>
</body>
</html>
