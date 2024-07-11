<?php
// Sambungkan ke database
$conn = new mysqli("localhost", "root", "", "jayabahari");

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek kredensial pengguna
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Verifikasi kata sandi menggunakan password_verify
    if (password_verify($password, $user['password'])) {
        // Login berhasil
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = $user['is_admin'];

        if ($user['is_admin'] == 1) {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
    } else {
        // Kata sandi salah
        header("Location: login-register.php?error=1");
    }
} else {
    // Pengguna tidak ditemukan
    header("Location: login-register.php?error=1");
}

$conn->close();
