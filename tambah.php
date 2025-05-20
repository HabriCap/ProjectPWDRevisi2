<?php
session_start();
include 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['id'])) {
    header("Location: halamanlogin.php");
    exit();
}

$id_user = $_SESSION['id'];

// Cek apakah user sudah punya data di data_pasien
$sql_check = "SELECT * FROM data_pasien WHERE id = '$id_user' LIMIT 1";
$result_check = $koneksi->query($sql_check);
$has_data = ($result_check->num_rows > 0);

if (isset($_POST['submit'])) {
    if ($has_data) {
        // Jika sudah ada data, jangan simpan dan berikan pesan error
        $pesan = "Data sudah pernah diisi, silakan hubungi admin untuk mengubah data.";
        $pesan_type = "danger";
    } else {
        $NIK = $_POST['NIK'];
        $no_bpjs = $_POST['no_bpjs'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $harga = $_POST['harga'];

        $sql = "INSERT INTO data_pasien (NIK, no_bpjs, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, harga, id) 
                VALUES ('$NIK', '$no_bpjs', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$harga', '$id_user')";

        if ($koneksi->query($sql) === TRUE) {
            $pesan = "Data berhasil disimpan!";
            $pesan_type = "success";
            $has_data = true; // update status
        } else {
            $pesan = "Gagal menyimpan data: " . $koneksi->error;
            $pesan_type = "danger";
        }
    }

    header("Location: tambah.php?pesan=" . urlencode($pesan) . "&pesan_type=$pesan_type");
    exit();
}

// Ambil pesan dari redirect (jika ada)
$pesan = $_GET['pesan'] ?? null;
$pesan_type = $_GET['pesan_type'] ?? null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Data BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: rgba(247, 247, 247, 0.92);
            font-family: 'Segoe UI', sans-serif;
            padding-top: 20px;
        }

        .container {
            max-width: 900px;
            padding: 20px;
        }

        .card-header {
            background-color: #807f7d;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 1.25rem;
        }

        .btn-primary {
            background-color: #1f64be;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e07a00;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            text-align: center;
            font-weight: bold;
        }

        /* Styling card selectable */
        .card-select {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            border-radius: 8px;
            user-select: none;
        }

        .card-select:hover {
            border-color: #1f64be;
            background-color: #e7f0ff;
            box-shadow: 0 4px 8px rgba(31, 100, 190, 0.3);
        }

        .card-select.active {
            border-color: #e07a00;
            background-color: #ffe6cc;
            box-shadow: 0 4px 12px rgba(224, 122, 0, 0.6);
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php if ($has_data): ?>
<script>
    alert("Data hanya bisa diisi satu kali. Jika ingin mengubah data, silakan konfirmasi ke admin.");
    window.location.href = "datauser.php";
</script>
<?php endif; ?>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Tambahkan Data BPJS</h4>
        </div>
        <div class="card-body">

            <?php if (isset($pesan)): ?>
                <div class="alert alert-<?php echo htmlspecialchars($pesan_type); ?> alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars($pesan); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="tambah.php" method="POST" id="formBPJS">

                <div class="mb-3 row">
                    <label for="NIK" class="col-sm-3 col-form-label">NIK :</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="NIK" name="NIK" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_bpjs" class="col-sm-3 col-form-label">No BPJS :</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="no_bpjs" name="no_bpjs" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir :</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin :</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
                    </div>
                </div>

                <hr />

                <h5 class="mb-3 text-center">Pilih Jenis Pekerja dan Harga</h5>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card card-select" onclick="selectCard(this, '150000')">
                            <div class="card-body text-center">Pekerja Penerima Upah (Rp150,000)</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-select" onclick="selectCard(this, '200000')">
                            <div class="card-body text-center">Pekerja Bukan Penerima Upah (Rp200,000)</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-select" onclick="selectCard(this, '250000')">
                            <div class="card-body text-center">Pekerja Jasa Konstruksi (Rp250,000)</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-select" onclick="selectCard(this, '300000')">
                            <div class="card-body text-center">Pekerja Migran (Rp300,000)</div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="harga" id="harga" required />

                <div class="text-center mt-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg px-5">Simpan Data</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    function selectCard(element, price) {
     
        document.querySelectorAll('.card-select').forEach(card => {
            card.classList.remove('active');
        });

       
        element.classList.add('active');

        document.getElementById('harga').value = price;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
