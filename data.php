<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yayasan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data pengurus
$sql = "SELECT * FROM managers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengurus Yayasan dan Masjid</title>
    <link rel="stylesheet" href="assets/css/data.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Data Pengurus Yayasan dan Masjid</h1>
        </header>
        <section>
            <h2>Daftar Pengurus</h2>
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nama</th><th>Jenis Kelamin</th><th>Jabatan</th></tr>";
                // Output data dari setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['position']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 hasil";
            }
            ?>
            <button onclick="history.back()">Kembali</button>
        </section>
        <footer>
            <p>&copy; 2024 Yayasan Al-Hidayah. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

<?php
$conn->close();
?>
