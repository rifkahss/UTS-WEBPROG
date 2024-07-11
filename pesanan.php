<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seluruh Pesanan</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="overflow-hidden">
    <div class="row justify-content-center">
        <div class="col-6 d-flex">
            <div class="nav-custom">
                <nav class="navbar navbar-light navbar-expand-md py-3 px-3">
                    <div class="container custome-h">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <span>Barokah Sentosa</span>
                        </a>
                        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-4">
                            <span class="visually-hidden">Toggle navigation</span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-4">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="menu.php">Menu</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="order.php">Order</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <button class="btn button-nav">
                <a href="login-register.php"> Login</a>
            </button>
        </div>
    </div>
    <div class="container">
        <?php
        // Mengasumsikan Anda memiliki koneksi database
        $conn = new mysqli("localhost", "root", "", "jayabahari");

        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil seluruh pesanan dari tabel pesanan
        $sql = "SELECT menu, jumlah, totalharga FROM pesanan";
        $result = $conn->query($sql);

        $totalHarga = 0; // Inisialisasi total harga

        if ($result->num_rows > 0) {
            echo "<h2>Seluruh Pesanan</h2>";
            echo "<table class='table'>";
            echo "<thead><tr><th>Menu</th><th>Jumlah</th><th>Total Harga</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["menu"] . "</td>";
                echo "<td>" . $row["jumlah"] . "</td>";
                echo "<td>" . $row["totalharga"] . "</td>";
                echo "</tr>";

                $totalHarga += $row["totalharga"]; // Tambahkan total harga
            }
            echo "</tbody>";
            echo "</table>";

            // Menampilkan total seluruh harga pesanan
            echo "<p>Total Seluruh Harga Pesanan: Rp " . $totalHarga . "</p>";

            // Tombol Bayar
            echo "<a href='bayar.php' class='btn btn-primary'>Bayar</a>";
        } else {
            echo "<h2>Seluruh Pesanan</h2>";
            echo "Belum ada pesanan.";
        }

        $conn->close();
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
