<?php
// Default value kalau belum di-set
$bannerImage = $bannerImage ?? 'assets/img/default-banner.jpg';
$bannerTitle = $bannerTitle ?? 'Judul Halaman';
?>

<div class="banner-section" style="background-image: url('<?= $bannerImage ?>');">
    <div class="banner-overlay">
        <h1 class="banner-title"><?= $bannerTitle ?></h1>
    </div>
</div>
