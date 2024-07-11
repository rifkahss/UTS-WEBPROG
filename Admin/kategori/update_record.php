<?php
include "database_connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $kategori_nama = $_POST["kategori_nama"];

    $sql = "UPDATE kategori_menu SET nama_kategori='$kategori_nama' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:  /../restoran%20barokah/admin/kategori.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
