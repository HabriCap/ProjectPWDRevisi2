
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <style>

        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        body {
            margin: 0;
            background-color: #f9fafb;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .login-page {
            flex: 1;
            padding: 60px 40px;
            background-color:rgb(153, 197, 247);
            display:flex;
            flex-direction: column;
            justify-content: center;

        }
        .login-page h2 {
            font-size: 28px;
            margin-bottom: 10px;

        }
        .login-page p {
            font-size: 14px;
            color: gray;
            margin-bottom: 25px;
            line-height: 1.6;
            
        }

        .login-form {
            margin-bottom: 15px;

        }

        .login-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid gray;
            border-radius: 6px;
        }

        .login-checkbox {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 20px;
        }

        button {
            background-color: rgb(0, 89, 255);
            color: white;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-picture {
            flex: 1;
            background-color: #e6f0ff;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .login-picture img {
            width: 100%;
            height: 100%;
        }
        </style>

    </head>
    <body>

        <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert alert-danger'>Login gagal! Username dan password tidak sesuai!</div>";
                    } elseif ($_GET['pesan'] == "logout") {
                        echo "<div class='alert alert-success'>Anda telah berhasil logout.</div>";
                    } elseif ($_GET['pesan'] == "belum_login") {
                        echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin.</div>";
                    }
                }
                ?>

        <div class="container">
                <div class="login-picture">
                    <img src="loginpicture.jpg" alt="Illustration">
                </div>
                <div class="login-page">
                    <h2 class="login-title"style ="font-family: arial"> Selamat Datang! <br>Di Pelayanan BPJS Ketenagakerjaan</h2>
                    <h3 class="login-text">Untuk tetap terhubung, silahkan login</h3>
                    <p>Belum terdaftar? 
                        <a href="register.php">Sign Up</a>
                    </p>
                    
                    <form method="POST" action="proseslogin.php" >
                            <div class="login-form">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="login-form">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>  
                        <div class="login-checkbox">
                            <label><input type="checkbox"> Remember me?</label>                     
                        </div>
                        <div>
                            <button type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
        </div>
    </body>
    </html>