<?php
include "database_connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $menu_id = $_GET["id"];

    // Query untuk menghapus data menu berdasarkan ID
    $delete_sql = "DELETE FROM menu WHERE id = $menu_id";

    if ($conn->query($delete_sql) === TRUE) {
        // Redirect kembali ke halaman utama setelah menghapus
        header("Location: /../restoran%20barokah/admin/menu.php");
        exit();
    } else {
        echo "Error: " . $delete_sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
