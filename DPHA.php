<?php
include('koneksi.php');


$query = "SELECT * FROM agama";
$result = mysqli_query($conn, $query);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agama_id = $_POST['agama_id'];

    
    $hapus_query = "DELETE FROM agama WHERE agama_id = $agama_id";
    mysqli_query($conn, $hapus_query);

    
    header("Location: PHA.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Agama</title>
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
    <h2>Hapus Data Agama</h2>

    <form method="post" action="">
        <label for="agama_id">Pilih Agama untuk Dihapus:</label>
        <select name="agama_id" id="agama_id">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['agama_id'] . "'>" . $row['nama_agama'] . "</option>";
            }
            ?>
        </select>

        <br>

        <button type="submit">Konfirmasi Hapus</button>
    </form>

    <br>

    <a href="PHA.php">Kembali </a>
</body>
</html>
 