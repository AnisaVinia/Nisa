<?php
include('koneksi.php');

// Ambil ID tertinggi dari tabel kelas
$query_max_id = "SELECT MAX(kelas_id) AS max_id FROM kelas";
$result_max_id = mysqli_query($conn, $query_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id = $row_max_id['max_id'];

// Handle penambahan data jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kelas = $_POST['nama_kelas'];

    // Tentukan ID baru dengan menambahkan 1 dari ID tertinggi
    $id_baru = $max_id + 1;

    // Query tambah data kelas
    $tambah_query = "INSERT INTO kelas (kelas_id, nama_kelas) VALUES ('$id_baru', '$nama_kelas')";
    mysqli_query($conn, $tambah_query);

    // Redirect ke halaman admin.php setelah penambahan
    header("Location: KPP.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kelas</title>
    <style>
        body {
            background-color: #003366;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #66ccff;
        }

        form {
            margin-top: 20px;
            color: #ffffff;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #66ccff;
            background-color: #003366;
            color: #ffffff;
        }

        button {
            padding: 10px;
            background-color: #66ccff;
            color: #003366;
            border: none;
            cursor: pointer;
        }

        a {
            color: #66ccff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Tambah Data Kelas</h2>

    <form method="post" action="">
        <label for="nama_kelas">Nama Kelas:</label>
        <input type="text" name="nama_kelas" id="nama_kelas" required>

        <br>

        <button type="submit">Tambahkan Kelas</button>
    </form>

    <br>

    <a href="KPP.php">Kembali</a>
</body>
</html>
