# Website SMP Negeri 3 Pasar Kemis

Website profil sekolah SMP Negeri 3 Pasar Kemis yang dibuat menggunakan PHP. Website ini menyediakan informasi sekolah serta layanan download bahan ajar dan dokumen resmi sekolah.

## Fitur Utama
- Halaman profil sekolah lengkap dengan visi, misi, dan program pendidikan
- Layanan download bahan ajar bagi siswa dan guru
- Layanan download dokumen resmi sekolah
- Halaman berita dan pengumuman sekolah
- Galeri foto kegiatan sekolah

## Cara Menjalankan
1. Siapkan web server dengan PHP (misal: XAMPP, MAMP, atau hosting dengan PHP)
2. Import database yang sudah disediakan ke MySQL
3. Upload seluruh file website ke direktori root server (htdocs atau public_html)
4. Sesuaikan konfigurasi database pada file `config.php`
5. Akses website melalui browser pada alamat server (contoh: http://localhost/ atau domain hosting)

## Konfigurasi
- Sesuaikan koneksi database di file `config.php`:
```php
<?php
$host = "localhost";
$username = "user_database";
$password = "password_database";
$database = "nama_database";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
