<?php 
include 'koneksi.php';
$message = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nama_panggilan = $_POST['nama_panggilan'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];

    if ($username == "" || $password == "" || $passwordConfirm == ""||$nama_panggilan== "") {
        $message = "Semua field harus diisi terlebih dahulu!.";
    } elseif ($password != $passwordConfirm) {
        $message = "Password dan konfirmasi password tidak sesuai!!";
    } else {
        $sql_check = "SELECT * FROM user WHERE username='$username'";
        $result = $koneksi->query($sql_check);

        if ($result->num_rows > 0) {
            $message = "Username sudah digunakan, coba yang lain.";
        } else {
            $sql_insert = "INSERT INTO user (username, nama_panggilan, password) VALUES ('$username','$nama_panggilan', '$password')";
            if ($koneksi->query($sql_insert) === TRUE) {
                $message = "Registrasi berhasil! Silahkan <a href='halamanlogin.php'>login</a>.";
            } else {
                $message = "Error: " . $koneksi->error;
            }
        }
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(98, 154, 223);
            margin: 0; padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background-color: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            width: 100%;
            background-color: #0059ff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0041cc;
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
            color: red;
            text-align: center;
        }
        .message a {
            color: #0059ff;
            text-decoration: none;
        }
        .message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <?php if ($message != "Username sudah digunakan, coba yang lain.") { echo "<div class='message'>$message</div>"; } ?>
        <form method="POST" action="register.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />

            <label for="nama_panggilan">Nama Panggilan</label>
            <input type="text" id="nama_panggilan" name="nama_panggilan" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />

            <label for="password_confirm">Confirm Password</label>
            <input type="password" id="password_confirm" name="password_confirm" required />

            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>