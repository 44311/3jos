<?php
$host = "localhost";     // Ganti kalau pakai hosting
$user = "root";          // Ubah kalau pakai username lain
$pass = "";              // Kosongin kalau di XAMPP, isi password kalau di hosting
$db   = "smp3pasarkemis";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<?php
$baseURL = '/Project_SMPN3';
?>



