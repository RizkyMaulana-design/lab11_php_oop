<div class="card">
    <div class="card-header">
        <h3>Data Barang</h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="?mod=artikel&act=tambah" class="btn btn-primary">
                + Tambah Data Barang
            </a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM data_barang";
                $result = $db->query($sql);
                if ($result && $result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <?php if (!empty($row['gambar'])): ?>
                                    <img src="/lab11_php_oop/gambar/<?php echo $row['gambar']; ?>" width="70" style="object-fit: contain;">
                                <?php else: ?>
                                    <span class="text-muted">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['kategori']; ?></td>
                            <td>Rp. <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                            <td>Rp. <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['stok']; ?></td>
                            <td>
                                <a href="?mod=artikel&act=ubah&id=<?php echo $row['id_barang']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="?mod=artikel&act=hapus&id=<?php echo $row['id_barang']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Data barang masih kosong.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>