<?php
session_start();
if (!isset($_SESSION['nip_guru'])) {
    header("Location: ../../auth/login.php");
    exit;
}

$nama_guru = $_SESSION['nama_guru'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kumpulan Dokumen - Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Penting -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        h2 {
            font-size: 1.8rem;
        }

        .text-center {
            text-align: center;
            padding-top: 40px;
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
                text-align: center;
            }
            .card-header {
                font-size: 1.1rem;
                text-align: center;
            }
            .card-body {
                font-size: 1rem;
            }
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <?php include '../inc/sidebar.php'; ?>

    <main class="container mt-4">
        <h2 class="text-center mb-4"><i class="bi bi-folder2-open me-2"></i>Kumpulan Dokumen</h2>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="bi bi-journal-text me-2"></i> Bahan Ajar
            </div>
            <div class="card-body">
                <?php include '../../../admin/dist/layanan/bahan_ajar/konten_ba.php'; ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="bi bi-bar-chart-line me-2"></i> Capaian Pembelajaran
            </div>
            <div class="card-body">
                <?php include '../../../admin/dist/layanan/capaian_pembelajaran/konten_cp.php'; ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <i class="bi bi-folder-fill me-2"></i> Kumpulan Dokumen
            </div>
            <div class="card-body">
                <?php include '../../../admin/dist/layanan/kumpulan_dok/konten_kd.php'; ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
