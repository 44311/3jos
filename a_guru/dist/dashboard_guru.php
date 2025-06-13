<?php
session_start();
if (!isset($_SESSION['nip_guru'])) {
    header("Location: ../auth/login.php");
    exit;
}
$nama_guru = $_SESSION['nama_guru'];
$nip_guru = $_SESSION['nip_guru']; // bisa dipakai kalau mau nampilin NIP
?>

<?php
// koneksi ke database (pastikan sudah benar)
include '../../config/config.php';

// hitung total bahan ajar
$result_bahan = mysqli_query($conn, "SELECT COUNT(*) AS total FROM bahan_ajar");
$data_bahan = mysqli_fetch_assoc($result_bahan);
$total_bahan = $data_bahan['total'] ?? 0;

// hitung total capaian pembelajaran
$result_capaian = mysqli_query($conn, "SELECT COUNT(*) AS total FROM layanan_cp");
$data_capaian = mysqli_fetch_assoc($result_capaian);
$total_capaian = $data_capaian['total'] ?? 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Guru</title>
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo_favicon.png">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php include 'inc/sidebar.php'; ?>

<main class="p-4" style="margin-left: auto; max-width: 900px; margin-right: auto;">
    <div class="container-fluid">
        <h2 class="mb-4">Selamat datang, <?= htmlspecialchars($nama_guru); ?> 👋</h2>

        <!-- Profil Singkat Guru -->
        <div class="card mb-4 shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-info text-white">
            <strong>Profil Anda</strong>
        </div>
        <div class="card-body">
            <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($_SESSION['nama_guru']); ?></p>
            <p><strong>NIP:</strong> <?= htmlspecialchars($_SESSION['nip_guru']); ?></p>
            <p><strong>Mata Pelajaran:</strong> <?= htmlspecialchars($_SESSION['mapel']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email_guru']); ?></p>
            <p><strong>No HP:</strong> <?= htmlspecialchars($_SESSION['telp_guru']); ?></p>
        </div>
        </div>

        <div class="row g-4 justify-content-center text-center">
        <!-- Card Upload Bahan Ajar -->
        <div class="col-12 col-md-4">
            <div class="card text-bg-primary shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><i class="bi bi-upload"></i> Upload Bahan Ajar</h5>
                <p class="card-text flex-grow-1">Unggah materi pembelajaran ke sistem.</p>
                <a href="layanan/bahan_ajar/bahan_ajar.php" class="btn btn-light btn-sm mt-auto">Mulai Upload</a>
            </div>
            </div>
        </div>

        <!-- Card Kumpulan Dokumen -->
        <div class="col-12 col-md-4">
            <div class="card text-bg-success shadow-sm h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><i class="bi bi-folder2-open"></i> Kumpulan Dokumen</h5>
                <p class="card-text flex-grow-1">Lihat & kelola dokumen pembelajaran.</p>
                <a href="kumpulan_dokumen/kumpulan_dokumen.php" class="btn btn-light btn-sm mt-auto">Lihat Dokumen</a>
            </div>
            </div>
        </div>

        <!-- Card Statistik -->
        <div class="col-12 col-md-4">
            <div class="card text-bg-warning shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title"><i class="bi bi-bar-chart-line"></i> Statistik</h5>
                <p class="card-text fs-5">
                    Bahan Ajar: <strong><?= $total_bahan; ?></strong> | Capaian Pembelajaran: <strong><?= $total_capaian; ?></strong>
                </p>
                </div>
            </div>
        </div>
        </div>
    </div>

    <style>
        /* Buat teks & tombol lebih besar di HP */
        @media (max-width: 576px) {
        main h2 {
            font-size: 1.75rem;
        }
        main .card-title {
            font-size: 1.25rem;
        }
        main .card-text {
            font-size: 1.1rem;
        }
        main .btn {
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
        }
        }
    </style>
</main>


</body>
</html>
