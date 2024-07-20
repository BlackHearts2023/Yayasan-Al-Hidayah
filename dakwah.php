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

// Mengambil data dakwah
$sql = "SELECT * FROM dakwah";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result === FALSE) {
    die("Error: " . $conn->error);
}

// Menyimpan data dakwah dalam array
$dakwahList = [];
while ($row = $result->fetch_assoc()) {
    $dakwahList[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dakwah</title>
    <link rel="stylesheet" href="assets/css/data.css">
</headassets/css/data.css">
<body>
    <div class="content-container">
        <h2>Daftar Dakwah</h2>

        <?php if (!empty($dakwahList)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dakwahList as $dakwah): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($dakwah['title']); ?></td>
                            <td><?php echo htmlspecialchars($dakwah['description']); ?></td>
                            <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($dakwah['date']))); ?></td>
                            <td><?php echo htmlspecialchars($dakwah['location']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Data dakwah tidak tersedia.</p>
        <?php endif; ?>

        <button onclick="history.back()">Kembali</button>

        <footer>
            <p>&copy; 2024 Yayasan Al-Hidayah. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

<?php
$conn->close();
?>
