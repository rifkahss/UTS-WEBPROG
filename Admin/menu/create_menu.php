<?php
include "database_connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gambar_menu = $_FILES["gambar_menu"]["name"]; // Ambil nama file gambar
    $nama_menu = $_POST["nama_menu"];
    $deskripsi_menu = $_POST["deskripsi_menu"];
    $harga_menu = $_POST["harga_menu"];
    $kategori_id = $_POST["kategori_id"];

    // Direktori penyimpanan gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar_menu"]["name"]);

    // Pindahkan file gambar ke direktori
    move_uploaded_file($_FILES["gambar_menu"]["tmp_name"], $target_file);

    // Insert data into the "menu" table
    $sql = "INSERT INTO menu (gambar_menu, nama_menu, deskripsi_menu, harga_menu, kategori_id) 
            VALUES ('$gambar_menu', '$nama_menu', '$deskripsi_menu', $harga_menu, $kategori_id)";

    if ($conn->query($sql) === TRUE) {
        header("Location: /../restoran%20barokah/admin/menu.php"); // Redirect back to the menu list
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
