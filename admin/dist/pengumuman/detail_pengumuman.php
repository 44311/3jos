<?php
$conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id dari URL dan pastikan tipe data integer
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0):
    $stmt = $conn->prepare("SELECT * FROM pengumuman WHERE id_pengumuman = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0):
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($row['judul']); ?> - Detail Pengumuman</title>
    <link rel="icon" type="image/png" href="../../../assets/img/logo.png">
    <style>
        
    </style>
</head>
<body>

    <?php include '../../../includes/home/header.php'; ?>

    <div class="container py-4" style="max-width: 1000px; margin-top: 80px;">
        <!-- Tombol Kembali -->
        <a href="javascript:history.back()" class="btn btn-outline-primary mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <!-- Konten Pengumuman -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="card-title text-center mb-3" style="font-weight: bold; font-size: 30px;"><?= htmlspecialchars($row['judul']); ?></h4>

                <?php if (!empty($row['gambar'])): ?>
                    <div class="mb-4 text-center">
                        <img src="uploads/<?= htmlspecialchars($row['gambar']); ?>" 
                                alt="<?= htmlspecialchars($row['judul']); ?>" 
                                class="img-fluid rounded shadow-sm d-block mx-auto"
                                style="max-height: 350px; object-fit: cover;">
                    </div>
                <?php endif; ?>

                <p class="card-text fs-5"><?= nl2br(htmlspecialchars($row['isi'])); ?></p>
                <p class="text-muted small text-end mt-4">
                    Diposting pada: <?= date("d M Y", strtotime($row['tanggal'])); ?>
                </p>
            </div>
        </div>
    </div>

    <?php include '../../../includes/home/footer.php'; ?>
</body>

</html>

<?php
    else:
        echo "<p>Pengumuman tidak ditemukan.</p>";
    endif;
    $stmt->close();
else:
    echo "<p>ID pengumuman tidak valid.</p>";
endif;
$conn->close();
?>

