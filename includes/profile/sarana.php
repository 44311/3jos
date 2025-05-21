<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - sarana & prasarana</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png">
    

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/main_index.css">
    <link rel="stylesheet" href="assets/css/s_p.css">

</head>
<body>
    <!-- =============================================================================================== -->
    <!-- Back to top -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    <!-- =============================================================================================== -->
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>
    
    <!-- =============================================================================================== -->
        
            <!-- Carousel Sarana (Bootstrap 5.1) -->
    <div id="carouselSarana" class="carousel slide mb-5" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselSarana" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselSarana" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselSarana" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded shadow">
            <div class="carousel-item active">
            <img src="assets/img/bg.jpg" class="d-block w-100" alt="Gerbang Sekolah">
            <div class="carousel-caption d-none d-md-block">
                <h3>Gerbang SMP Negeri 3 Pasar Kemis</h3>
            </div>
            </div>
            <div class="carousel-item">
            <img src="assets/img/OP.jpg" class="d-block w-100" alt="Lapangan Sekolah">
            <div class="carousel-caption d-none d-md-block">
                <h3>Lapangan</h3>
            </div>
            </div>
            <div class="carousel-item">
            <img src="assets/img/bg.jpg" class="d-block w-100" alt="Ruang Kelas">
            <div class="carousel-caption d-none d-md-block">
                <h3>Ruang Kelas</h3>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselSarana" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" href="#carouselSarana" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </a>
        </div>

    <!-- =============================================================================================== -->
    <!-- Content -->    
    <div class="galeri-s_p-container">
        <div class="galeri-s_p-item" onclick="openModal('../../assets/img/OP.jpg')">
            <img src="img/OP.jpg" alt="Foto 1">
            <p class="caption-s_p">Deskripsi Foto 1</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-s_p">Deskripsi Foto 2</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/bg.jpg')">
            <img src="img/bg.jpg" alt="Foto 3">
            <p class="caption-s_p">Deskripsi Foto 3</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-s_p">Deskripsi Foto 2</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/OP.jpg')">
            <img src="img/OP.jpg" alt="Foto 1">
            <p class="caption-s_p">Deskripsi Foto 1</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-s_p">Deskripsi Foto 2</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/bg.jpg')">
            <img src="img/bg.jpg" alt="Foto 3">
            <p class="caption-s_p">Deskripsi Foto 3</p>
        </div>
        <div class="galeri-s_p-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-s_p">Deskripsi Foto 2</p>
        </div>
    </div>

    <div id="modal-s_p" class="modal-s_p">
        <span class="close-s_p" onclick="closeModal()">&times;</span>
        <img class="modal-s_p-content" id="modal-s_p-image">
        <div class="modal-s_p-caption-s_p" id="modal-s_p-caption-s_p"></div>
    </div>

    <script src="assets/js/s_p.js"></script>

    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
        
</body>
</html>
            