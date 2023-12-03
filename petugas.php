

<?php
include "koneksi.php";

function deleteSiswa($siswa_id, $conn) {
    $delete_query = "DELETE FROM siswa WHERE siswa_id = $siswa_id";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "<p>Data siswa berhasil dihapus.</p>";
    } else {
        echo "<p>Gagal menghapus data siswa: " . mysqli_error($conn) . "</p>";
    }
}

$query_siswa = "SELECT siswa.siswa_id, siswa.nama_siswa, kelas.nama_kelas, agama.nama_agama
                FROM siswa
                JOIN kelas ON siswa.kelas_id = kelas.kelas_id
                JOIN agama ON siswa.agama_id = agama.agama_id";
$result_siswa = mysqli_query($conn, $query_siswa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas Dashboard</title>
    <style>
       
body {
    background-color: #66b3ff; 
    color: #ffffff; 
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    color: #333333;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    color: #333333; 
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.aksi {
    text-align: center;
}

.edit, .hapus {
    padding: 5px 10px;
    text-decoration: none;
    margin: 0 5px;
}

.edit {
    background-color: #4CAF50;
    color: white;
}

.hapus {
    background-color: #f44336;
    color: white;
}
a.add {
            background-color: purple ;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
        }
.logout-button {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            }
 .Agama {
            background-color:   #00008B;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px; }    
             .Kelas {
            background-color:  #00008B;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px; }        
    </style>
</head>
<body>

<h2>Data Siswa - Petugas</h2>
<a href="AP.php" class="add">ADD</a> 
<a href="Awal.php"class="logout-button">Log_out</a>
<a href="PHA.php" class="Agama">Agama</a>
<a href="KPP.php" class="Kelas">Kelas</a>
<table>
    <thead>
    <tr>
        <th>Siswa ID</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Agama</th>
        <th class="aksi">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row_siswa = mysqli_fetch_assoc($result_siswa)) {
        echo "<tr>";
        echo "<td>{$row_siswa['siswa_id']}</td>";
        echo "<td>{$row_siswa['nama_siswa']}</td>";
        echo "<td>{$row_siswa['nama_kelas']}</td>";
        echo "<td>{$row_siswa['nama_agama']}</td>";
        echo "<td class='aksi'>";
        echo "<a href='GS.php?siswa_id={$row_siswa['siswa_id']}' class='edit'>Edit</a>";
         echo "<a href='HS.php?siswa_id={$row_siswa['siswa_id']}' class='hapus'>Edit</a>";
       
        echo "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>
