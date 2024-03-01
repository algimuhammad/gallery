<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM pengelola WHERE `email` = '$email' AND `password` = '$password'";

$query = mysqli_query($koneksi, $sql);
 
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_array($query);

    $_SESSION['username'] = $data['username'];
    $_SESSION['userid'] = $data['userid'];
    $_SESSION['status'] = 'login';
    echo "<script>
    alert('Login berhasil');
    location.href='../admin/index.php';
    </script>";
}else{
    echo "<script>
    alert('Username atau Password salah');
    location.href='../login.php';
    </script>";    
}

?>