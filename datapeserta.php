<?php 
    include 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
          background-image: linear-gradient(135deg, #0080ff, #00bfff);
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 20px 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        h2 {
            color: #343a40;
            font-weight: 700;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color:rgb(24, 114, 203);
            color: #ffffff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn-edit, .btn-delete {
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-edit {
            width: 80px;
            background-color: #28a745;
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #218838;
        }
        .btn-delete {
            text-align: center;
            width: 80px;
            background-color: #dc3545;
            color: #ffffff;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-secondary {
            background-color: rgb(20, 123, 201);
            color: #ffffff;
            padding: 10px 20px;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color:rgb(20, 123, 201);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Data Peserta BPJS</h2>
        <table>
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>No BPJS</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat Lengkap</th>
                    <th>Biaya BPJS</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
    <?php
    $sql = "SELECT * FROM data_pasien";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['NIK']) . "</td>";
            echo "<td>" . htmlspecialchars($row['no_bpjs']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tempat_lahir']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_lahir']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status_pembayaran']). "</td>";

            echo "<td>" . 'Rp ' . number_format((float)$row['harga'], 0, ',', '.') . "</td>";
            echo "<td>
                    <a href='edit.php?id_peserta=" . $row['id_peserta'] . "'><button class='btn-edit'>Edit</button></a>
                    <a href='hapus.php?id_peserta=" . $row['id_peserta'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>
                        <button class='btn-delete'>Hapus</button>
                    </a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>Tidak ada data peserta</td></tr>";
    }
    ?>
</tbody>
        </table>
        <div class="text-center">
            <a href="halamanadmin.php">
                <button class="btn btn-secondary">Kembali Home</button>
            </a>
        </div>
    </div>
</body>
</html>
