<?php
include "database_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["menu_id"])) {
    $menu_id = $_POST["menu_id"];
    $nama_menu = $_POST["nama_menu"];
    $deskripsi_menu = $_POST["deskripsi_menu"];
    $harga_menu = $_POST["harga_menu"];
    $kategori_id = $_POST["kategori_id"];

    // Cek apakah gambar baru diunggah
    if (isset($_FILES["gambar_menu"]) && $_FILES["gambar_menu"]["name"]) {
        $gambar_menu = $_FILES["gambar_menu"]["name"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar_menu"]["name"]);

        // Pindahkan file gambar ke direktori
        move_uploaded_file($_FILES["gambar_menu"]["tmp_name"], $target_file);

        // Update data menu dengan gambar baru
        $update_sql = "UPDATE menu SET nama_menu = ?, deskripsi_menu = ?, harga_menu = ?, kategori_id = ?, gambar_menu = ? WHERE id = ?";

        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("sssisi", $nama_menu, $deskripsi_menu, $harga_menu, $kategori_id, $gambar_menu, $menu_id);
    } else {
        // Update data menu tanpa mengubah gambar
        $update_sql = "UPDATE menu SET nama_menu = ?, deskripsi_menu = ?, harga_menu = ?, kategori_id = ? WHERE id = ?";

        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ssii", $nama_menu, $deskripsi_menu, $harga_menu, $kategori_id, $menu_id);
    }

    if ($stmt->execute()) {
        // Redirect kembali ke halaman utama setelah mengupdate
        header("Location: read_menu.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
