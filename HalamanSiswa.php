
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama - Tema Laut</title>
    <style>
        body {
            background-color: #87CEEB;
            color: #FFFFFF; 
            font-family: 'Arial', sans-serif; 
        }

        h1 {
            color: #1E90FF; 
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #FFFFFF; 
        }

        th {
            background-color: #1E90FF; 
        }

        tr:nth-child(even) {
            background-color: #ADD8E6; 
        }

        tr:nth-child(odd) {
            background-color: #87CEEB; 
        } 
        .update-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 20px;
        }
        .logout-button {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
    </style>
</head>
<body>
<h1>Data Siswa - Siswa</h1>
<a href="GK.php" class="update-btn">Update Data</a>
<a href="Awal.php"class="logout-button">Log_out</a>

<table border="1">
    <tr>
        <th>ID Siswa</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Agama</th 
    </tr>
    
    <?php 
    include('koneksi.php');
    $query = "SELECT siswa.*, kelas.nama_kelas, agama.nama_agama
              FROM siswa
              INNER JOIN kelas ON siswa.kelas_id = kelas.kelas_id
              INNER JOIN agama ON siswa.agama_id = agama.agama_id";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["siswa_id"] . "</td>";
            echo "<td>" . $row["nama_siswa"] . "</td>";
            echo "<td>" . $row["nama_kelas"] . "</td>";
            echo "<td>" . $row["nama_agama"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data siswa.</td></tr>";
    }

   
    $conn->close();
    ?>

</table>

</body>
</html>
