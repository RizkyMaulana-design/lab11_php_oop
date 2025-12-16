<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi OOP PHP - Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="?mod=artikel">Praktikum OOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <!-- Menu Artikel -->
                <li class="nav-item">
                    <a class="nav-link" href="?mod=artikel">Data Artikel</a>
                </li>
                
                <!-- Menu Profil (DITAMBAHKAN KEMBALI) -->
                <li class="nav-item">
                    <a class="nav-link" href="?mod=user&act=profile">
                        Profil (<?php echo htmlspecialchars($_SESSION['user_nama']); ?>)
                    </a>
                </li>

                <!-- Menu Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="?mod=user&act=logout">Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?mod=user&act=login">Login</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

<div class="container mt-4 content-wrapper">