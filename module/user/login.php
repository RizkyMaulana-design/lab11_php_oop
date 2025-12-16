<?php

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'Username dan Password wajib diisi!';
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        
        $result = $db->query($sql);

        if ($result && $result->num_rows > 0) {
            
            $user_data = $result->fetch_assoc();

            if (password_verify($password, $user_data['password'])) {
                
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_nama'] = $user_data['nama'];
                $_SESSION['username'] = $user_data['username'];

                header("Location: index.php?mod=artikel");
                exit;

            } else {
                $error = 'Password yang Anda masukkan salah.';
            }

        } else {
            $error = 'Username tidak ditemukan.';
        }
    }
}
?>

<div class="login-container">
    <h2 class="text-center">Login</h2>
    <p class="text-center">Silakan login untuk masuk ke sistem.</p>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
    </form>
</div>

<style>
    .login-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .alert {
        padding: 10px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        margin-bottom: 15px;
    }
    .btn-block {
        width: 100%;
    }
</style>