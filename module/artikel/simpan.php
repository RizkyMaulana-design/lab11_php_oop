<?php
$db = new Database();

$data = [
    'judul' => $_POST['judul'],
    'isi'   => $_POST['isi']
];

$db->insert('artikel', $data);

header("Location: /lab11_php_oop/artikel/index");
?>
