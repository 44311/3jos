<?php
session_start();
$conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $password = $_POST['password'];

    $query = "SELECT * FROM akun_guru WHERE nip = '$nip'";
    $result = $conn->query($query);

    if ($result && $result->num_rows === 1) {
        $akun = $result->fetch_assoc();
        if ($akun['password'] === $password) {
            $_SESSION['nip_guru'] = $akun['nip'];
            $_SESSION['nama_guru'] = $akun['nama_lengkap'];
            $_SESSION['id_guru'] = $akun['id_guru'];
            $_SESSION['email_guru'] = $akun['email_guru'];
            $_SESSION['telp_guru'] = $akun['telp_guru'];
            $_SESSION['mapel'] = $akun['mapel'];
            header("Location: ../dist/dashboard_guru.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Akun tidak ditemukan!";
    }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - Login Guru</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../../admin/dist/css/login_page.css">
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
    <section class="login-page">
        <div class="container-login-page">
        <form action="" method="POST">
            <div class="logo-login-page">
                <img src="../../admin/dist/assets/img/logo.png" class="logo-img-login-page" alt="Logo SMPN 3 Pasar Kemis">
            </div>
            <h1>Login Guru</h1>
            <?php if (!empty($error)) : ?>
                <div style="color: red; margin-bottom: 10px; text-align:center;">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <div class="input-box-login-page">
                <input type="text" name="nip" placeholder="NIP" required />
            </div>
            <div class="input-box-login-page">
                <input type="password" name="password" placeholder="Password" required />
            </div>

            <div class="remember-forgot">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn-login-page">Login</button>

            <div class="login-page-g">
                <a href="../../admin/auth/login.php">Login Admin</a>
            </div>
        </form>
    </div>
    </section>
    
    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
</body>
</html>
            
