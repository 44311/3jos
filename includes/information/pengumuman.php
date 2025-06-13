<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - Pengumuman</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo_favicon.png">
    

</head>
<body>
    <!-- =============================================================================================== -->
        <a href="#" class="back-to-top">
            <i class="fas fa-arrow-up"></i>
        </a>
    <!-- =============================================================================================== -->
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>

    <!-- Banner -->
    <?php
        $bannerImage = 'assets/img/lapangan_tengah4.jpg';
        $bannerTitle = 'Pengumuman & Berita SMPN 3 Pasar Kemis';   
        include '../component/banner.php';
    ?>
    
    <!-- =============================================================================================== -->
        <a href="#" class="back-to-top">
            <i class="fas fa-arrow-up"></i>
        </a>
        <section class="latest-posts">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Pengumuman & Berita</h2>
                </div>
                <div class="posts-grid">
                    <?php
                        $base_path_gambar = '../../uploads/pengumuman/';
                        include '../../admin/dist/pengumuman/konten_pengumuman.php';
                    ?>
                </div>
            </div>
        </section>

    
    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
</body>
</html>
            