Praktikum 11 – PHP OOP

Nama    : Rizky Maulana

Kelas   : TI.24.A.3

Nim     : 312410430

# Nama Praktikum

Praktikum 11 – PHP OOP Lanjutan
Membangun mini-framework PHP dengan konsep Modular, OOP, dan Routing.


# Penjelasan Tiap Folder & File
1. .htaccess

File yang mengaktifkan fitur routing menggunakan mod_rewrite Apache.
URL menjadi lebih rapi seperti:

- localhost/lab11_php_oop/artikel/tambah

2. index.php (Router Utama)

File paling penting yang membaca URL dan menentukan modul apa yang ditampilkan.
Contoh:

- /artikel/index  →  module/artikel/index.php
- /artikel/tambah →  module/artikel/tambah.php

3. Folder class/

Berisi class OOP:

File	Fungsi
Database.php	class untuk koneksi database, insert, update
Form.php	class untuk membuat form input dinamis (text, select, radio, dll.)

4. Folder module/

Semua fitur aplikasi diletakkan di dalam modul.
Pada tugas ini, modul artikel dibuat dengan 4 halaman:

File	Fungsi

index.php	menampilkan daftar artikel

tambah.php	form tambah artikel

simpan.php	proses menyimpan ke database

ubah.php	mengedit artikel

5. Folder template/

Berisi layout:

File	Fungsi

header.php	header HTML

footer.php	footer HTML

sidebar.php	menu navigasi modul

# Langkah Praktikum
1. Membuat struktur folder

Membuat folder lab11_php_oop beserta subfolder: class, module, template.

2. Memindahkan class Form & Database

Class dari praktikum sebelumnya ditempatkan pada folder class/.

3. Membuat file config.php

Berisi konfigurasi database:

$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'db_praktikum11'
];

4. Membuat file .htaccess untuk routing

Mengaktifkan URL rewriting agar router berjalan.

5. Membuat router utama pada index.php

Router membaca URL dan memanggil modul yang sesuai.

6. Membuat modul artikel

Berisi halaman untuk:

melihat artikel

menambah artikel

menyimpan artikel

mengubah artikel

7. Membuat template (header, footer, sidebar)

Template digunakan agar tampilan rapi dan seragam.

8. Menjalankan project

Buka di browser:

http://localhost/lab11_php_oop/implementasi.php

http://localhost/lab11_php_oop/artikel/index

✔️ Kesimpulan

Pada Praktikum 11 ini, saya telah mempelajari:

Cara membuat mini-framework PHP

Cara membuat routing URL tanpa query string

Cara membangun modul halaman

Cara menggunakan OOP untuk form dinamis dan database

Cara memisahkan template, class, dan modul agar lebih rapi
