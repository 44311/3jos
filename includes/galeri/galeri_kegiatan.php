<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png">

    <link rel="stylesheet" href="assets/css/galeri_sgk.css">

</head>
<body>
    <!-- =============================================================================================== -->
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>

    <!-- =============================================================================================== -->
    <!-- Banner -->
    <?php
        $bannerImage = 'assets/img/bg.jpg';
        $bannerTitle = 'Galeri Kegiatan SMPN 3 Pasar Kemis';   

        include '../component/banner.php';
    ?>
    <!-- =============================================================================================== -->
    <!-- Galeri Kegiatan -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <?php
        $galeri_items = [
            ["img" => "img/ini.jpg", "caption" => "Galeri Kegiatan 1"],
            ["img" => "img/ini.jpg", "caption" => "Galeri Kegiatan 2"],
            ["img" => "img/ini.jpg", "caption" => "Galeri Kegiatan 3"],
            ["img" => "img/ini.jpg", "caption" => "Galeri Kegiatan 4"],
            ["img" => "img/ini.jpg", "caption" => "Galeri Kegiatan 5"],
            ["img" => "img/ini.jpg", "caption" => "Galeri Kegiatan 6"],
            // dst
        ];
        include '../component/galeri_sgk.php';
    ?>
    
    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
</body>
</html>
            