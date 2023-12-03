

<?php
include "koneksi.php";

$query_siswa = "SELECT siswa.siswa_id, siswa.nama_siswa, kelas.nama_kelas, agama.nama_agama
                FROM siswa
                JOIN kelas ON siswa.kelas_id = kelas.kelas_id
                JOIN agama ON siswa.agama_id = agama.agama_id";
$result_siswa = mysqli_query($conn, $query_siswa);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $siswa_id = $_POST['siswa_id'];
    $delete_query = "DELETE FROM siswa WHERE siswa_id = $siswa_id";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "<p>Data siswa berhasil dihapus.</p>";
    } else {
        echo "<p>Gagal menghapus data siswa: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Siswa - Tema Laut</title>
    <style>
        
        body {
            background-color: #87CEEB; 
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

        select, input[type="submit"] {
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
            background-color: #f44336;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #d32f2f;
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

<h2>Hapus Siswa - Tema Laut</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="siswa_id">Pilih Siswa:</label>
    <select name="siswa_id" required>
        <?php
        while ($row_siswa = mysqli_fetch_assoc($result_siswa)) {
            echo "<option value='{$row_siswa['siswa_id']}'>{$row_siswa['nama_siswa']} - {$row_siswa['nama_kelas']} - {$row_siswa['nama_agama']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Hapus Siswa">
</form>
<a href="admin.php" class="home">Home</a>
</body>
</html>
