<div class="modal fade" id="createMenuModal" tabindex="-1" role="dialog" aria-labelledby="createMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMenuModalLabel">Create Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="menu/create_menu.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="gambar_menu">Gambar Menu:</label>
                        <input type="file" class="form-control-file" name="gambar_menu" id="gambar_menu">
                    </div>
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu:</label>
                        <input type="text" class="form-control" name="nama_menu" id="nama_menu">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_menu">Deskripsi Menu:</label>
                        <textarea class="form-control" name="deskripsi_menu" id="deskripsi_menu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga_menu">Harga Menu:</label>
                        <input type="number" class="form-control" name="harga_menu" id="harga_menu">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori:</label>
                        <select class="form-control" name="kategori_id" id="kategori_id">
                            <?php
                            // Query untuk mendapatkan pilihan kategori dari tabel kategori
                            $kategori_query = "SELECT id, nama_kategori FROM kategori_menu";
                            $kategori_result = $conn->query($kategori_query);
                            while ($row = $kategori_result->fetch_assoc()) {
                                echo "<option value='" . $row["id"] . "'>" . $row["nama_kategori"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>