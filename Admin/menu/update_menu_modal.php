<div class="modal fade" id="updateMenuModal" tabindex="-1" role="dialog" aria-labelledby="updateMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMenuModalLabel">Update Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_menu.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="menu_id" value="<?= $row["id"] ?>">
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu:</label>
                        <input type="text" class="form-control" name="nama_menu" value="<?= $row["nama_menu"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_menu">Deskripsi Menu:</label>
                        <textarea class="form-control" name="deskripsi_menu"><?= $row["deskripsi_menu"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga_menu">Harga Menu:</label>
                        <input type="number" class="form-control" name="harga_menu" value="<?= $row["harga_menu"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="gambar_menu">Gambar Menu:</label>
                        <input type="file" class="form-control-file" name="gambar_menu">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori:</label>
                        <select class="form-control" name="kategori_id" id="kategori_id">
                            <?php
                            // Query untuk mendapatkan pilihan kategori dari tabel kategori
                            $kategori_query = "SELECT id, nama_kategori FROM kategori_menu";
                            $kategori_result = $conn->query($kategori_query);
                            while ($kategori_row = $kategori_result->fetch_assoc()) {
                                echo "<option value='" . $kategori_row["id"] . "'>" . $kategori_row["nama_kategori"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>