<?php
session_start();

if(!isset($_SESSION["loginadmin"])){
    header("Location: login.php");
    exit;
}


require 'fungsi.php';

$id = $_GET["id"];

if(hapus($id) > 0){
    echo"
        <script>
        alert('Data BERHASIL dihapus!');
        document.location.href = 'read.php';
        </script>
    ";
}else{
    echo"
        <script>
        alert('Data GAGAl dihapus!');
        document.location.href = 'read.php';
        </script>
        ";
}
?>