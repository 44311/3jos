<?php
session_start();
include '../../config/config.php';

if (isset($_SESSION['loginAdmin'])) {
    header("Location: /Project_SMPN3/admin/dist/dashboard.php");
    exit;
}

$error = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['loginAdmin'] = [
                'id_admin'     => $row['id_admin'],
                'Nama'         => $row['Nama'],
                'username'     => $row['username'],
                'email_admin'  => $row['email_admin'],
                'telp_admin'   => $row['telp_admin'],
                'alamat_admin' => $row['alamat_admin']
            ];

            header("Location: /Project_SMPN3/admin/dist/dashboard.php");
            exit;
        }
    }

    // Kalau gagal login
    $error = 'Username atau password salah!';
}
?>



<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - Login Admin</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../dist/css/login_page.css">
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
        <form action="" method="post">
            <div class="logo-login-page">
                <img src="../dist/assets/img/logo.png" class="logo-img-login-page" alt="Logo SMPN 3 Pasar Kemis">
            </div>
            <h1>Login Admin</h1>
            <?php if (!empty($error)): ?>
                <div class="error-message" style="color: red; text-align:center; margin-bottom:10px;">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <div class="input-box-login-page">
            <input type="text" name="username" placeholder="username" required autocomplete="off" />
            <!-- <i class="bx bxs-user"></i> -->
            </div>
            <div class="input-box-login-page">
            <input type="password" name="password" placeholder="password" required autocomplete="off" />
            <!-- <i class="bx bxs-lock-alt"></i> -->
            </div>

            <div class="remember-forgot">
            <a href="#">Forgot password?</a>
            </div>

            <button type="submit" name="login" class="btn-login-page">Login</button>

            <div class="login-page-g">
            <a href="../../a_guru/login.php">Login Guru</a>
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
            
