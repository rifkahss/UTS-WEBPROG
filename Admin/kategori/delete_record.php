<?php
include "database_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $check_sql = "SELECT * FROM kategori_menu WHERE id = $id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {

        $delete_sql = "DELETE FROM kategori_menu WHERE id = $id";
        if ($conn->query($delete_sql) === TRUE) {
            header("Location: /../restoran%20barokah/admin/kategori.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Record with ID $id does not exist.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
