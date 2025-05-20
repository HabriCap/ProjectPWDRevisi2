<?php
include 'koneksi.php';

// Cek apakah ID peserta ada di URL
if (!isset($_GET['id_peserta'])) {
    echo "<script>alert('ID peserta tidak ditemukan!'); window.location.href='datapeserta.php';</script>";
    exit();
}

$id_peserta = $_GET['id_peserta'];

// Ambil data peserta dari database
$sql = "SELECT * FROM data_pasien WHERE id_peserta = '$id_peserta'";
$result = $koneksi->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='datapeserta.php';</script>";
    exit();
}

$data = $result->fetch_assoc();

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $NIK = $_POST['NIK'];
    $no_bpjs = $_POST['no_bpjs'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    $sql_update = "UPDATE data_pasien 
                   SET NIK='$NIK', no_bpjs='$no_bpjs', nama='$nama', tempat_lahir='$tempat_lahir', 
                       tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat' 
                   WHERE id_peserta='$id_peserta'";

    if ($koneksi->query($sql_update) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='datapeserta.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . $koneksi->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta</title>
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
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .form-control, .form-select {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #1f64be;
            border: none;
        }
        .btn-primary:hover {
            background-color: #145a9e;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Data Peserta BPJS</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="NIK" class="form-label">NIK:</label>
                                <input type="text" class="form-control" name="NIK" value="<?php echo htmlspecialchars($data['NIK']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_bpjs" class="form-label">No BPJS:</label>
                                <input type="text" class="form-control" name="no_bpjs" value="<?php echo htmlspecialchars($data['no_bpjs']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo htmlspecialchars($data['tempat_lahir']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo htmlspecialchars($data['tanggal_lahir']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select class="form-select" name="jenis_kelamin" required>
                                    <option value="Laki-laki" <?php echo $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php echo $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap:</label>
                                <textarea class="form-control" name="alamat" rows="4" required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="datapeserta.php" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
