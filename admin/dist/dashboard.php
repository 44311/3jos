<?php
session_start();
// Cek session login admin
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: /Project_SMPN3/admin/auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include 'inc/sidebar.php'; ?>
    <div class="main-content">
        <?php include 'inc/header.php'; ?>

        <div class="content">
        <h2>Selamat datang di Dashboard Admin</h2>
        <p>Silakan pilih menu di sebelah kiri.</p>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
