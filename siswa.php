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

// Mengambil data siswa
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result === FALSE) {
    die("Error: " . $conn->error);
}

// Menyimpan data siswa dalam array
$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="assets/css/data.css"> <!-- Pastikan path ini benar -->
</head>
<body>
    <div class="container">
        <h2>Daftar Siswa</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>            
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['gender']); ?></td>
                  <td><?php echo htmlspecialchars($student['class']); ?></td>
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
