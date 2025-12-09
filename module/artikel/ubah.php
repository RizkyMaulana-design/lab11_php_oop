<?php
$db = new Database();
$id = $_GET['id'];

$artikel = $db->query("SELECT * FROM artikel WHERE id=$id")->fetch_assoc();

$form = new Form("", "Update Artikel");

echo "<form method='POST' action='/lab11_php_oop/artikel/ubah?id=$id'>";

echo "Judul:<br>";
echo "<input type='text' name='judul' value='{$artikel['judul']}'><br><br>";

echo "Isi:<br>";
echo "<textarea name='isi'>{$artikel['isi']}</textarea><br><br>";

echo "<input type='submit' value='Update'>";
echo "</form>";

if ($_POST) {
    $data = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $db->update('artikel', $data, "id=$id");
    header("Location: /lab11_php_oop/artikel/index");
}
?>
