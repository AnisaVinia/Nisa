<?php
include('koneksi.php');

// Query untuk mendapatkan data kelas
$query = "SELECT * FROM kelas";
$result = mysqli_query($conn, $query);

// Handle penghapusan data jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas = $_POST['id_kelas'];

    // Query hapus data kelas
    $hapus_query = "DELETE FROM kelas WHERE kelas_id = $id_kelas";
    mysqli_query($conn, $hapus_query);

    // Redirect ke halaman admin.php setelah penghapusan
    header("Location: KHA.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Kelas</title>
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

        select {
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
    <h2>Hapus Data Kelas</h2>

    <form method="post" action="">
        <label for="id_kelas">Pilih Kelas untuk Dihapus:</label>
        <select name="id_kelas" id="id_kelas">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['kelas_id'] . "'>" . $row['nama_kelas'] . "</option>";
            }
            ?>
        </select>

        <br>

        <button type="submit">Konfirmasi Hapus</button>
    </form>

    <br>

    <a href="KHA.php">Kembali</a>
</body>
</html>
