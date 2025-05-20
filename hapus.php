<?php
include 'koneksi.php';

// Cek apakah ID peserta ada di URL
if (!isset($_GET['id_peserta'])) {
    echo "<script>alert('ID peserta tidak ditemukan!'); window.location.href='datapeserta.php';</script>";
    exit();
}

$id_peserta = $_GET['id_peserta'];

// Jika tombol konfirmasi hapus ditekan
if (isset($_POST['confirm_delete'])) {
    $sql_delete = "DELETE FROM data_pasien WHERE id_peserta='$id_peserta'";
    if ($koneksi->query($sql_delete) === TRUE) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='datapeserta.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $koneksi->error . "'); window.location.href='datapeserta.php';</script>";
    }
    exit();
}

// Ambil data peserta
$sql = "SELECT NIK, no_bpjs, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, harga FROM data_pasien WHERE id_peserta = '$id_peserta'";
$result = $koneksi->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='datapeserta.php';</script>";
    exit();
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(243, 242, 241, 0.92);
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
            margin-top: 50px;
        }
        .card-header {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
            font-size: 1.1rem;
            border-radius: 8px;
            padding: 15px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Konfirmasi Hapus Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <strong>PERINGATAN!</strong> Data yang Anda hapus tidak bisa dipulihkan. Apakah Anda yakin ingin menghapus data ini?
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>NIK</th>
                                <td><?php echo htmlspecialchars($data['NIK']); ?></td>
                            </tr>
                            <tr>
                                <th>No BPJS</th>
                                <td><?php echo htmlspecialchars($data['no_bpjs']); ?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo htmlspecialchars($data['tempat_lahir']); ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo htmlspecialchars($data['tanggal_lahir']); ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo htmlspecialchars($data['jenis_kelamin']); ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                            </tr>
                            <tr>
                                <th>Harga BPJS</th>
                                <td><?php echo "Rp" . number_format($data['harga'], 0, ',', '.'); ?></td>
                            </tr>
                        </table>

                        <form method="POST">
                            <div class="d-flex justify-content-end mt-3">
                                <a href="datapeserta.php" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" name="confirm_delete" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
