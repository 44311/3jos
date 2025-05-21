<?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMPN 3 Pasar Kemis</title>
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Global -->
    <link rel="stylesheet" href="/Project_SMPN3/assets/css/main_index.css">

    <!-- CSS Khusus per halaman -->
    <?php
        // Load CSS tambahan jika dibutuhkan
        if (isset($extra_css)) {
        foreach ($extra_css as $css) {
            echo "<link rel='stylesheet' href='$css'>\n";
        }
        }
    ?>
</head>

<body>
        <!-- Header -->
    <header class="header">
    <div class="container">
        <div class="header-inner">
            <div class="logo">
                <a href="#" class="logo-link">
                    <img src="/Project_SMPN3/assets/img/logo.png" alt="Logo SMPN 3 Pasar Kemis" class="logo-img">
                    <h1>SMPN 3 Pasar Kemis<span>.</span></h1>
                </a>
            </div>
            
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        ?>

        <nav class="main-nav">
        <ul class="nav-list">
            <li class="nav-item">
            <a href="/Project_SMPN3/index.php" class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
            </li>

            <!-- Profil -->
            <li class="nav-item dropdown">
            <a href="#" class="nav-link <?= in_array($currentPage, ['visi_misi.php', 'staff.php', 'sarana.php', 'prestasi.php']) ? 'active' : '' ?>">Profil</a>
            <ul class="dropdown-menu">
                <li><a href="/Project_SMPN3/includes/profile/visi_misi.php" class="<?= ($currentPage == 'visi_misi.php') ? 'active' : '' ?>">Visi & Misi</a></li>
                <li><a href="/Project_SMPN3/includes/profile/staff.php" class="<?= ($currentPage == 'staff.php') ? 'active' : '' ?>">Staff</a></li>
                <li><a href="/Project_SMPN3/includes/profile/sarana.php" class="<?= ($currentPage == 'sarana.php') ? 'active' : '' ?>">Sarana & Prasarana</a></li>
                <li><a href="/Project_SMPN3/includes/profile/prestasi.php" class="<?= ($currentPage == 'prestasi.php') ? 'active' : '' ?>">Prestasi</a></li>
            </ul>
            </li>

            <!-- Informasi -->
            <li class="nav-item dropdown">
            <a href="#" class="nav-link <?= in_array($currentPage, ['pengumuman.php', 'ekskul.php', 'so.php', 'osis.php']) ? 'active' : '' ?>">Informasi</a>
            <ul class="dropdown-menu">
                <li><a href="/Project_SMPN3/includes/information/pengumuman.php" class="<?= ($currentPage == 'pengumuman.php') ? 'active' : '' ?>">Pengumuman & Berita</a></li>
                <li><a href="/Project_SMPN3/includes/information/ekskul.php" class="<?= ($currentPage == 'ekskul.php') ? 'active' : '' ?>">Ektrakulikuler</a></li>
                <li><a href="/Project_SMPN3/includes/information/osis.php" class="<?= ($currentPage == 'osis.php') ? 'active' : '' ?>">Osis</a></li>
            </ul>
            </li>

            <!-- Galeri -->
            <li class="nav-item dropdown">
            <a href="#" class="nav-link <?= in_array($currentPage, ['galeri_kegiatan.php', 'galeri_guru.php', 'galeri_siswa.php', 'galeri_video.php']) ? 'active' : '' ?>">Galeri</a>
            <ul class="dropdown-menu">
                <li><a href="/Project_SMPN3/includes/galeri/galeri_kegiatan.php" class="<?= ($currentPage == 'galeri_kegiatan.php') ? 'active' : '' ?>">Kegiatan</a></li>
                <li><a href="/Project_SMPN3/includes/galeri/galeri_guru.php" class="<?= ($currentPage == 'galeri_guru.php') ? 'active' : '' ?>">Guru</a></li>
                <li><a href="/Project_SMPN3/includes/galeri/galeri_siswa.php" class="<?= ($currentPage == 'galeri_siswa.php') ? 'active' : '' ?>">Siswa</a></li>
                <li><a href="/Project_SMPN3/includes/galeri/galeri_video.php" class="<?= ($currentPage == 'galeri_video.php') ? 'active' : '' ?>">Video</a></li>
            </ul>
            </li>

            <!-- Dokumen -->
            <li class="nav-item dropdown">
            <a href="#" class="nav-link <?= in_array($currentPage, ['silabus.php', 'bahan_ajar.php', 'kumpulan.php']) ? 'active' : '' ?>">Layanan</a>
            <ul class="dropdown-menu">
                <li><a href="/Project_SMPN3/includes/layanan/silabus.php" class="<?= ($currentPage == 'silabus.php') ? 'active' : '' ?>">Silabus</a></li>
                <li><a href="/Project_SMPN3/includes/layanan/bahan_ajar.php" class="<?= ($currentPage == 'bahan_ajar.php') ? 'active' : '' ?>">Bahan Ajar</a></li>
                <li><a href="/Project_SMPN3/includes/layanan/kumpulan.php" class="<?= ($currentPage == 'kumpulan.php') ? 'active' : '' ?>">Kumpulan</a></li>
            </ul>
            </li>

            <!-- Search Form -->
            <div class="search-container">
            <form class="search-form">
                <input type="text" placeholder="SMPN 3 Pasar Kemis..." class="search-input" />
                <button type="submit" class="search-btn">
                <i class="fas fa-search"></i>
                </button>
            </form>
            </div>
        </ul>
        </nav>


        
        <div class="header-actions">
            <div class="search-toggle">
            <i class="fas fa-search"></i>
            </div>
            <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
            </div>
        </div>
        </div>
    </div>
    </header>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu">
        <div class="mobile-menu-header">
            <div class="logo">
            <a href="/Project_SMPN3/index.php" class="logo-link">
                <img src="/Project_SMPN3/assets/img/logo.png" alt="Logo SMPN 3 Pasar Kemis" class="logo-img">
                <h1>SMP Negeri 3 Pasar Kemis<span>.</span></h1>
            </a>
            </div>
            <div class="mobile-menu-close">
            <i class="fas fa-times"></i>
            </div>
        </div>
        <nav class="mobile-nav">
            <ul class="mobile-nav-list">
            <li class="mobile-nav-item">
                <a href="/Project_SMPN3/index.php" class="mobile-nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
            </li>

            <!-- Dropdown Profil -->
            <li class="mobile-nav-item has-submenu">
                <a href="#" class="mobile-nav-link <?= in_array($currentPage, ['visi_misi.php', 'staff.php', 'sarana.php', 'prestasi.php']) ? 'active' : '' ?>">Profil</a>
                <ul class="mobile-dropdown-menu">
                <li><a href="/Project_SMPN3/includes/profile/visi_misi.php" class="<?= ($currentPage == 'visi_misi.php') ? 'active' : '' ?>">Visi & Misi</a></li>
                <li><a href="/Project_SMPN3/includes/profile/staff.php" class="<?= ($currentPage == 'staff.php') ? 'active' : '' ?>">Staff</a></li>
                <li><a href="/Project_SMPN3/includes/profile/sarana.php" class="<?= ($currentPage == 'sarana.php') ? 'active' : '' ?>">Sarana & Prasarana</a></li>
                <li><a href="/Project_SMPN3/includes/profile/prestasi.php" class="<?= ($currentPage == 'prestasi.php') ? 'active' : '' ?>">Prestasi</a></li>
                </ul>
            </li>

            <!-- Dropdown Informasi -->
            <li class="mobile-nav-item has-submenu">
                <a href="#" class="mobile-nav-link <?= in_array($currentPage, ['pengumuman.php', 'ekskul.php', 'so.php', 'osis.php']) ? 'active' : '' ?>">Informasi</a>
                <ul class="mobile-dropdown-menu">
                <li><a href="/Project_SMPN3/includes/information/pengumuman.php" class="<?= ($currentPage == 'pengumuman.php') ? 'active' : '' ?>">Pengumuman & Berita</a></li>
                <li><a href="/Project_SMPN3/includes/information/ekskul.php" class="<?= ($currentPage == 'ekskul.php') ? 'active' : '' ?>">Ektrakulikuler</a></li>
                <li><a href="/Project_SMPN3/includes/information/osis.php" class="<?= ($currentPage == 'osis.php') ? 'active' : '' ?>">Osis</a></li>
                </ul>
            </li>

            <!-- Dropdown Galeri -->
            <li class="mobile-nav-item has-submenu">
                <a href="#" class="mobile-nav-link <?= in_array($currentPage, ['galeri_kegiatan.php', 'galeri_guru.php', 'galeri_siswa.php', 'galeri_video.php']) ? 'active' : '' ?>">Galeri</a>
                <ul class="mobile-dropdown-menu">
                <li><a href="/Project_SMPN3/includes/galeri/galeri_kegiatan.php" class="<?= ($currentPage == 'galeri_kegiatan.php') ? 'active' : '' ?>">Kegiatan</a></li>
                <li><a href="/Project_SMPN3/includes/galeri/galeri_guru.php" class="<?= ($currentPage == 'galeri_guru.php') ? 'active' : '' ?>">Guru</a></li>
                <li><a href="/Project_SMPN3/includes/galeri/galeri_siswa.php" class="<?= ($currentPage == 'galeri_siswa.php') ? 'active' : '' ?>">Siswa</a></li>
                <li><a href="/Project_SMPN3/includes/galeri/galeri_video.php" class="<?= ($currentPage == 'galeri_video.php') ? 'active' : '' ?>">Video</a></li>
                </ul>
            </li>

            <!-- Dropdown Dokumen -->
            <li class="mobile-nav-item has-submenu">
                <a href="#" class="mobile-nav-link <?= in_array($currentPage, ['silabus.php', 'bahan_ajar.php', 'kumpulan.php']) ? 'active' : '' ?>">Layanan</a>
                <ul class="mobile-dropdown-menu">
                <li><a href="/Project_SMPN3/includes/layanan/silabus.php" class="<?= ($currentPage == 'silabus.php') ? 'active' : '' ?>">Silabus</a></li>
                <li><a href="/Project_SMPN3/includes/layanan/bahan_ajar.php" class="<?= ($currentPage == 'bahan_ajar.php') ? 'active' : '' ?>">Bahan Ajar</a></li>
                <li><a href="/Project_SMPN3/includes/layanan/kumpulan.php" class="<?= ($currentPage == 'kumpulan.php') ? 'active' : '' ?>">Kumpulan</a></li>
                </ul>
            </li>
            </ul>
        </nav>
        </div>

    <script>
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileMenuClose = document.querySelector('.mobile-menu-close');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        // Menangani klik pada tombol menu mobile
        if (mobileMenuToggle && mobileMenu && mobileMenuClose) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden'; // Mencegah scroll saat menu aktif
        });

        mobileMenuClose.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = ''; // Mengembalikan scroll
        });
        }

        // Menangani klik pada menu dropdown di mobile
        const mobileNavItems = document.querySelectorAll('.mobile-nav-item');

        mobileNavItems.forEach(item => {
        item.addEventListener('click', function() {
            // Toggle active state untuk menunjukkan/menyembunyikan dropdown
            this.classList.toggle('active');
        });
        });
    </script>
    <script>
        const mobileNavItems = document.querySelectorAll('.mobile-nav-item.has-submenu');

        mobileNavItems.forEach(item => {
        item.addEventListener('click', function(event) {
            // Mencegah link untuk bekerja (mencegah reload atau navigasi)
            event.preventDefault();
            
            // Toggle active state untuk menunjukkan/menyembunyikan dropdown
            this.classList.toggle('active');
        });
        });

    </script>
    <script src="../assets/js/main_index.js"></script>
</body>
</html>
