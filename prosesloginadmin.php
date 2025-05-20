<?php
session_start();
include 'koneksi.php';
$username = $_POST['adminname'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE adminname='$username' AND password='$password'") or die(mysqli_error($koneksi));
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['adminname'] = $username;
    header("location:halamanadmin.php");
} else {
   
    header("location:halamanloginadmin.php?pesan=gagal");
}