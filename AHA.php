<?php
include('koneksi.php');


$query = "SELECT * FROM agama";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Agama</title>
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
    <h2>Data Agama</h2>
    <a href="DHAA.php" class="Delete-button">Delete</a>
    <a href="CDHA.php" class="ADD-button">ADD</a>
     <a href="admin.php" class="BACK-button">Back</a>
    <table>
        <tr>
            
            <th>Nama Agama</th>
        </tr>

        <?php
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
           
            echo "<td>" . $row['nama_agama'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>
</html>
