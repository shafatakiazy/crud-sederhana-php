# Aplikasi CRUD Data Barang Sederhana

Aplikasi web sederhana untuk mengelola data barang yang mencakup fungsi **CRUD (Create, Read, Update, Delete)** berbasis **PHP Native** dan database **MySQL**.

Proyek ini dibuat untuk memenuhi tugas mata kuliah **Pengembangan Aplikasi Web** (Handling Forms, HTTP Methods, & State handling).

---

## 🚀 Fitur Aplikasi
- **Create**: Menambahkan data barang baru (Nama Barang & Jumlah) ke database.
- **Read**: Menampilkan seluruh daftar data barang dalam bentuk tabel HTML.
- **Update**: Mengubah/mengedit data barang yang sudah tersimpan.
- **Delete**: Menghapus data barang dari database.

---

## 🛠️ Teknologi yang Digunakan
- **PHP** (PHP Native)
- **MySQL / MariaDB**
- **HTML5**
- **XAMPP** (Web Server Apache & MySQL)

---

## ⚙️ Cara Menjalankan Proyek Secara Lokal

### 1. Persiapan Server Lokal
1. Pastikan aplikasi **XAMPP** sudah terinstal di komputer Anda.
2. Jalankan **XAMPP Control Panel**, lalu klik **Start** pada modul **Apache** dan **MySQL**.

### 2. Pindahkan Folder Proyek
Pindahkan atau simpan folder proyek ini di dalam direktori `htdocs` XAMPP Anda:
`C:\xampp\htdocs\nama_folder_proyek`

### 3. Konfigurasi Database
1. Buka browser dan akses **phpMyAdmin** di alamat: `http://localhost/phpmyadmin`
2. Klik tab **SQL**, lalu jalankan query berikut untuk membuat database dan tabel:

```sql
CREATE DATABASE IF NOT EXISTS db_sederhana;
USE db_sederhana;

CREATE TABLE IF NOT EXISTS barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    jumlah INT NOT NULL
);
