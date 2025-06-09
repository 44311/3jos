<?php
session_start();
// Cek session login admin
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: /Project_SMPN3/admin/auth/login.php");
    exit;
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

// Tambah
if (isset($_POST['tambah'])) {
    $materi = $_POST['materi'];
    $mapel = $_POST['mapel'];
    $kelas = $_POST['kelas'];

    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $file);

    $conn->query("INSERT INTO bahan_ajar (materi, mata_pelajaran, kelas, file_pdf) 
                VALUES ('$materi', '$mapel', '$kelas', '$file')");
    header("Location: bahan_ajar.php");
}

// Hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM bahan_ajar WHERE id=$id");
    header("Location: bahan_ajar.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Capaian Pembelajaran</title>
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-center {
            text-align: center;
            padding-top: 50px;
        }
        .img-thumbnail {
            max-height: 50px;
        }
        @media (max-width: 576px) {
            h2.text-center {
                font-size: 1.3rem;
                padding-top: 20px;
            }
        }
    </style>
</head>
<body class="container py-4">
    <?php include '../../inc/sidebar.php'; ?>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <h2 class="text-center fw-bold mb-4">Layanan Bahan Ajar</h2>

            <!-- Form Tambah -->
            <form method="POST" enctype="multipart/form-data" class="mb-4 p-3 border rounded bg-light shadow-sm">
                <div class="mb-3">
                    <label class="form-label">Materi</label>
                    <input type="text" name="materi" placeholder="Judul" required class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel" placeholder="Mata Pelajaran" required class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-select" required>
                        <option value="">Pilih Kelas</option>
                        <option value="7">Kelas 7</option>
                        <option value="8">Kelas 8</option>
                        <option value="9">Kelas 9</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">File PDF</label>
                    <input type="file" name="file" accept=".pdf" required class="form-control">
                </div>
                <button type="submit" name="tambah" class="btn btn-success w-100">Tambah</button>
            </form>

            <!-- Tabel Daftar File -->
            <h4 class="mt-5 mb-3">Daftar File</h4>
            <div class="table-responsive shadow-sm">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Materi</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>File</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = $conn->query("SELECT * FROM bahan_ajar ORDER BY tanggal_upload DESC");
                        while ($row = $q->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['materi']) ?></td>
                            <td><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                            <td class="text-center"><?= $row['kelas'] ?></td>
                            <td class="text-center">
                                <a href="uploads/<?= $row['file_pdf'] ?>" target="_blank" class="btn btn-outline-primary btn-sm">Lihat</a>
                            </td>
                            <td class="text-center"><?= $row['tanggal_upload'] ?></td>
                            <td class="text-center">
                                <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus file ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if ($q->num_rows == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>

