<!DOCTYPE html>
<html>

<head>
    <title>CRUD Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any other CSS styles or Bootstrap CSS links you need -->
</head>

<body>
    <div class="container">
        <h1>Tabel Kategori</h1>
        <form action="kategori/create_record.php" method="post">
            Kategori Nama:
            <div class="input-group w-50 mb-3">
                <input type="text" name="kategori_nama" class="form-control">
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>

                <?php
                include "database_connection.php"; // Include the database connection file

                $sql = "SELECT id, nama_kategori FROM kategori_menu";
                $result = $conn->query($sql);
                $i = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row["nama_kategori"]; ?></td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?php echo $row["id"]; ?>">Update</button>
                                <form style="display: inline;" action="kategori/delete_record.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for updating record -->
                        <div class="modal fade" id="updateModal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Record</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="kategori/update_record.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                            <div class="form-group">
                                                <label for="updateKategoriNama">New Nama Kategori:</label>
                                                <input type="text" class="form-control" name="kategori_nama" id="updateKategoriNama">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>

                    <tr>
                        <td colspan="3">No records found.</td>
                    </tr>

                <?php
                }

                $conn->close();
                ?>

            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add any other JavaScript files you need -->
</body>

</html>