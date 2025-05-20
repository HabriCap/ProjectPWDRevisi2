<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPJS Ketenagakerjaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-image: linear-gradient(135deg, #0080ff, #00bfff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }

        .welcome-container {
            background-color: #ffffffdd;
            border-radius: 20px;
            padding: 50px 30px;
            text-align: center;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            color: #333;
        }

        .welcome-container h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #0056b3;
        }

        .welcome-container p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
        }

        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .button-container a {
            padding: 15px 30px;
            border-radius: 30px;
            background-color: #0056b3;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button-container a:hover {
            background-color: #003f7f;
            transform: scale(1.05);
        }

        .button-container a:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Selamat Datang!</h1>
        <p>Di Layanan BPJS Ketenagakerjaan. Pilih jenis login Anda:</p>
        <div class="button-container">
            <a href="halamanloginadmin.php">Login Admin</a>
            <a href="halamanlogin.php">Login User</a>
        </div>
    </div>
</body>
</html>
