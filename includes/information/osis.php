<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - osis</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo_favicon.png">
    <link rel="stylesheet" href="assets/css/osis.css">


</head>
<body>
    <!-- =============================================================================================== -->
        <a href="#" class="back-to-top">
            <i class="fas fa-arrow-up"></i>
        </a>

    <!-- =============================================================================================== -->
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>
    
    <!-- =============================================================================================== -->
    <!-- Osis -->   
    <section class="osis">
        <div class="container"> 
            <h2 class="section-title-osis">Struktur Organisasi OSIS</h2>
            <p class="section-subtitle-osis">
            Berikut adalah susunan pengurus OSIS SMP Negeri 3 Pasar Kemis tahun ajaran 2024/2025.
            </p>

            <div class="osis-hierarchy">
            <!-- Ketua -->
            <div class="osis-member ketua">
                <img src="assets/img/ini.jpg" alt="Ketua OSIS">
                <h3>Ketua OSIS</h3>
                <p>Jhon Doe</p>
                    <div class="social-icons">
                        <a href="#" class="social-link ig"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link fb"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link tiktok"><i class="fab fa-tiktok"></i></a>
                    </div>
            </div>

            <!-- Wakil Ketua -->
            <div class="osis-row">
                <div class="osis-member wakil">
                    <img src="assets/img/ini.jpg" alt="Wakil Ketua OSIS">
                    <h3>Wakil Ketua 1</h3>
                    <p>Jane Doe</p>
                        <div class="social-icons">
                            <a href="#" class="social-link ig"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link fb"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link tiktok"><i class="fab fa-tiktok"></i></a>
                        </div>
                </div>
                <div class="osis-member wakil">
                    <img src="assets/img/ini.jpg" alt="Wakil Ketua OSIS">
                    <h3>Wakil Ketua 2</h3>
                    <p>Jhon Doe</p>
                        <div class="social-icons">
                            <a href="#" class="social-link ig"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link fb"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link tiktok"><i class="fab fa-tiktok"></i></a>
                        </div>
                </div>
            </div>

            <!-- Sekretaris & Bendahara -->
            <div class="osis-row">
                <div class="osis-member sedang">
                    <img src="../../assets/img/osis/sekretaris.jpg" alt="Sekretaris">
                    <h3>Sekretaris 1</h3>
                    <p>Jane Doe</p>
                </div>
                <div class="osis-member sedang">
                    <img src="../../assets/img/osis/bendahara.jpg" alt="Bendahara">
                    <h3>Sekretaris 2</h3>
                    <p>Jhon Doe</p>
                </div>
                <div class="osis-member sedang">
                    <img src="../../assets/img/osis/bendahara.jpg" alt="Bendahara">
                    <h3>Bendahara 1</h3>
                    <p>Jane Doe</p>
                </div>
                <div class="osis-member sedang">
                    <img src="../../assets/img/osis/bendahara.jpg" alt="Bendahara">
                    <h3>Bendahara 2</h3>
                    <p>Jhon Doe</p>
                </div>
            </div>

            <!-- Koordinator Kegiatan -->
            <div class="osis-row">
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor1.jpg" alt="Koordinator Kegiatan 1">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 1</p>
                </div>
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor2.jpg" alt="Koordinator Kegiatan 2">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 2</p>
                </div>
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor3.jpg" alt="Koordinator Kegiatan 3">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 3</p>
                </div>
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor3.jpg" alt="Koordinator Kegiatan 3">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 3</p>
                </div>
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor3.jpg" alt="Koordinator Kegiatan 3">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 3</p>
                </div>
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor3.jpg" alt="Koordinator Kegiatan 3">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 3</p>
                </div>
                <div class="osis-member kecil">
                    <img src="../../assets/img/osis/koor3.jpg" alt="Koordinator Kegiatan 3">
                    <h3>Koordinator Kegiatan</h3>
                    <p>Nama 3</p>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- =============================================================================================== -->
    <!-- Banner -->
    <?php
        $bannerImage = 'assets/img/bg.jpg';
        $bannerTitle = 'Program Kerja';   

        include '../component/banner.php';
    ?>

    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
</body>
</html>
            