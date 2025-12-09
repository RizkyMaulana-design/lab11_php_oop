<?php
$db = new Database();
$query = $db->query("SELECT * FROM artikel ORDER BY id DESC");

echo "<h3>Data Artikel</h3>";
echo "<a href='/lab11_php_oop/artikel/tambah'>+ Tambah Artikel</a><br><br>";

echo "<table border='1' width='100%' cellpadding='5'>
<tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Aksi</th>
</tr>";

while ($row = $query->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['judul']}</td>
        <td>{$row['isi']}</td>
        <td>
            <a href='/lab11_php_oop/artikel/ubah?id={$row['id']}'>Ubah</a>
        </td>
    </tr>";
}

echo "</table>";
?>
