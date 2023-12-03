<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa - Tema Laut</title>
    
       
    <style>
        body {
            background-color: #00bcd4; 
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
            margin: 0 auto;
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

        select, input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #333333;
            border-radius: 4px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('https://img.icons8.com/small/16/000000/down-arrow.png') no-repeat right #ffffff;
            background-size: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50; 
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        } 
         .Home-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 20px;
        } 
    
    </style>
</head>
<body>
<a href="admin.php" class="Home-btn">Home</a>
<?php
include "koneksi.php";

if (isset($_GET['siswa_id'])) {
    $siswa_id = $_GET['siswa_id'];
    $query = "SELECT * FROM siswa 
              JOIN kelas ON siswa.kelas_id = kelas.kelas_id
              JOIN agama ON siswa.agama_id = agama.agama_id
              WHERE siswa_id = $siswa_id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

$query_agama = "SELECT * FROM agama";
$result_agama = mysqli_query($conn, $query_agama);

$query_kelas = "SELECT * FROM kelas";
$result_kelas = mysqli_query($conn, $query_kelas);


$query_nama_siswa = "SELECT siswa_id, nama_siswa FROM siswa";
$result_nama_siswa = mysqli_query($conn, $query_nama_siswa);
?>
  
<h2>Update Data Siswa</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="siswa_id" value="<?php echo $data['siswa_id']; ?>">

    <label for="nama_siswa">Nama Siswa:</label>
    <select name="siswa_id" required>
        <?php
        while ($row_nama_siswa = mysqli_fetch_assoc($result_nama_siswa)) {
            $selected_nama_siswa = ($data['siswa_id'] == $row_nama_siswa['siswa_id']) ? 'selected' : '';
            echo "<option value='{$row_nama_siswa['siswa_id']}' $selected_nama_siswa>{$row_nama_siswa['nama_siswa']}</option>";
        }
        ?>
    </select>

    <label for="kelas_id">Kelas:</label>
    <select name="kelas_id" required>
        <?php
        while ($row_kelas = mysqli_fetch_assoc($result_kelas)) {
            $selected_kelas = ($data['kelas_id'] == $row_kelas['kelas_id']) ? 'selected' : '';
            echo "<option value='{$row_kelas['kelas_id']}' $selected_kelas>{$row_kelas['nama_kelas']}</option>";
        }
        ?>
    </select>

    <label for="agama_id">Agama:</label>
    <select name="agama_id" required>
        <?php
        while ($row_agama = mysqli_fetch_assoc($result_agama)) {
            $selected_agama = ($data['agama_id'] == $row_agama['agama_id']) ? 'selected' : '';
            echo "<option value='{$row_agama['agama_id']}' $selected_agama>{$row_agama['nama_agama']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Update">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $siswa_id = $_POST['siswa_id'];
    $kelas_id = $_POST['kelas_id'];
    $agama_id = $_POST['agama_id'];

    if (empty($siswa_id) || empty($kelas_id) || empty($agama_id)) {
        echo "<p>Semua kolom harus diisi.</p>";
    } else {
        $update_query = "UPDATE siswa SET kelas_id=$kelas_id, agama_id=$agama_id WHERE siswa_id=$siswa_id";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            echo "<p>Data berhasil diupdate.</p>";
        } else {
            echo "<p>Gagal mengupdate data: " . mysqli_error($conn) . "</p>";
        }
    }
}

mysqli_close($conn);
?>

</body>
</html>
