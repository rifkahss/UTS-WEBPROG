<?php
include "database_connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori_nama = $_POST["kategori_nama"];

    $sql = "INSERT INTO kategori_menu (nama_kategori) VALUES ('$kategori_nama')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
        header("location: /../restoran%20barokah/admin/kategori.php", true);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
