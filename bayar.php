<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id'])) {
    header("Location: halamanlogin.php");
    exit();
}

$id_user = $_SESSION['id'];


$sql = "SELECT * FROM data_pasien WHERE id = '$id_user' LIMIT 1";
$result = $koneksi->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $NIK = $data['NIK'];
    $no_bpjs = $data['no_bpjs'];
    $nama = $data['nama'];
    $harga = $data['harga'];
    $status_pembayaran = isset($data['status_pembayaran']) ? $data['status_pembayaran'] : 'Belum Lunas';
} else {
    echo "<script>alert('Data peserta tidak ditemukan!'); window.location.href='halamanuser.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pembayaran BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h2>Pembayaran BPJS</h2>
        <div class="card mt-3">
            <div class="card-header">Konfirmasi Pembayaran</div>
            <div class="card-body">
                <p><strong>Nama Peserta:</strong> <?php echo htmlspecialchars($nama); ?></p>
                <p><strong>NIK:</strong> <?php echo htmlspecialchars($NIK); ?></p>
                <p><strong>No BPJS:</strong> <?php echo htmlspecialchars($no_bpjs); ?></p>
                <p><strong>Harga BPJS:</strong> Rp <?php echo number_format($harga, 0, ',', '.'); ?></p>
                <form method="POST" action="proses_bayar.php">
    <div class="mb-3">
        <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" class="form-control" required />
    </div>
    <div class="mb-3">
        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
        <select name="metode_pembayaran" class="form-select" required>
            <option value="Visa">Visa</option>
            <option value="BCA">BCA</option>
            <option value="BNI">BNI</option>
            <option value="Bank Lainnya">Bank Lainnya</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
</form>
                <a href="halamanuser.php" class="btn btn-secondary mt-3 w-100">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
