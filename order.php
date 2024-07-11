<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Menu</title>
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
                                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
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
        <h2 class="mt-3">Menu</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tampilkan daftar menu dan tombol pemesanan -->
                <?php
                // Mengasumsikan Anda memiliki koneksi database
                $conn = new mysqli("localhost", "root", "", "jayabahari");

                if ($conn->connect_error) {
                    die("Koneksi ke database gagal: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM menu";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama_menu"] . "</td>";
                        echo "<td>" . $row["harga_menu"] . "</td>";
                        echo "<td>
                            <form method='post' action='order.php'>
                                <input type='hidden' name='menu_id' value='" . $row["nama_menu"] . "'>
                                <input type='number' name='jumlah' value='1'>
                                <input type='hidden' name='total_harga' value='" . $row["harga_menu"] . "'>
                                <button type='submit' class='btn btn-primary' name='pesan'>Pesan</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada menu yang tersedia.</td></tr>";
                }

                if (isset($_POST['pesan'])) {
                    $menu_id = $_POST['menu_id'];
                    $jumlah = $_POST['jumlah'];
                    $total_harga = $_POST['total_harga'];

                    // Masukkan pesanan ke dalam tabel "pesanan"
                    $insert_sql = "INSERT INTO pesanan (menu, jumlah, totalharga) VALUES ('$menu_id', '$jumlah', '$total_harga')";

                    if ($conn->query($insert_sql) === TRUE) {
                        echo "<p class='alert alert-success mt-2'>Pesanan berhasil disimpan.</p>";
                    } else {
                        echo "<p class='alert alert-danger mt-2'>Error: " . $insert_sql . "<br>" . $conn->error . "</p>";
                    }
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <!-- Tombol Lihat Seluruh Pesanan -->
        <a href="pesanan.php" class="btn btn-primary">Lihat Seluruh Pesanan</a>
    </div>
    </div>

    <!-- Tautan ke berkas JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
