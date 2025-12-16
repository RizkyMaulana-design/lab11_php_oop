<?php
$id = $_GET['id'];

$sql = "SELECT * FROM data_barang WHERE id_barang = '$id'";
$result = $db->query($sql);
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    
    $sql_update = "UPDATE data_barang SET 
                   nama = '$nama', 
                   kategori = '$kategori', 
                   harga_jual = '$harga_jual', 
                   harga_beli = '$harga_beli', 
                   stok = '$stok' 
                   WHERE id_barang = '$id'";
    
    if ($db->query($sql_update)) {
        header("Location: index.php?mod=artikel");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah data.</div>";
    }
}
?>

<div class="card">
    <div class="card-header">
        <h3>Ubah Data Barang</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Elektronik" <?php if($data['kategori'] == 'Elektronik') echo 'selected'; ?>>Elektronik</option>
                    <option value="Komputer" <?php if($data['kategori'] == 'Komputer') echo 'selected'; ?>>Komputer</option>
                    <option value="Handphone" <?php if($data['kategori'] == 'Handphone') echo 'selected'; ?>>Handphone</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $data['stok']; ?>" required>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="?mod=artikel" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>