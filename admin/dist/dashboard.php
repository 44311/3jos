<?php
session_start();
// Cek session login admin
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: /Project_SMPN3/admin/auth/login.php");
    exit;
}
// manggil nama admin
include '../../config/config.php';
$adminName = $_SESSION['loginAdmin']['Nama'];

// Query untuk mendapatkan data pengunjung dalam 7 hari terakhir 
$query = "
        SELECT DATE(waktu_kunjungan) AS tanggal, COUNT(*) AS jumlah 
        FROM pengunjung 
        WHERE waktu_kunjungan >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
        GROUP BY DATE(waktu_kunjungan)
        ORDER BY tanggal
    ";

    $result = mysqli_query($conn, $query);

    $tanggal = [];
    $jumlah = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $tanggal[] = $row['tanggal'];
        $jumlah[] = $row['jumlah'];
    }

// Hitung total pengunjung
$jumlahPengunjung = mysqli_query($conn, "SELECT COUNT(*) as total FROM pengunjung");
$dataPengunjung = mysqli_fetch_assoc($jumlahPengunjung);
$totalPengunjung = $dataPengunjung['total'];

// Ambil jumlah total guru dari tabel akun_guru
$query_total_guru = mysqli_query($conn, "SELECT COUNT(*) as total FROM akun_guru");
$data_total_guru = mysqli_fetch_assoc($query_total_guru);
$total_guru = $data_total_guru['total'];

$q1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM galeri_siswa");
$q2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM galeri_guru");
$q3 = mysqli_query($conn, "SELECT COUNT(*) as total FROM galeri_kegiatan");

$total1 = mysqli_fetch_assoc($q1)['total'];
$total2 = mysqli_fetch_assoc($q2)['total'];
$total3 = mysqli_fetch_assoc($q3)['total'];

$total_upload_galeri = $total1 + $total2 + $total3;


// Query jumlah data bahan ajar
$q_bahan_ajar = mysqli_query($conn, "SELECT COUNT(*) as total FROM bahan_ajar");
$total_bahan_ajar = mysqli_fetch_assoc($q_bahan_ajar)['total'];

// Query jumlah data Capaian Pembelajaran
$q_capaian_pembelajaran = mysqli_query($conn, "SELECT COUNT(*) as total FROM layanan_cp");
$total_capaian_pembelajaran = mysqli_fetch_assoc($q_capaian_pembelajaran)['total'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo_favicon.png">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>
<body>
    <?php include 'inc/sidebar.php'; ?>
    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Selamat Datang, <?= htmlspecialchars($adminName); ?> !</h2>

        <!-- Statistik Cepat -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                <h5><i class="fas fa-chalkboard-teacher"></i> Total Akun Guru</h5>
                <h2><?= $total_guru ?></h2>
                </div>
            </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark shadow">
                    <div class="card-body">
                        <h5><i class="fas fa-images"></i> Konten Galeri</h5>
                        <h2><?= $total_upload_galeri ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                <h5><i class="fas fa-book"></i> Bahan Ajar</h5>
                <h2><?= $total_bahan_ajar ?></h2>
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                <h5><i class="fas fa-folder"></i> Capaian Pembelajaran</h5>
                <h2><?= $total_capaian_pembelajaran ?></h2>
                </div>
            </div>
            </div>
        </div>

        <!-- Shortcut -->
        <div class="row g-3">
            <div class="col-md-3">
            <a href="akun_guru/akun_guru.php" class="btn btn-outline-primary w-100"><i class="fas fa-users-cog"></i> Kelola Akun Guru</a>
            </div>
            <div class="col-md-3"> 
                <a href="galeri/galeri_kegiatan/galeri_kegiatan.php" class="btn btn-outline-warning w-100"><i class="fas fa-image"></i> Kelola Galeri</a>
            </div>
            <div class="col-md-3">
            <a href="layanan/bahan_ajar/bahan_ajar.php" class="btn btn-outline-success w-100"><i class="fas fa-file"></i> Kelola Bahan Ajar</a>
            </div>
            <div class="col-md-3">
            <a href="layanan/capaian_pembelajaran/cp.php" class="btn btn-outline-danger w-100"><i class="fas fa-book"></i> Kelola Capaian Pembelajaran</a>
            </div>
            <div class="col-md-3">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                <h5><i class="fas fa-eye"></i> Total Pengunjung</h5>
                <h2><?= $totalPengunjung; ?></h2>
                </div>
            </div>
        </div>
        </div>

        <?php
        $namaAdmin = $_SESSION['loginAdmin']['Nama'];
        $username = $_SESSION['loginAdmin']['username'];
        $emailAdmin = $_SESSION['loginAdmin']['email_admin'];
        $telpAdmin = $_SESSION['loginAdmin']['telp_admin'];
        $alamatAdmin = $_SESSION['loginAdmin']['alamat_admin'];
        ?>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Profil Admin</h5>
                <p><strong>Nama:</strong> <?= $namaAdmin ?></p>
                <p><strong>Username:</strong> <?= $username ?></p>
                <p><strong>Email:</strong> <?= $emailAdmin ?></p>
                <p><strong>Telepon:</strong> <?= $telpAdmin ?></p>
                <p><strong>Alamat:</strong> <?= $alamatAdmin ?></p>
            </div>
        </div>


        <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Grafik Pengunjung (7 Hari Terakhir)</h5>
            <canvas id="pengunjungChart" width="400" height="150"></canvas>
        </div>
        </div>

        <script>
            const ctx = document.getElementById('pengunjungChart').getContext('2d');
            const pengunjungChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= json_encode($tanggal) ?>,
                    datasets: [{
                        label: 'Jumlah Pengunjung',
                        data: <?= json_encode($jumlah) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            });
        </script>
    

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
