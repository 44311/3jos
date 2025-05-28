<?php
// Mulai session kalau perlu (untuk umum biasanya gak wajib, kecuali ada fitur login)
// session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/config/config.php';

// Ambil data galeri guru dari database
$query = "SELECT * FROM galeri_sarana ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$galeri_items = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $galeri_items[] = [
            'img' => '/Project_SMPN3/admin/dist/sarana/uploads/' . $row['filename'], // sesuaikan pathnya ya' . $row['filename'],  // sesuaikan pathnya ya
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - sarana & prasarana</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png">
    

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../galeri/assets/css/galeri_sgk.css">
    <link rel="stylesheet" href="../../assets/css/main_index.css">

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
        <?php
            $carouselItems = [
                [
                    'img' => 'assets/img/bg.jpg',
                    'alt' => 'Gerbang Sekolah',
                    'caption' => 'Gerbang SMP Negeri 3 Pasar Kemis'
                ],
                [
                    'img' => 'assets/img/OP.jpg',
                    'alt' => 'Lapangan Sekolah',
                    'caption' => 'Lapangan Besar Sekolah'
                ],
                [
                    'img' => 'assets/img/kelas.jpg',
                    'alt' => 'Ruang Kelas',
                    'caption' => 'Ruang Kelas Modern'
                ]
            ];
            include '../component/banner2.php';
        ?>

    <!-- =============================================================================================== -->
    <!-- Content -->    
    <?php include '../component/galeri_sgk.php'; ?>

    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../galeri/assets/js/galeri_sgk.js"></script> 
</body>
</html>
            