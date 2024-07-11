<?php
$conn = new mysqli("localhost", "root", "", "jayabahari");

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data menu dengan JOIN ke tabel kategori_menu
$sql = "SELECT menu.id, menu.gambar_menu, menu.nama_menu, menu.deskripsi_menu, menu.harga_menu, kategori_menu.nama_kategori
            FROM menu
            INNER JOIN kategori_menu ON menu.kategori_id = kategori_menu.id";
$result = $conn->query($sql);

// Tutup koneksi database
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="overflow-hidden">

    <div class="row justify-content-center">
        <div class="col-6 d-flex">
            <div class="nav-custom">
                <nav class="navbar navbar-light navbar-expand-md py-3 px-3">
                    <div class="container custome-h">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <span>Barokah Sentosa</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-4"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-4">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
                                <li class="nav-item"><a class="nav-link active" href="order.php">Order</a></li>
                                <div class="d-md-none my-2"><button class="btn btn-light me-2" type="button">Button</button><button class="btn btn-primary" type="button">Button</button></div>
                        </div>
                    </div>
                </nav>
            </div>
            <button class="btn button-nav">
                <a href="login-register.php"> Login</a>
            </button>
        </div>
        <!-- <button class="btn btn-primary ">
        Login
    </button> -->
    </div>
    <section class="hero-section">
        <div class="card-grid">
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <a class="card" href="#">
                    <div class="card__background" style="background-image: url(admin/menu/uploads/<?= $row["gambar_menu"] ?>)"></div>
                    <div class="card__content">
                        <p class="card__category"><?= $row["harga_menu"] ?></p>
                        <h3 class="card__heading"><?= $row["nama_menu"] ?></h3>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        // Pilih kartu menu dengan kelas .menu-card
        const menuCards = document.querySelectorAll(".menu-card");

        menuCards.forEach(menuCard => {
            // Tambahkan event listener untuk efek hover
            menuCard.addEventListener("mouseenter", () => {
                // Animasi untuk efek hover masuk
                gsap.to(menuCard, {
                    scale: 1.1,
                    boxShadow: "0 0 20px rgba(0, 0, 0, 0.3)",
                    duration: 0.3
                });
            });

            menuCard.addEventListener("mouseleave", () => {
                // Animasi untuk efek hover keluar
                gsap.to(menuCard, {
                    scale: 1,
                    boxShadow: "0 0 0 rgba(0, 0, 0, 0)",
                    duration: 0.3
                });
            });
        });
    </script>
</body>

</html>