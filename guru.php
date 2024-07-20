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

// Mengambil data guru
$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result === FALSE) {
    die("Error: " . $conn->error);
}

// Menyimpan data guru dalam array
$teachers = [];
while ($row = $result->fetch_assoc()) {
    $teachers[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru</title>
    <link rel="stylesheet" href="assets/css/data.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Guru</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><?php echo htmlspecialchars($teacher['name']); ?></td>
                    <td><?php echo htmlspecialchars($teacher['gender']); ?></td>
                    <td><?php echo htmlspecialchars($teacher['subject']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="history.back()">Kembali</button>
        <footer>
            <p>&copy; 2024 Yayasan Al-Hidayah. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
