<?php
session_start();
include 'koneksi.php';

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk cek login
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    // Ambil data user
    $user = mysqli_fetch_assoc($result);

    // Simpan data user ke session
    $_SESSION['username'] = $user['username'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['nama_panggilan'] = $user['nama_panggilan'];

    // Redirect ke halaman user
    header("Location: halamanuser.php");
    exit();
} else {
    // Jika username atau password salah
    header("Location: halamanlogin.php?pesan=gagal");
    exit();
}
?>
