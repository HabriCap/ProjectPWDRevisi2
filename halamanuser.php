<?php
session_start();
include 'koneksi.php';

// Redirect ke halaman login jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: halamanlogin.php");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT nama_panggilan FROM user WHERE username='$username'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['nama_panggilan'] = $row['nama_panggilan'];
} else {
    $_SESSION['nama_panggilan'] = "Pengguna";
}

$nama_panggilan = $_SESSION['nama_panggilan'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
</head>
<style>

        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(2, 2, 2, 0.7);
            padding-top: 50px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px 40px;
            border: 1px solid #888;
            width: 90%;
            max-width: 700px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            text-align: left;
        }
        .close {
            color: black;
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: red;
        }

        

* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: rgb(255, 255, 255);
        }
    .navbar {
     height: 70px;
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
.picture-container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

    .picture-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
    .picture-text {
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    background: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 20px 40px;
    border-radius: 12px;
    text-align: center;
}


.scroll-wrapper {
   width: 100%;
  height: 100%;
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  overflow-x: auto;
  white-space: nowrap;
}


.scroll-scroll {
  display: flex;
  height: 100vh;
  overflow-x: scroll; 
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  scrollbar-width: none;
}
.scroll-scroll::-webkit-scrollbar {
    display: none;
}

.scroll-scroll img {
  width: 100vw;
  height: 100%;
  object-fit: cover;
  scroll-snap-align: start;
  flex-shrink: 0;
  
}

.scroll-left {
    left: 10px;
}
.scroll-right {
    right: 10px;
}
.scroll-button {
  position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0,0,0,0.5);
      color: white;
      border: none;
      padding: 20px;
      font-size: 30px;
      cursor: pointer;
      z-index: 10;
      border-radius: 50%;
}

.scroll-button:hover {
    background-color: rgba(0, 0, 0, 0.6);
}

.picture-text {
  position: absolute;
  top: 35%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 10;
  background: rgba(0, 0, 0, 0.5);
  padding: 30px 50px;
  color: white;
  border-radius: 10px;
  text-align: center;
}

.picture-text h1 {
    font-size: 48px;
    margin-bottom: 10px;
    font-weight: 700;
    color: #f8f9fa;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
}

.picture-text h4 {
    font-size: 24px;
    font-weight: 400;
    color: #d1d1d1;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
}



