<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis - Login Guru</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png">
    <link rel="stylesheet" href="../admin/dist/css/login_page.css">
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
        <form action="">
            <div class="logo-login-page">
                <img src="../assets/img/logo.png" class="logo-img-login-page" alt="Logo SMPN 3 Pasar Kemis">
            </div>
            <h1>Login Guru</h1>

            <div class="input-box-login-page">
            <input type="text" placeholder="username" required />
            <!-- <i class="bx bxs-user"></i> -->
            </div>
            <div class="input-box-login-page">
            <input type="password" placeholder="password" required />
            <!-- <i class="bx bxs-lock-alt"></i> -->
            </div>

            <div class="remember-forgot">
            <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn-login-page">Login</button>

            <div class="login-page-g">
            <a href="../admin/auth/login.php">Login Admin</a>
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
            
