<?php 
require 'fungsi.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
        if (confirm('User baru berhasil ditambahkan! Klik OK untuk melanjutkan ke halaman login.')) {
            window.location.href = 'login.php';
        }
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
        <a href="index.php" class="navcon"><span class="kebun">Kebun</span><span class="ku">Ku</span></a>
        <h1 class="judul">Sign In</h1>

        <form action="" method="post" class="login-form">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="nohp">No Hp:</label>
                <input type="text" name="nohp" id="nohp" required>
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi Password:</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register" class="login-button">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>