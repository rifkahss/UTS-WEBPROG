<?php
// Sambungkan ke database
$conn = new mysqli("localhost", "root", "", "jayabahari");

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir pendaftaran
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Cek apakah username atau email sudah digunakan
$query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    header("Location: register.php?error=1"); // Username atau email sudah digunakan
    exit();
}

// Tambahkan data pengguna baru ke tabel users
$insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if ($conn->query($insert_query) === TRUE) {
    header("Location: login-register.php"); // Pendaftaran berhasil, arahkan ke halaman login
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

$conn->close();
