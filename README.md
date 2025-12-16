# 📘 Praktikum 11 & 12 – Pemrograman Web (PHP OOP)

Repository ini berisi hasil pengerjaan **Praktikum 11 dan Praktikum 12** mata kuliah **Pemrograman Web** Universitas Pelita Bangsa.

---

## 👤 Identitas Mahasiswa

* **Nama** : Rizky Maulana
* **NIM** : (312410430)
* **Mata Kuliah** : Pemrograman Web
* **Dosen Pengampu** : Agung Nugroho, S.Kom., M.Kom.
* **Universitas** : Universitas Pelita Bangsa

---

## 🧪 Praktikum 11 – PHP OOP Lanjutan (Framework Modular & Routing)

### 🎯 Tujuan Praktikum

1. Memahami konsep dasar framework modular.
2. Memahami konsep dasar routing pada PHP.
3. Mampu membuat framework sederhana menggunakan PHP berbasis OOP.

---

### 📂 Struktur Folder

```
lab11_php_oop/
├── .htaccess
├── config.php
├── index.php
├── class/
│   ├── Database.php
│   └── Form.php
├── module/
│   └── artikel/
│       ├── index.php
│       ├── tambah.php
│       └── ubah.php
├── template/
│   ├── header.php
│   ├── footer.php
│   └── sidebar.php
```

---

### ⚙️ Penjelasan Singkat

* **index.php** → Bertindak sebagai router utama aplikasi
* **.htaccess** → Digunakan untuk URL rewriting
* **class/** → Berisi class Database dan Form berbasis OOP
* **module/** → Berisi modul aplikasi (artikel)
* **template/** → Berisi layout header dan footer

---

### 🌐 Contoh Routing

```
http://localhost/lab11_php_oop/artikel/index
```

Routing ini akan otomatis diarahkan oleh `.htaccess` ke `index.php` lalu ke modul yang sesuai.

---

### 📸 Hasil Praktikum 11

* Struktur folder berhasil dibuat
* Routing berjalan dengan baik
* Modul artikel dapat diakses

*(Tambahkan screenshot hasil di sini)*

---

## 🔐 Praktikum 12 – Autentikasi & Session

### 🎯 Tujuan Praktikum

1. Memahami konsep autentikasi (login & logout).
2. Memahami penggunaan session pada PHP.
3. Mengamankan halaman dengan autentikasi.

---

### 🗄️ Persiapan Database

Membuat tabel `users` pada database `latihan_oop`:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100)
);
```

Insert user admin:

```sql
INSERT INTO users (username, password, nama)
VALUES ('admin', '<hash_password>', 'Administrator');
```

Password dienkripsi menggunakan fungsi `password_hash()`.

---

### 🔑 Fitur Autentikasi

* Login menggunakan username dan password
* Password diverifikasi menggunakan `password_verify()`
* Session digunakan untuk menyimpan status login
* Halaman tertentu dilindungi (tidak bisa diakses tanpa login)

---

### 👤 Modul User

* `login.php` → Halaman login
* `logout.php` → Menghapus session dan logout
* `profile.php` → Menampilkan data user dan ubah password

---

### 🧠 Proteksi Halaman

Jika user belum login dan mencoba mengakses halaman admin/artikel, maka otomatis diarahkan ke halaman login.

---

### 🧪 Pengujian

1. Akses halaman artikel tanpa login → redirect ke login
2. Login dengan akun admin
3. Berhasil masuk ke halaman artikel
4. Mengakses profil user
5. Logout berhasil

*(Tambahkan screenshot pengujian di sini)*

---

## ✅ Kesimpulan

Dari Praktikum 11 dan 12 ini, dapat disimpulkan bahwa:

* Framework sederhana berbasis PHP OOP berhasil dibuat
* Konsep routing dan modularisasi dapat diterapkan dengan baik
* Autentikasi dan session berhasil diimplementasikan
* Aplikasi menjadi lebih aman dan terstruktur

---

## 📌 Catatan

Repository ini dibuat untuk memenuhi tugas **Praktikum 11 dan 12 Pemrograman Web**.
