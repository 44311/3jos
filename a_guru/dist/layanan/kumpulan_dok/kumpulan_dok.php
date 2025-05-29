<?php
$conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

// Tambah Dokumen
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $file);

    $conn->query("INSERT INTO kumpulan_dokumen (judul, kategori, deskripsi, file_pdf) 
                    VALUES ('$judul', '$kategori', '$deskripsi', '$file')");
    header("Location: kumpulan_dok.php");
}

// Hapus Dokumen
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM kumpulan_dokumen WHERE id=$id");
    header("Location: kumpulan_dok.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Kumpulan Dokumen</title>
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
            <h2 class="text-center fw-bold mb-4">Layanan Kelola Dokumen</h2>

            <!-- Form Tambah -->
            <form method="POST" enctype="multipart/form-data" class="mb-4 p-3 border rounded bg-light shadow-sm">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Contoh: Kurikulum, Administrasi" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat dokumen"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">File PDF</label>
                    <input type="file" name="file" class="form-control" accept=".pdf" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-success w-100">Tambah Dokumen</button>
            </form>

            <!-- Tabel Daftar Dokumen -->
            <h4 class="mt-5 mb-3">Daftar Dokumen</h4>
            <div class="table-responsive shadow-sm">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = $conn->query("SELECT * FROM kumpulan_dokumen ORDER BY tanggal_upload DESC");
                        while ($row = $q->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['judul']) ?></td>
                            <td><?= htmlspecialchars($row['kategori']) ?></td>
                            <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                            <td class="text-center">
                                <a href="uploads/<?= $row['file_pdf'] ?>" target="_blank" class="btn btn-outline-primary btn-sm">Lihat</a>
                            </td>
                            <td class="text-center"><?= $row['tanggal_upload'] ?></td>
                            <td class="text-center">
                                <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus dokumen ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if ($q->num_rows == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada dokumen</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
