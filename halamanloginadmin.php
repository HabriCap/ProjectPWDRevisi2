<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background-image: linear-gradient(135deg, #0080ff, #00bfff);
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .login-page {

            background-color: #ffffff;
            padding: 60px 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            margin: auto;
            width: 40%;
        }
        .login-page h2 {
            font-size: 28px;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }
        .login-form {
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555555;
        }
        .login-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 6px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }
        .login-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-page">
            <h2>Login Admin</h2>
            <form method="POST" action="prosesloginadmin.php">
                <div class="login-form">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="adminname" required>
                </div>
                <div class="login-form">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="login-footer">
                <p>Kembali ke <a href="loginadmin&user.php">Halaman Utama</a></p>
            </div>
        </div>
    </div>
</body>
</html>
