<?php
// Mulai session kalau perlu (untuk umum biasanya gak wajib, kecuali ada fitur login)
// session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/config/config.php';

// Ambil data galeri guru dari database
$query = "SELECT * FROM galeri_guru ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$galeri_items = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $galeri_items[] = [
            'img' => '/Project_SMPN3/admin/dist/galeri/galeri_guru/uploads/' . $row['filename'], // sesuaikan pathnya ya' . $row['filename'],  // sesuaikan pathnya ya
            'caption' => $row['caption']
        ];
    }
} else {
    // Kalau gak ada data di DB, tetap bisa pake array kosong supaya galeri_sgk.php gak error
    $galeri_items = [];
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <title>SMPN 3 Pasar Kemis</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png" />
    
    <link rel="stylesheet" href="assets/css/galeri_sgk.css" />
</head>
<body>
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>

    <!-- Banner -->
    <?php
        $bannerImage = 'assets/img/bg.jpg';
        $bannerTitle = 'Galeri Guru SMPN 3 Pasar Kemis';   
        include '../component/banner.php';
    ?>

    <!-- Galeri Guru -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Galeri -->
    <?php include '../component/galeri_sgk.php'; ?>

    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
</body>
<script src="assets/js/galeri_sgk.js"></script>
</html>
