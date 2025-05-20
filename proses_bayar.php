<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id'])) {
    header("Location: halamanlogin.php");
    exit();
}

$id_user = $_SESSION['id'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$metode_pembayaran = $_POST['metode_pembayaran'];

// Ambil data pasien untuk cek biaya
$sql = "SELECT harga FROM data_pasien WHERE id = '$id_user' LIMIT 1";
$result = $koneksi->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $harga_bpjs = $data['harga'];

    if ($jumlah_bayar >= $harga_bpjs) {
        // Update status pembayaran
        $sql_update = "UPDATE data_pasien SET status_pembayaran = 'Sudah Lunas' WHERE id = '$id_user'";
        if ($koneksi->query($sql_update)) {
            echo "<script>alert('Pembayaran berhasil! Terima kasih.'); window.location.href='datauser.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui status pembayaran.'); window.location.href='bayar.php';</script>";
        }
    } else {
        echo "<script>alert('Jumlah pembayaran kurang dari biaya BPJS.'); window.location.href='bayar.php';</script>";
    }
} else {
    echo "<script>alert('Data pasien tidak ditemukan.'); window.location.href='halamanuser.php';</script>";
}

$koneksi->close();
?>
