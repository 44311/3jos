<?php
include 'config/config.php';

$ip = $_SERVER['REMOTE_ADDR'];
$waktuKunjungan = date('Y-m-d');
// Cek apakah IP ini sudah tercatat hari ini
$cek = mysqli_query($conn, "SELECT * FROM pengunjung WHERE ip_address='$ip' AND waktu_kunjungan='$waktuKunjungan'");
if (mysqli_num_rows($cek) == 0) {
    mysqli_query($conn, "INSERT INTO pengunjung (ip_address, waktu_kunjungan) VALUES ('$ip', '$waktuKunjungan')");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMPN 3 Pasar Kemis</title>
    <link rel="icon" type="image/png" href="assets/img/logo_favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="includes/profile/assets/css/visi_misi.css">
    <link rel="stylesheet" href="assets/css/main_index.css">

</head>

<body>

    <?php include('includes/home/header.php'); ?>

    <!-- =================================================================================================================== -->

    <?php include('includes/home/hero_section.php'); ?>

    <!-- =================================================================================================================== -->
    <!-- Sambutan -->
    <!-- visi_misi.css -->
    <section class="hero-header-vm bg-sambutan">
        <div class="overlay-vm"></div>
        <div class="wrapper-vm">
            <div class="container-vm">
                <div class="hero-pic-sm">
                    <img src="assets/img/OP3.jpeg" alt="profile pic">
                </div>
                <div class="hero-text-vm">
                    <h1 class="h1-vm">Sambutan Kepala Sekolah</h1>
                    <h2 class="h1-vm">Kepala Sekolah Spd Mpd</h2>
                    <p style="text-align: justify;">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================================================================== -->
    <!-- Category Section -->
    <section class="categories-icon">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Informasi</h2>
            </div>
            <div class="category-icon-cards">
                <div class="category-icon-card">
                    <a href="includes/profile/staff.php">
                        <div class="category-icon-icon">
                            <i class="fa-solid fa-sitemap"></i>
                        </div>
                        <h3 class="category-icon-title">Struktur Organisasi</h3>
                        <p class="category-icon-count"></p>
                </div></a>

                <div class="category-icon-card">
                    <a href="includes/galeri/galeri_kegiatan.php">
                        <div class="category-icon-icon">
                            <i class="fa-solid fa-images"></i>
                        </div>
                        <h3 class="category-icon-title">Galeri</h3>
                        <p class="category-icon-count"></p>
                </div></a>

                <div class="category-icon-card">
                    <a href="includes/profile/visi_misi.php">
                        <div class="category-icon-icon">
                            <i class="fa-solid fa-house-user"></i>
                        </div>
                        <h3 class="category-icon-title">Sejarah</h3>
                        <p class="category-icon-count"></p>
                </div></a>

                <div class="category-icon-card">
                    <a href="includes/information/pengumuman.php">
                        <div class="category-icon-icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <h3 class="category-icon-title">Pengumuman</h3>
                        <p class="category-icon-count"></p>
                </div></a>

                <div class="category-icon-card">
                    <a href="includes/layanan/kumpulan.php">
                        <div class="category-icon-icon">
                            <i class="fa-regular fa-file"></i>
                        </div>
                        <h3 class="category-icon-title">Dokumen</h3>
                        <p class="category-icon-count"></p>
                </div></a>

            </div>
        </div>
    </section>>

    <!-- =================================================================================================================== -->
    <!-- Pengumuman -->
    <section class="latest-posts">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pengumuman & Berita</h2>
                <a href="includes/information/pengumuman.php" class="view-all">Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="posts-grid">
                <?php
                    $limit = 3;
                    $base_path_gambar = 'admin/dist/pengumuman/uploads/';
                    include 'admin/dist/pengumuman/konten_pengumuman.php';
                ?>
            </div>
        </div>
    </section>


    <!-- =================================================================================================================== -->

    <?php include('includes/home/footer.php'); ?>

    <!-- =================================================================================================================== -->

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    <script src="assets/js/main_index.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/hero_section.js"></script>

</body>

</html>