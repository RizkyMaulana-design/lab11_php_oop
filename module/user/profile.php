<?php
// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?mod=user&act=login");
    exit;
}

$id = $_SESSION['user_id'];
$pesan = "";
$error = "";

// PROSES SUBMIT FORM
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password_baru = $_POST['password_baru'];
    
    // Validasi input
    if (empty($nama)) {
        $error = "Nama lengkap tidak boleh kosong.";
    } else {
        // Logika Update
        // Cek apakah user ingin mengganti password?
        if (!empty($password_baru)) {
            // TUGAS NO 2: Implementasi password_hash
            $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
            
            $sql = "UPDATE users SET nama = '$nama', password = '$password_hash' WHERE id = '$id'";
        } else {
            // Jika password kosong, berarti hanya update nama saja
            $sql = "UPDATE users SET nama = '$nama' WHERE id = '$id'";
        }

        if ($db->query($sql)) {
            $pesan = "Profil berhasil diperbarui!";
            // Update nama di session agar header langsung berubah
            $_SESSION['user_nama'] = $nama;
        } else {
            $error = "Terjadi kesalahan: " . $db->connection->error;
        }
    }
}

// AMBIL DATA USER TERBARU
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $db->query($sql);
$data = $result->fetch_assoc();
?>

<div class="card">
    <div class="card-header">
        <h3>Profil Pengguna</h3>
    </div>
    <div class="card-body">
        
        <?php if ($pesan): ?>
            <div class="alert alert-success"><?php echo $pesan; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <!-- TUGAS NO 1: Menampilkan Username (Readonly) -->
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $data['username']; ?>" readonly>
                    <small class="text-muted">Username tidak dapat diubah.</small>
                </div>
            </div>

            <!-- TUGAS NO 1: Menampilkan Nama (Bisa diedit) -->
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>
            </div>

            <hr>

            <!-- TUGAS NO 1 & 2: Form Ubah Password -->
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ganti Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password_baru" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                    <small class="text-muted">Masukkan password baru jika ingin menggantinya. Password akan dienkripsi otomatis.</small>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?mod=home" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>