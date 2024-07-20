<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yayasan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images from the database
$sql = "SELECT file_name, description, upload_date FROM gallery_images ORDER BY upload_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Include Slick CSS for slideshow -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        .gallery-images img {
            width: calc(20% - 30px); /* Kurangi 20px dari lebar total untuk margin */
            height: auto;
            margin: 10px; /* 10px di setiap sisi untuk total 20px */
            object-fit: cover; /* Pastikan gambar terisi secara proporsional */
        }
        .gallery-images .slick-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="assets/images/logo1.png" alt="Logo Yayasan" />
        <h1>Yayasan Al-Hidayah</h1>
        <h3>Jl. Wisma Kusuma Indah </h3>
    </div>
 

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="#">Tentang Kami</a>
                <ul>
                    <li><a href="tentang_kami/profil.php">Profil</a></li>
                    <li><a href="data.php">Pengurus Yayasan dan Masjid</a></li>
                    <li><a href="#">Data Keuangan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Program</a>
                <ul>
                    <li><a href="dakwah.php">Dakwah Terprogram</a></li>
                    <li><a href="#">Pembinaan Moral</a></li>
                    <li><a href="#">Diklat Managemen</a></li>
                    <li><a href="#">Penyantunan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Dedikasi</a>
                <ul>
                    <li><a href="#">Keislaman</a></li>
                    <li><a href="#">Pengembangan Diri</a></li>
                    <li><a href="#">Sosial</a></li>
                    <li><a href="#">Lain-lain</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Masyarakat</a>
                <ul>
                    <li><a href="#">Dukungan Masyarakat</a></li>
                    <li><a href="#">Terimakasih Kami</a></li>
                    <li><a href="#">Dukung Kami</a></li>
                    <li><a href="#">Saran dan Kritik</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Terbaru</a>
                <ul>
                    <li><a href="#">Kegiatan</a></li>
                    <li><a href="#">Testimoni</a></li>
                    <li><a href="#">Pemikiran</a></li>
                    <li><a href="#">Liputan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">TK Al-Hidayah</a>
                <ul>
                    <li><a href="admin/pendaftaran/pendaftaran.php">Pendaftaran</a></li>
                    <li><a href="siswa.php">Data Siswa</a></li>
                    <li><a href="guru.php">Guru dan Pengurus TK</a></li>
                </ul>
            </li>
            <li><a href="admin/login.php">Admin</a></li>
            <li><a href="#">Hubungi Kami</a></li>
        </ul>
    </nav>
</header>


    <main>
        <div class="container">
        <h2>Selamat Datang di Yayasan Al-Hidayah</h2>
            <div class="section gallery">
                <div class="gallery-images">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $filePath = 'admin/gallery_images/uploads/' . htmlspecialchars($row['file_name']);
                            echo '<div><img src="' . $filePath . '" alt="' . htmlspecialchars($row['description']) . '"></div>';
                        }
                    } else {
                        echo '<p style="text-align: center; color: #555;">Tidak ada gambar ditemukan.</p>';
                    }
                    ?>
                </div>
            </div>

            
            <div class="section schedule">
                <h3>Jadwal Sholat</h3>
                <div class="prayer-times">
                    <div class="prayer-time">
                        <span>Subuh</span>
                        <span>04:30</span>
                    </div>
                    <div class="prayer-time">
                        <span>Dzuhur</span>
                        <span>12:00</span>
                    </div>
                    <div class="prayer-time">
                        <span>Ashar</span>
                        <span>15:30</span>
                    </div>
                    <div class="prayer-time">
                        <span>Maghrib</span>
                        <span>18:00</span>
                    </div>
                    <div class="prayer-time">
                        <span>Isya</span>
                        <span>19:30</span>
                    </div>
                </div>
            </div>

            <div class="section events">
                <h3>Daftar Acara yang Akan Datang</h3>
                <ul>
                    <li>Pengajian Bulanan - 25 Juli 2024</li>
                    <li>Workshop Kewirausahaan - 10 Agustus 2024</li>
                    <li>Acara Sosial - 15 September 2024</li>
                </ul>
            </div>

            <div class="section uang">
                <h3>Keuangan Yayasan</h3>
                <ul>
                    <li><a href="#">Uang Keluar</a></li>
                    <li><a href="#">Uang Masuk</a></li>
                    <li><a href="#">Jumlah Kas</a></li>
                </ul>
            </div>

            <div class="section news">
                <h3>Berita Yayasan</h3>
                <ul>
                    <li><a href="#">Berita 1: Kegiatan Ramadan</a></li>
                    <li><a href="#">Berita 2: Penghargaan untuk Sekolah</a></li>
                    <li><a href="#">Berita 3: Renovasi Masjid</a></li>
                </ul>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Dashboard. All rights reserved.</p>
    </footer>

    <!-- Include jQuery and Slick Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.gallery-images').slick({
                dots: true, // Tampilkan titik navigasi
                infinite: true, // Gulir secara tak terbatas
                speed: 600, // Kecepatan transisi
                slidesToShow: 1, // Tampilkan 1 gambar sekaligus
                slidesToScroll: 1, // Gulir 1 gambar per kali
                autoplay: true, // Putar otomatis
                autoplaySpeed: 2000, // Kecepatan autoplay (ms)
                arrows: true, // Tampilkan panah navigasi
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false // Sembunyikan panah pada perangkat kecil
                        }
                    }
                ]
            });
        });
        
        // Script untuk menampilkan jam saat ini
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000);
        updateClock(); // Initial call to display the clock immediately
    </script>
   
</body>
</html>

<?php
$conn->close();
?>
