<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin BPJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            margin: 0;
            background-color:#00bfff;
            font-family: Arial, sans-serif;
        }

        .card-container {
            margin-top: 200px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 400px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            background-color: #ffffff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .card button {
            background-color: #007bff;
            border: none;
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #0056b3;
        }
        

    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <h3>Lihat Data Peserta</h3>
            <button onclick="location.href='datapeserta.php'">Lihat Data</button>
        </div>
        <a href="halamanloginadmin.php" class="button-login">
            <button class="btn btn-primary mt-3">Kembali ke Login</button>
        </a>
    </div>
</body>
</html>
