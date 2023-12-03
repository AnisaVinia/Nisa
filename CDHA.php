<?php
include('koneksi.php');


$query_max_id = "SELECT MAX(agama_id) AS max_id FROM agama";
$result_max_id = mysqli_query($conn, $query_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id = $row_max_id['max_id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_agama = $_POST['nama_agama'];

   
    $id_baru = $max_id + 1;

    
    $tambah_query = "INSERT INTO agama (agama_id, nama_agama) VALUES ('$id_baru', '$nama_agama')";
    mysqli_query($conn, $tambah_query);

    
    header("Location: AHA.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Agama</title>
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
    <h2>Tambah Data Agama</h2>

    <form method="post" action="">
        <label for="nama_agama">Nama Agama:</label>
        <input type="text" name="nama_agama" id="nama_agama" required>

        <br>

        <button type="submit">Tambahkan Agama</button>
    </form>

    <br>

    <a href="AHA.php">Kembali</a>
</body>
</html>
