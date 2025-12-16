<?php

session_start();

include "config.php";
require "class/database.php";

$db = new Database();

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'artikel';

if (!isset($_SESSION['user_id']) && $mod != 'user') {
    header("Location: ?mod=user&act=login");
    exit;
}

include "template/header.php";

echo '<div class="main-content">';

$act = isset($_GET['act']) ? $_GET['act'] : 'list';

switch ($mod) {

    case 'artikel':
        if ($act == 'tambah') {
            include "module/artikel/tambah.php";
        } elseif ($act == 'ubah') {
            include "module/artikel/ubah.php";
        } elseif ($act == 'hapus') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $db->query("DELETE FROM data_barang WHERE id_barang = '$id'");
                header("Location: index.php?mod=artikel");
            }
        } else {
            include "module/artikel/index.php";
        }
        break;

        case 'user':
        if ($act == 'login') {
            if (isset($_SESSION['user_id'])) {
                header("Location: ?mod=artikel");
                exit;
            }
            include "module/user/login.php";
        } elseif ($act == 'logout') {
            include "module/user/logout.php";
            
        // --- TAMBAHKAN BAGIAN INI ---
        } elseif ($act == 'profile') {
            include "module/user/profile.php";
        // ----------------------------
            
        } elseif ($act == 'tambah') {
            include "module/user/tambah.php";
        } elseif ($act == 'ubah') {
            include "module/user/ubah.php";
        } elseif ($act == 'hapus') {
            include "module/user/hapus.php";
        } else {
            include "module/user/index.php";
        }
        break;

    default:
        include "module/artikel/index.php";
        break;
}

echo '</div>';

include "template/footer.php";
?>