.services-container {
      background-color: #fff;
      padding: 40px 20px 60px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin: 40px auto;
      max-width: 1200px;
      border-radius: 20px;
  }
  .user-box-container {
      display: flex;
      justify-content: center;
      margin-bottom: 40px;
  }
  .user-box {
      text-align: center;
      background-color: #e9f0ff;
      width: 300px;
      padding: 25px;
      border-radius: 14px;
      box-shadow: 0 4px 16px rgba(0, 123, 255, 0.2);
      font-weight: 600;
      font-size: 1.2rem;
      color: #004085;
  }
  .services {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      max-width: 1000px;
      margin: auto;
  }
  .service-box {
      background-color: #f9f9f9;
      border-radius: 16px;
      padding: 25px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      width: 180px;
  }
  .service-box:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 25px rgba(10, 11, 12, 0.3);
  }
  .service-box img {
      width: 56px;
      height: 56px;
      margin-bottom: 15px;
  }
  .service-title {
      font-weight: 700;
      font-size: 1.1rem;
      color: #555;
  }

      .review-container {
      margin-top: 80px;
      background-color: #f3f4f6;
      display: flex;
      gap: 30px;
      justify-content: center;
      flex-wrap: wrap;
      padding: 40px 20px;
      border-radius: 50px;
      max-width: 1500px;
      margin-left: auto;
      margin-right: auto;
  }
  .box-title h2 {
      font-size: 2rem;
      font-weight: 700;
      color: #222;
      text-align: center;
      margin-bottom: 25px;
      width: 100%;
  }
  .review-box {
      background: white;
      padding: 30px 25px;
      border-radius: 20px;
      width: 470px;
      height: auto;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      color: #444;
  }
  .review-box i {
      color:rgb(64, 118, 154);
      font-size: 18px;
      margin-right: 10px;
  }
  .review-box span {
      font-size: 18px;
      font-weight: 600;
      color: #222;
  }
  .review-box p {
      margin: 10px 0 15px 32px;
      font-size: 16px;
      color: #555;
      line-height: 1.5;
  }

        .info-container {
            position: relative;
            max-width: 1000px;
            margin: auto;
            margin-top: 40px;
        }

        .info-title h2 {
            margin-bottom: 20px;
        }

        .scroll-container {
            overflow-x: auto;
            white-space: nowrap;
            scroll-behavior: smooth;
            padding-top: 20px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .card {
            display: inline-block;
            vertical-align: top;
            width: 350px;
            height: 300px;
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-right: 35px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card h3 {
            font-size: 18px;
        }

        .card p {
            word-wrap: break-word;
            white-space: normal;
            overflow-wrap: break-word;
            font-size: 14px; 
            line-height: 1.5; 
        }

        .scroll-buttons {
            position: absolute;
            top: 0;
            right: 0;
        }

        .scroll-buttons button {
            background: white;
            border: 1px solid white;
            border-radius: 50%;
            padding: 8px;
            margin-left: 5px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0,1);
            transition: background 0.2s;
        }

        .scroll-buttons button:hover {
            background: #f0f0f0;
        }

        .jaminan-box {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
            gap: 8px;
        }
        .jaminan-box span {
            padding: 4px 8px;
            background-color: #f1f1f1;
            border-radius: 6px;
            font-size: 13px;
        }

        

 @media screen and (max-width: 768px) {
    .picture-text {
      top: 25%;
      left: 50%;
      padding: 20px 30px;
      font-size: 90%;
    }
    .navbar {
      flex-direction: column;
      align-items: flex-start;
      padding: 15px 20px;
    }
    .nav-category a {
      margin: 6px 5px;
      font-size: 16px;
    }
    .services {
      flex-direction: column;
      align-items: center;
    }
    .service-box {
      width: 100%;
      max-width: 300px;
    }
    .review-container {
      flex-direction: column;
      align-items: center;
    }
    .review-box {
      width: 90%;
      height: auto;
    }
    .scroll-buttons {
      flex-direction: row;
      position: static;
      justify-content: center;
      margin-bottom: 15px;
    }
    .scroll-buttons button {
      font-size: 16px;
      padding: 8px 12px;
    }
    .card {
      width: 90%;
      max-width: 350px;
      margin: 0 auto 20px auto;
      height: auto;
    }
    .card p {
      height: auto;
      overflow: visible;
    }
  }
    #banner1 {
    width: 100%;
    height: 50%;
    overflow: hidden;
}
    
#banner1 img {
    width: 100%;
    height: 600px;
    object-fit: cover;
}
    
