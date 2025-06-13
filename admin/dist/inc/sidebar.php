<!-- SIDEBAR.PHP -->
<!-- Bootstrap CSS (Opsional, kalau belum dipanggil di halaman utama) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/Project_SMPN3/assets/img/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
            SMPN 3 Pasar Kemis
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">Dashboard Menu - Admin</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/dashboard.php">
                            <i class="bi bi-house-door me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/galeri/galeri_guru/galeri_guru.php">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Galeri Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/galeri/galeri_kegiatan/galeri_kegiatan.php">
                            <i class="bi bi-calendar-event me-2"></i>Galeri Kegiatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/galeri/galeri_siswa/galeri_siswa.php">
                            <i class="bi bi-people me-2"></i>Galeri Siswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/prestasi/galeri_prestasi.php">
                            <i class="bi bi-award me-2"></i>Konten Prestasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/sarana/galeri_sarana.php">
                            <i class="bi bi-building me-2"></i>Sarana
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/pengumuman/pengumuman.php">
                            <i class="bi bi-megaphone me-2"></i>Pengumuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/layanan/cp.php">
                            <i class="bi bi-bar-chart-line me-2"></i>Capaian Pembelajaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/layanan/bahan_ajar.php">
                            <i class="bi bi-journal-text me-2"></i>Bahan Ajar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/layanan/kumpulan_dok.php">
                            <i class="bi bi-folder2-open me-2"></i>Kumpulan Dokumen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project_SMPN3/admin/dist/akun_guru/akun_guru.php">
                            <i class="bi bi-person-circle me-2"></i>Akun Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/Project_SMPN3/admin/auth/logout.php" onclick="return confirm('Yakin ingin logout?')">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle JS (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
