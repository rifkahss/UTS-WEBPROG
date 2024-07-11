<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="/./Assets/css/style.css">
</head>

<body>
    <?php
    include "database_connection.php";
    include "create_menu_modal.php";
    include "update_menu_modal.php";

    // Query untuk mengambil data menu dengan JOIN ke tabel kategori_menu
    $sql = "SELECT menu.id, menu.gambar_menu, menu.nama_menu, menu.deskripsi_menu, menu.harga_menu, kategori_menu.nama_kategori
            FROM menu
            INNER JOIN kategori_menu ON menu.kategori_id = kategori_menu.id";
    $result = $conn->query($sql);

    // Tutup koneksi database
    $conn->close();
    ?>
    <div class="m-3">
        <h1>Create Menu</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createMenuModal">
            Create Menu
        </button>
    </div>

    <!-- Modal for creating menu -->

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar Menu</th>
                <th>Nama Menu</th>
                <th>Deskripsi Menu</th>
                <th>Harga Menu</th>
                <th>Kategori</th> <!-- Ganti judul kolom -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="menu/uploads/<?= $row["gambar_menu"] ?>" width="100" height="100" alt="Menu Image"></td>
                    <td><?= $row["nama_menu"] ?></td>
                    <td><?= $row["deskripsi_menu"] ?></td>
                    <td><?= $row["harga_menu"] ?></td>
                    <td><?= $row["nama_kategori"] ?></td> <!-- Tampilkan nama kategori -->
                    <td>
                        <button class="btn btn-primary edit-btn" data-id="<?= $row["id"] ?>" data-toggle="modal" data-target="#updateMenuModal">Edit</button>
                        <a href="menu/delete_menu.php?id=<?= $row["id"] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>


    <!-- Update Menu Modal -->

    <div class="modal fade" id="updateMenuModal" tabindex="-1" role="dialog" aria-labelledby="updateMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Content for the update modal will be loaded here using JavaScript -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>