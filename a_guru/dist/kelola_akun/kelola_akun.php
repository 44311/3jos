<?php
session_start();
if (!isset($_SESSION['nip_guru'])) {
    header("Location: ../../auth/login.php");
    exit;
}
include '../../../config/config.php';

$nip = $_SESSION['nip_guru'];
$nama = $_SESSION['nama_guru'];
$pesan = "";

// Ambil data guru
$query = mysqli_query($conn, "SELECT * FROM akun_guru WHERE nip = '$nip'");
$data = mysqli_fetch_assoc($query);

// Proses update profil
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $password = $_POST['password'];

    // Jika password diisi, update semuanya
    if (!empty($password)) {
        $update = mysqli_query($conn, "UPDATE akun_guru SET email_guru='$email', telp_guru='$telp', password='$password' WHERE nip='$nip'");
    } else {
        $update = mysqli_query($conn, "UPDATE akun_guru SET email_guru='$email', telp_guru='$telp' WHERE nip='$nip'");
    }

    if ($update) {
        $pesan = "<div class='alert alert-success'>Profil berhasil diperbarui!</div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal memperbarui data.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Penting buat mobile -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h3 {
            font-size: 1.8rem;
        }

        @media (max-width: 576px) {
            h3 {
                font-size: 1.5rem;
                text-align: center;
            }
            .form-label {
                font-size: 1rem;
            }
            .form-control {
                font-size: 1rem;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include '../inc/sidebar.php'; ?>

    <div class="container mt-4">
        <h3 class="mb-4"><i class="bi bi-person-circle me-2"></i>Kelola Akun</h3>

        <?= $pesan ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" class="form-control" value="<?= $data['nip'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="<?= $data['nama_lengkap'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" value="<?= $data['mapel'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $data['email_guru'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">No. HP</label>
                <input type="text" class="form-control" name="telp" value="<?= $data['telp_guru'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password Baru <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
                <input type="password" class="form-control" name="password" placeholder="Password baru">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
