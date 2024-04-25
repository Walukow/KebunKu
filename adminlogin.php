<?php 
session_start();

require 'fungsi.php';

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == 'admin') {
        if($password == 'passwordnyasusah') {
            $_SESSION["loginadmin"] = true;
            header("Location: read.php");
            exit;
        }
    // Login Sebagai Admin Pada Satu Tempat yang Sama
    // 
    // }else{
    //     if ($username == 'request') {
    //         if($password == 'P4ssw0rd%20G4mp4ng'){
    //             echo "<script>alert('Username atau password salah!');</script>";
    //             if($username == 'admin'){
    //                 if($password == 'P4ssw0rd%20G4mp4ng'){
    //                     echo "<script>alert('kamu akan memasuki mode admin');
    //                     document.location.href = 'read.php';
    //                     </script>";
    //                 }
    //             }
    //         }
    //     }
    echo "<script>alert('Username atau password salah!');</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="jarak"></div>
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
    </div>
</body>
</html>