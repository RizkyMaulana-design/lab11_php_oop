<?php
$form = new Form("/lab11_php_oop/artikel/simpan", "Simpan Artikel");

$form->addField("judul", "Judul");
$form->addField("isi", "Isi Artikel", "textarea");

$form->displayForm();
?>
