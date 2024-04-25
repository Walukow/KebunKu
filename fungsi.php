<?php 
$conn = mysqli_connect("localhost","root","","kebunku");





function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}





function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $stock = htmlspecialchars($data["stock"]);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO tbl_produk (id ,nama, harga, stock, gambar) 
    VALUES ('','$nama', '$harga', '$stock', '$gambar')";
    
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}





function bayar($data, $username) {
    global $conn;
    for ($i = 0; $i < count($data["idproduk"]); $i++) {
        $idproduk = intval($data["idproduk"][$i]);
        $jumlah = intval($data["jumlah"][$i]);
        $tanggal = $data["tanggal"][$i];
        $stock = intval($data["stock"][$i]) - intval($data["jumlah"][$i]);    

        $query_riwayat = "INSERT INTO tbl_riwayat (id, username, idproduk, jumlah, tanggal)
        VALUES ('', '$username', '$idproduk', '$jumlah', '$tanggal')";
        mysqli_query($conn, $query_riwayat);

        $query_produk = "UPDATE tbl_produk SET stock = '$stock' WHERE id = $idproduk";
        mysqli_query($conn, $query_produk);

        $query_keranjang = "DELETE FROM tbl_keranjang WHERE idproduk = $idproduk AND username = '$username'";
        mysqli_query($conn, $query_keranjang);
    }

    return mysqli_affected_rows($conn);
}





function upload() {

    $nfile = $_FILES["gambar"]["name"];
    $sfile = $_FILES["gambar"]["size"];
    $efile = $_FILES["gambar"]["error"];
    $tfile = $_FILES["gambar"]["tmp_name"];

    $eksgambarT = ['png'];
    $eksgambar = explode('.', $nfile);
    $eksgambar = strtolower(end($eksgambar));
    if (!in_array($eksgambar, $eksgambarT)){
        echo"<script>
        alert('masukan gambar produk yang berekstensi .png')
        </script>";
        return false;
    }

    if($sfile > 2000000){
        echo "<script>
        alert('file gambar terlalu besar')
        </script>";
        return false;
    }

    $nfileN = uniqid();
    $nfileN .= '.';
    $nfileN .= $eksgambar;

    move_uploaded_file($tfile, 'img/'.$nfileN); 

    return $nfileN; 
}





function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM tbl_produk WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapuskeranjang($id, $username) {
    global $conn;
    mysqli_query($conn,"DELETE FROM tbl_keranjang WHERE idproduk = '$id' AND username = '$username'");
    return mysqli_affected_rows($conn);
}





function ubah($data) {
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $stock = htmlspecialchars($data["stock"]);
    $gambarLama = htmlspecialchars($data["gambarlama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    $query = "UPDATE tbl_produk SET 
                nama = ?,
                harga = ?,
                stock = ?,
                gambar = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $harga, $stock, $gambar, $id);
    mysqli_stmt_execute($stmt);

    return mysqli_affected_rows($conn);
}






function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $alamat = stripslashes($data["alamat"]);
    $nohp = stripslashes($data["nohp"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2){
        echo"<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn,"SELECT nama FROM tbl_user WHERE nama = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo"<script>
        alert('username sudah ada!')
        </script>";
        return false;
    }

    mysqli_query($conn,"INSERT INTO  tbl_user VALUES('','$username','$alamat','$nohp','$password')");
    
    return mysqli_affected_rows($conn);
}





function tambahkeranjang($data1, $data2) {
    global $conn;
    $iduser = htmlspecialchars($data1["username"]);
    $idproduk = htmlspecialchars($data2["id"]);

    $query = "INSERT INTO tbl_keranjang (id , username, idproduk) 
    VALUES ('', '$iduser', '$idproduk')";
    
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}





function pesan($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $pesan = htmlspecialchars($data["pesan"]);

    $query = "INSERT INTO tbl_pesan (id ,nama, email, pesan) 
    VALUES ('','$nama', '$email', '$pesan')";
    
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}





function flasher() {
    
}

?>