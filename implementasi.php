<?php
// TAMPILKAN ERROR AGAR TIDAK BLANK
error_reporting(E_ALL);
ini_set('display_errors', 1);

// INCLUDE CLASS
include "class/Form.php";
include "class/Database.php";

// INSTANCE
$db = new Database();
$form = new Form("", "Simpan Data");

// FIX UNTUK CHECKBOX (UBAH ARRAY MENJADI STRING)
if (isset($_POST['hobi']) && is_array($_POST['hobi'])) {
    $_POST['hobi'] = implode(", ", $_POST['hobi']);
}

// JIKA DISUBMIT
if ($_POST) {

    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'pass' => $_POST['pass'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => $_POST['hobi'],
        'alamat' => $_POST['alamat'],
    ];

    // SIMPAN DATA KE TABEL "users"
    $simpan = $db->insert('users', $data);

    if ($simpan) {
        echo "<div style='color:green'>Data berhasil disimpan!</div>";
    } else {
        echo "<div style='color:red'>Gagal menyimpan data.</div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Praktikum 11 - Implementasi Form</title>
</head>
<body>

<h3>Form Input User (OOP)</h3>

<?php
// FIELD-FIELD FORM
$form->addField("nama", "Nama Lengkap");
$form->addField("email", "Email");
$form->addField("pass", "Password", "password");

$form->addField("jenis_kelamin", "Jenis Kelamin", "radio", [
    'L' => 'Laki-laki',
    'P' => 'Perempuan'
]);

$form->addField("agama", "Agama", "select", [
    'Islam'   => 'Islam',
    'Kristen' => 'Kristen',
    'Katolik' => 'Katolik',
    'Hindu'   => 'Hindu',
    'Budha'   => 'Budha'
]);

$form->addField("hobi", "Hobi", "checkbox", [
    'Membaca'   => 'Membaca',
    'Coding'    => 'Coding',
    'Traveling' => 'Traveling'
]);

$form->addField("alamat", "Alamat Lengkap", "textarea");

// TAMPILKAN FORM
$form->displayForm();
?>

</body>
</html>
