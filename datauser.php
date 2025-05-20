<?php
session_start();
include 'koneksi.php';


$id_user = $_SESSION['id'];

// Ambil data pasien milik user ini
$sql = "SELECT * FROM data_pasien WHERE id = '$id_user'";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Anda</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>No BPJS</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Biaya BPJS</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
<?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['NIK']) ?></td>
        <td><?= htmlspecialchars($row['no_bpjs']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['tempat_lahir']) ?></td>
        <td><?= htmlspecialchars($row['tanggal_lahir']) ?></td>
        <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
        <td><?= htmlspecialchars($row['alamat']) ?></td>
        <td><?= 'Rp ' . number_format((float)$row['harga'], 0, ',', '.') ?></td>
        <td><?= htmlspecialchars($row['status_pembayaran']) ?></td>

    </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr><td colspan="8" class="text-center">Belum ada data yang tersimpan.</td></tr>
<?php endif; ?>
            </tbody>
        </table>
        <a href="halamanuser.php" class="btn-back">Kembali ke Halaman User</a>
    </div>
</body>
</html>
