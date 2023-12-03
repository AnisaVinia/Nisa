

<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $kelas_id = $_POST['kelas_id'];
    $agama_id = $_POST['agama_id'];

   
    $insert_query = "INSERT INTO siswa (nama_siswa, kelas_id, agama_id) VALUES ('$nama_siswa', $kelas_id, $agama_id)";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        echo "<p class='success-message'>Data siswa berhasil ditambahkan.</p>";
    } else {
        echo "<p class='error-message'>Gagal menambahkan data siswa: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa - Tema Laut</title>
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

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333333; 
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }

        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
        a.home {
            background-color: #f44336; 
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
        }
        
    </style>
</head>
<body>

<h2>Tambah Data Siswa - Tema Laut</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="nama_siswa">Nama Siswa:</label>
    <input type="text" name="nama_siswa" required>

    <label for="kelas_id">Kelas:</label>
    <select name="kelas_id" required>
        <?php
        
        $query_kelas = "SELECT * FROM kelas";
        $result_kelas = mysqli_query($conn, $query_kelas);

        while ($row_kelas = mysqli_fetch_assoc($result_kelas)) {
            echo "<option value='{$row_kelas['kelas_id']}'>{$row_kelas['nama_kelas']}</option>";
        }
        ?>
    </select>

    <label for="agama_id">Agama:</label>
    <select name="agama_id" required>
        <?php
        
        $query_agama = "SELECT * FROM agama";
        $result_agama = mysqli_query($conn, $query_agama);

        while ($row_agama = mysqli_fetch_assoc($result_agama)) {
            echo "<option value='{$row_agama['agama_id']}'>{$row_agama['nama_agama']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Tambah Siswa">
</form>

<a href="admin.php" class="home">Home</a>

</body>
</html>
