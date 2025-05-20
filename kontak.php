<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>

        body {
            margin: 0;
            background-color: rgb(0, 91, 150); 
            font-family: 'Poppins', sans-serif;
        }

    .navbar {
     height: 40px;
     position: fixed;
     top: 0;
     left: 0;
     width: 100%;
     z-index: 10;
     background: rgba(0, 0, 0, 0.65);
     padding: 15px 40px;
     display: flex;
     align-items: center;
     justify-content: space-between;
     box-shadow: 0 2px 8px rgba(0,0,0,0.3);
     transition: background-color 0.3s ease;
  }
  .navbar:hover {
      background: rgb(1, 1, 1);
  }
  .nav-category a {
      margin: 0 15px;
      color: #f1f1f1;
      text-decoration: none;
      font-size: 18px;
      padding: 8px 12px;
      border-radius: 6px;
      transition: background-color 0.3s, color 0.3s;
  }
  .nav-category a:hover {
      background-color:rgb(106, 124, 144);
      color: white;
  }
  .nav-logo img {
      height: 45px;
      margin-right: 50px;
      filter: drop-shadow(1px 1px 1px rgba(0,0,0,0.4));
  }
        .nav-logo {
            text-align: left;
            line-height: 1.1;
            gap: 10;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .nav-logo img {
            height: 40px;
            margin-right: 50px;
        }
    .nav-logo span {
        font-weight: bold;
        display: flex;
        flex-direction: column;
    }
    .nav-logo .font1 {
        color: rgb(57, 180, 74);
        margin-right: 84px;
        font-size: 20px;
    }  
    .nav-logo .font2 {
        color:rgb(11, 119, 189);
        font-size: 17px;
    }

        .container-container {
            
           height: 700px;
            background-color: rgb(0, 91, 150);
        }

        .container {
            border-radius: 12px;
            background-color:rgb(255, 255, 255);
            margin: 120px auto;
            max-width: 1200px;
            padding: 50px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .container h1 {
            color: #0b3d91;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
        }
        .box-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        .box {
            background-color: #f5f5f5;
            text-align: center;
            border-radius: 12px;
            padding: 40px 20px;
            width: 300px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            position: relative;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .icon-circle {
            width: 70px;
            height: 70px;
            background-color: #0077c0;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 28px;
            margin: 0 auto 20px auto;
            transition: background-color 0.3s;
        }
        .box:hover .icon-circle {
            background-color: #005b96;
        }
        
        .region-section {
        height:700px;
        margin-top: 40px;
        padding: 80px 30px;
        background-color: #ffffff;
        text-align: center;
            }

.region-section h2 {
    margin-top: 60px;
    font-size: 30px;
    color: #0b3d91;
    margin-bottom: 40px;
}

.region-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.region-card {
    background-color: #fff;
    border-radius: 12px;
    padding: 20px 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    text-align: left;
    transition: transform 0.3s, box-shadow 0.3s;
}

.region-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.region-card h4 {
    color: #0b3d91;
    margin-bottom: 10px;
}

.region-card p {
    margin: 4px 0;
    color: #333;
    
}

.region-card a {
    display: inline-block;
    margin-top: 10px;
    color: #0077c0;
    font-weight: bold;
    text-decoration: none;
    
}

.region-card a i {
    margin-left: 4px;
}

    </style>
</head>
<body>
    <div class="navbar" id="navbar">
        <div class="nav-logo">
            <span class="font1">BPJS</span>
            <span class="font2">Ketenagakerjaan</span>
        </div>
        <div class="nav-category">
            <a href="halamanuser.php">Home</a>
            <a href="halamanuser.php#informasi">Informasi Kepesertaan</a>
            <a href="Halamanuser.php#review">Benefit</a>
            <a href="#Wilayah">Kantor Wilayah</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="nav-search">
        </div>
    </div>
    
    <div class="container-container">
    <div class="container">
        <h1>Layanan Masyarakat BPJS Ketenagakerjaan</h1>
        <div class="box-container">
            <div class="box">
                <div class="icon-circle"><i class="fas fa-phone"></i></div>
                <h4>Call Center</h4>
                <p>175</p>
            </div>
            <div class="box">
                <div class="icon-circle"><i class="fas fa-envelope"></i></div>
                <h4>Email</h4>
                <p>care@bpjsketenagakerjaan.go.id</p>
            </div>
            <div class="box">
                <div class="icon-circle"><i class="fas fa-globe"></i></div>
                <h4>Social Media</h4>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="region-section" id="Wilayah">
        <br><br>
    <h2>Kantor Wilayah</h2>
    <div class="region-grid">
        <div class="region-card">
            <h4>Kanwil Banten</h4>
            <p>Jl. Ahmad Yani No. 154, Sumur Pecung, Serang, Provinsi Banten, 42118</p>
            <p>Telp: (0254) 267 140</p>
            <p>Faks: (0254) 228 885</p>
            <a href="https://maps.app.goo.gl/s4BNst1hZNxpA7gG8">Lihat Lokasi <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="region-card">
            <h4>Kanwil Banuspa</h4>
            <p>Jalan Raya Puputan No 488, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80225</p>
            <p>Telp: (0361) 8496567, 8496568</p>
            <p>Faks: (0361) 8496570</p>
            <a href="https://maps.app.goo.gl/6fKns789mFBw3CRn9">Lihat Lokasi <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="region-card">
            <h4>Kanwil DKI Jakarta</h4>
            <p>Menara Jamsostek Lt. 8 Tower B Jl. Gatot Subroto No. 38 Kav. 71-73, Jakarta 12710</p>
            <p>Telp: (021) 5229291, 5229306</p>
            <p>Faks: (021) 5229321, 5229331</p>
            <a href="https://maps.app.goo.gl/rudQUJV6sNRBebhQ6">Lihat Lokasi <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="region-card">
            <h4>Kanwil Jateng & DIY</h4>
            <p>Jl. Pemuda No. 130, Semarang 50132</p>
            <p>Telp: (024) 3559563, 3559564</p>
            <p>Faks: (024) 3517623, 3557627</p>
            <a href="https://maps.app.goo.gl/tX25WzzSjuxr7i4m7">Lihat Lokasi <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="region-card">
            <h4>Kanwil Jawa Timur</h4>
            <p>Jl. Raya Juanda No. 52, Sedati - Sidoarjo, Surabaya 61253</p>
            <p>Telp: (031) 8663222</p>
            <p>Faks: (031) 8666146</p>
            <a href="https://maps.app.goo.gl/YoLpSSjQsaagtdFB6">Lihat Lokasi <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="region-card">
            <h4>Kanwil Jawa Barat</h4>
            <p>Jl. Ph. Hasan Mustapa No. 39, Bandung (Lantai 3) 40124</p>
            <p>Telp: (022) 7102732</p>
            <p>Faks: (022) 7200609</p>
            <a href="https://maps.app.goo.gl/PfXBSqHyq8iZxxYr7">Lihat Lokasi <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>


</body>
</html>
