<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/main_index.css">
    <link rel="stylesheet" href="assets/css/galeri_sgk.css">

</head>
<body>
    <!-- =============================================================================================== -->
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>

    <!-- =============================================================================================== -->
    <!-- Galeri VIDEO -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    
    <h2 class="galeri-sgk-title">Galeri Video</h2>

    <div class="galeri-sgk-container">
        <div class="galeri-sgk-item" onclick="openModal('../../assets/img/OP.jpg')">
            <img src="img/OP.jpg" alt="Foto 1">
            <p class="caption-sgk">Deskripsi Foto 1</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-sgk">Deskripsi Foto 2</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/bg.jpg')">
            <img src="img/bg.jpg" alt="Foto 3">
            <p class="caption-sgk">Deskripsi Foto 3</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-sgk">Deskripsi Foto 2</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/OP.jpg')">
            <img src="img/OP.jpg" alt="Foto 1">
            <p class="caption-sgk">Deskripsi Foto 1</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-sgk">Deskripsi Foto 2</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/bg.jpg')">
            <img src="img/bg.jpg" alt="Foto 3">
            <p class="caption-sgk">Deskripsi Foto 3</p>
        </div>
        <div class="galeri-sgk-item" onclick="openModal('img/ini.jpg')">
            <img src="img/ini.jpg" alt="Foto 2">
            <p class="caption-sgk">Deskripsi Foto 2</p>
        </div>
    </div>

    <div id="modal-sgk" class="modal-sgk">
        <span class="close-sgk" onclick="closeModal()">&times;</span>
        <img class="modal-sgk-content" id="modal-sgk-image">
        <div class="modal-sgk-caption-sgk" id="modal-sgk-caption-sgk"></div>
    </div>

    <script src="assets/js/galeri_sgk.js"></script>
    
    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== -->
    
</body>
</html>
            