.picture-text {
            position: absolute;
            text-align: center;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            background: rgba(0, 0, 0, 0.6);
            padding: 20px 40px;
            border-radius: 12px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .picture-text h1 {
            font-size: 48px;
            margin-bottom: 10px;
            font-weight: 700;
            color: #f8f9fa;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
        }
        .picture-text h4 {
            font-size: 24px;
            font-weight: 400;
            color: #d1d1d1;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
        }

       

</style>
<body>
    <div class="navbar" id="navbar">
        <div class="nav-logo">
            <span class="font1">BPJS</span>
            <span class="font2">Ketenagakerjaan</span>
        </div>
        <div class="nav-category">
            <a href="#informasi">Informasi Kepesertaan</a>
            <a href="#review">Benefit</a>
            <a href="kontak.php">Kontak</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="nav-search">
        </div>
    </div>
    <br><br><br>
<div class="picture-container">
  <button class="scroll-button scroll-left" onclick="scrollImages(-1)">❮</button>
    <div class="scroll-scroll" id="scrollcontainer2">
      <img src="BPJSBanner2.png" alt="Banner 1">
      <img src="BPJSBanner3.png" alt="Banner 2">
      <img src="BPJSBanner4.png" alt="Banner 3">
    </div>
  <button class="scroll-button scroll-right" onclick="scrollImages(1)">❯</button>

        <!-- Pastikan text berada di sini -->
        <div class="picture-text">
            <h1>Selamat Datang</h1>
            <h4>Dapatkan Informasi Kemudahan Layanan dan Informasi</h4>
        </div>
    </div>
</div>

    <div class="services-container">
        <div class="user-box-container">
            <div class="user-box">
                <h4>Halo !<br>  <?php echo htmlspecialchars($nama_panggilan); ?></h4>
            </div>
        </div>
        <div class="services">
            <a href="tambah.php" class="service-box-link">
                <div class="service-box">
                    <img src="https://img.icons8.com/fluency/48/organization.png">
                    <div class="service-title">Memasukkan Data</div>
                </div></a>
            <a href="datauser.php" class="service-box-link">
                <div class="service-box">
                    <img src="https://img.icons8.com/fluency/48/search.png">
                    <div class="service-title">Check Data Pribadi</div>
                </div></a>
            <a href="#" class="service-box-link tutorial-btn">
                <div class="service-box">
                    <img src="https://img.icons8.com/fluency/48/information.png">
                    <div class="service-title">Tutorial Pendaftaran</div>
                </div>

                <a href="bayar.php" class="service-box-link">
                <div class="service-box">
                    <img src="https://img.icons8.com/fluency/48/search.png">
                    <div class="service-title">Pembayaran BPJS</div>
                </div></a>
            
        </div>
    </div>
    <div class="review-container" id="review">
        <div class="review-section">
            <div class="box-title">
                <h2>Benefit (Keuntungan) </h2>
            </div>
            <div class="review-box">
                    <i class="bi bi-1-circle"></i><span>. Jaminan Kecelakaan Kerja</span>
                    <p>Menanggung biaya perawatan medis dan santunan akibat kecelakaan yang terjadi saat bekerja atau dalam perjalanan kerja.</p>
                    <i class="bi bi-2-circle"></i><span>. Jaminan Kematian</span>
                    <p>Memberikan santunan uang tunai kepada ahli waris jika peserta meninggal dunia, baik karena kecelakaan kerja maupun bukan.</p>
                    <i class="bi bi-3-circle"></i><span>. Jaminan Hari Tua</span>
                    <p>Tabungan jangka panjang yang bisa diambil saat pensiun, berhenti bekerja, atau mencapai usia tertentu.</p>
                    <i class="bi bi-4-circle"></i><span>. Jaminan Pensiun</p></span>
                    <p>Memberikan penghasilan bulanan saat peserta pensiun, mengalami cacat total tetap, atau untuk ahli waris jika peserta meninggal dunia.</p>
                    <i class="bi bi-5-circle"></i><span>. Jaminan Kehilangan Pekerjaan</span>
                    <p>Memberikan manfaat uang tunai, akses informasi pasar kerja, dan pelatihan kerja bagi peserta yang terkena PHK.</p>
            </div>
        </div>
        <div class="review-section">
            <div class="box-title">
                    <h2>Tujuan (Purpose)</h2>
            </div>
            <div class="review-box">
                <i class="bi bi-1-circle"></i><span>. Memberikan perlindungan terhadap risiko sosial ekonomi seperti kecelakaan kerja, kematian, hari tua, dan kehilangan pekerjaan</span>
                <br><br>
                <i class="bi bi-2-circle"></i><span>. Meningkatkan kesejahteraan tenaga kerja dan keluarganya melalui program jaminan sosial.</span>
                <br><br>
                <i class="bi bi-3-circle"></i><span>. Mewujudkan sistem jaminan sosial yang adil dan merata bagi seluruh pekerja, baik di sektor formal maupun informal.</span>
                <br><br>
                <i class="bi bi-4-circle"></i><span>. Menjamin kepastian perlindungan dan pelayanan bagi peserta sesuai hak dan kewajiban yang diatur dalam peraturan perundang-undangan.</span>
                <br><br>
                <i class="bi bi-5-circle"></i><span>. Mendukung stabilitas dan produktivitas tenaga kerja nasional, karena pekerja yang terlindungi cenderung bekerja lebih tenang dan produktif.</span>
                
            </div>
        </div>
    </div>

    <div class="info-container" id="informasi">
        <div class="info-title">
            <h2>Informasi Kepesertaan</h2>
        </div>
        <div class="scroll-buttons">
            <button onclick="scrollCards(-1)">←</button>
            <button onclick="scrollCards(1)">→</button>
        </div>
        <div class="scroll-container" id="scrollwrapper">
            <div class="card">
                <h3 style="color:#0077cc;"> 🧑‍💼Pekerja Penerima Upah</h3>
                <p>Setiap orang yang bekerja dengan menerima gaji, upah, atau imbalan dalam bentuk lain dari pemberi kerja. Seperti pekerja kantoran atau buruh pabrik.</p>  
                <strong>Jaminan :</strong>
                <div class="jaminan-box">
                    <span>Hari Tua</span>
                    <span>Kecelakaan Kerja</span>
                    <span>Kematian</span>
                    <span>Pensiun</span>
                    <span>Kehilangan Pekerjaan</span>
                </div>
            </div>
            <div class="card">
                <h3 style="color:#0077cc;"> 👨‍🌾 Pekerja Bukan Penerima Upah</h3>
                <p>Orang perorangan yang melakukan kegiatan usaha secara mandiri untuk memperoleh penghasilan. seperti Dokter, Pedagang, Ojek Online dan lain lain</p>  
                <strong>Jaminan :</strong>
                <div class="jaminan-box">
                    <span>Hari Tua</span>
                    <span>Kecelakaan Kerja</span>
                    <span>Kematian</span>
                </div>
            </div>

            <div class="card">
                <h3 style="color:#0077cc;"> 👷‍♂️ Pekerja Jasa Kontruksi (Jakon)</h3>
                <p>Layanan jasa konsultasi perencanaan pekerjaan konstruksi, layanan jasa pelaksanaan pekerjaan konstruksi dan layanan konsultasi pengawasan pekerjaan konstruksi</p>  
                <strong>Jaminan :</strong>
                <div class="jaminan-box">
                    <span>Kecelakaan Kerja</span>
                    <span>Kematian</span>
                </div>
            </div>

            <div class="card">
                <h3 style="color:#0077cc;"> 👨‍💻Pekerja Migran</h3>
                <p>Setiap warga negara Indonesia yang akan, sedang, atau telah melakukan pekerjaan dengan menerima upah di luar wilayah Republik Indonesia</p>  
                <strong>Jaminan :</strong>
                <div class= "jaminan-box">
                    <span>Hari Tua</span>
                    <span>Kecelakaan Kerja</span>
                    <span>Kematian</span>
                </div>
            </div>
        </div>
        <br><br>
    </div>

 <div class="modal" id="tutorial-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 style = "font-size:30px;">Tutorial Pendaftaran BPJS Ketenagakerjaan</h2>
        <ol>
            <li>Buka website BPJS atau aplikasi BPJSTKU.</li>
            <li>Pilih menu pendaftaran dan masukkan data diri.</li>
            <li>Verifikasi data melalui email atau SMS.</li>
            <li>Bayar iuran awal melalui kanal pembayaran yang tersedia.</li>
            <li>Anda sudah terdaftar sebagai peserta BPJS Ketenagakerjaan.</li>
        </ol>
    </div>
</div>

    <script>
        // Modal untuk Tutorial Pendaftaran
    const modal = document.getElementById("tutorial-modal");
    const tutorialButtons = document.querySelectorAll(".tutorial-btn");
    const closeBtn = document.querySelector(".close");

    // Buka modal saat tombol tutorial diklik
    tutorialButtons.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault(); // cegah link default
            modal.style.display = "flex";
        });
    });

    // Tutup modal saat tombol close diklik
    closeBtn.onclick = () => modal.style.display = "none";

    // Tutup modal saat klik di luar modal content
    window.onclick = (event) => {
        if (event.target == modal) modal.style.display = "none";
    };


    function scrollCards(direction) {
      const container = document.getElementById('scrollwrapper');
      const scrollAmount = 320;
      container.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
      });
    }

 
 

function scrollImages(direction) {
      const container = document.getElementById('scrollcontainer2');
      const screenWidth = window.innerWidth;
      container.scrollBy({
        left: direction * screenWidth,
        behavior: 'smooth'
      });
    }



    
  </script>
</body>
</html>