<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Option</title>
    <style>
        body {
            background-color: #3498db;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            color: #3498db;
        }
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }
        a {
            display: none;
            padding: 10px;
            font-size: 16px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Silakan masuk ke akun berikut</h2>

        <form action="#" method="post" onchange="selectOnChange()">
            <select name="userType" id="userType">
                <option value="1">Siswa</option>
                <option value="2">Admin</option>
                <option value="3">Petugas</option>
            </select>
        </form>

        <a href="HalamanSiswa.php" id="linkSiswa">Halaman Siswa</a>
        <a href="admin.php" id="linkAdmin">Halaman Admin</a>
        <a href="petugas.php" id="linkPetugas">Halaman Petugas</a>

        <script>
            function selectOnChange() {
                var selectedUser = document.getElementById("userType").value;

                switch (selectedUser) {
                    case '1':
                        document.getElementById("linkSiswa").style.display = "block";
                        document.getElementById("linkAdmin").style.display = "none";
                        document.getElementById("linkPetugas").style.display = "none";
                        break;
                    case '2':
                        document.getElementById("linkSiswa").style.display = "none";
                        document.getElementById("linkAdmin").style.display = "block";
                        document.getElementById("linkPetugas").style.display = "none";
                        break;
                    case '3':
                        document.getElementById("linkSiswa").style.display = "none";
                        document.getElementById("linkAdmin").style.display = "none";
                        document.getElementById("linkPetugas").style.display = "block";
                        break;
                    default:
                        alert("Pilihan tidak valid");
                        break;
                }
            }
        </script>

    </div>

</body>
</html>
