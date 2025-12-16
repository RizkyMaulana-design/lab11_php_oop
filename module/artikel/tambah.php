<?php

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    
    $nama_gambar = ""; 
    
    if (!empty($_FILES['file_gambar']['name'])) {
        $nama_file_asli = $_FILES['file_gambar']['name'];
        $tmp_file = $_FILES['file_gambar']['tmp_name'];
        $target_dir = "gambar/";
        $target_file = $target_dir . basename($nama_file_asli);
        
        if (move_uploaded_file($tmp_file, $target_file)) {
            $nama_gambar = $nama_file_asli;
        }
    }

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
            VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$nama_gambar')";
    
    if ($db->query($sql)) {
        header("Location: index.php?mod=artikel");
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan data! Cek apakah nama barang mengandung tanda petik.');</script>";
    }
}
?>

<div class="card">
    <div class="card-header">
        <h3>Tambah Data Barang</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Elektronik">Elektronik</option>
                    <option value="Komputer">Komputer</option>
                    <option value="Handphone">Handphone</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" required>
            </div>
            
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" required>
            </div>
            
            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok" required>
            </div>

            <div class="form-group">
                <label>Foto Barang</label>
                <input type="file" class="form-control-file" name="file_gambar">
            </div>

            <div class="form-group mt-3">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="?mod=artikel" class="btn btn-secondary">Batal</a>
            </div>
            
        </form>
    </div>
</div>