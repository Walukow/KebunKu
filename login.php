<?php 
session_start();

require 'fungsi.php';

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE nama = '$username'");

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = "$username";
            header("Location: index.php");
            exit;
        }
    }
    echo "<script>alert('Username atau password salah!');</script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
    <a href="index.php" class="navcon"><span class="kebun">Kebun</span><span class="ku">Ku</span></a>

        <h1 class="judul">Login</h1>
        <form action="" method="post" class="login-form">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="login" class="login-button">Login</button>
                </li>
            </ul>
        </form>

        <p class="register-text">Belum Punya Akun?</p>
        <a href="registrasi.php" class="register-link">Buat Akun!</a>
    </div>
</body>
</html>