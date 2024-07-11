<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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
    </div><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-header bg-primary text-white text-center'>";
                    echo "<h5 class='card-title'>Pesanan Anda:</h5>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<ul class='list-group list-group-flush'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>";
                        echo $row["menu"] . " (Jumlah: " . $row["jumlah"] . ") - Rp " . $row["totalharga"];
                        echo "</li>";
                        $totalHarga += $row["totalharga"]; // Tambahkan total harga
                    }
                    echo "</ul>";
                    echo "<p class='card-text mt-3'><strong>Total Seluruh Harga Pesanan: Rp " . $totalHarga . "</strong></p>";
                    echo "</div>";
                    echo "</div>";

                    // Tombol Selesai
                    echo "<div class='text-center'>";
                    echo "<a href='selesai.php' class='btn btn-primary'>Selesai</a>";
                    echo "</div>";
                } else {
                    echo "<h2 class='text-center text-white'>Ringkasan Pesanan</h2>";
                    echo "Belum ada pesanan.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
