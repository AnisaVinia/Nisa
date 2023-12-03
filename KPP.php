<?php
include('koneksi.php');

// Query untuk mendapatkan data kelas
$query = "SELECT * FROM kelas";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <style>
       table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
         .Delete-button {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px;}
         .ADD-button {
            background-color: green;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px; }
            
             .BACK-button {
            background-color:  #800080 ;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-right: 10px; }
    </style>
</head>
<body>
    <h2>Data Kelas</h2>
  <a href="KDP.php" class="Delete-button">Delete</a>
    <a href="KCP.php" class="ADD-button">ADD</a>
     <a href="petugas.php" class="BACK-button">Back</a>
    <table>
        <thead>
            <tr>
               
                <th>Nama Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nama_kelas'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br>

    
</body>
</html>
