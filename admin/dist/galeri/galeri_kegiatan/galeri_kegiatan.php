<?php
session_start();
// Cek session login admin
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: /Project_SMPN3/admin/auth/login.php");
    exit;
}
?>
<?php
session_start();
include '../../../../config/config.php';

// Ambil data dari database
$galeri = mysqli_query($conn, "SELECT * FROM galeri_kegiatan ORDER BY id DESC");

// Cek mode edit
$editMode = false;
$editData = ['id' => '', 'caption' => '', 'filename' => ''];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM galeri_kegiatan WHERE id = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        $editMode = true;
        $editData = $row;
    }
}

// Proses simpan/update
if (isset($_POST['submit'])) {
    $caption = $_POST['caption'];
    $id_edit = $_POST['id'];

    // Upload file baru jika ada
    if (!empty($_FILES['foto']['name'])) {
        $filename = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $filename);
    } else {
        $filename = $_POST['old_filename'];
    }

    if ($id_edit == '') {
        // Tambah baru
        mysqli_query($conn, "INSERT INTO galeri_kegiatan (filename, caption) VALUES ('$filename', '$caption')");
    } else {
        // Edit
        mysqli_query($conn, "UPDATE galeri_kegiatan SET filename='$filename', caption='$caption' WHERE id=$id_edit");
    }
    header("Location: galeri_kegiatan.php");
    exit;
}

// Proses hapus
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM galeri_kegiatan WHERE id=$id");
    header("Location: galeri_kegiatan.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Galeri Kegiatan</title>
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Penting! -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .text-center {
            text-align: center;
            padding-top: 50px;
        }
        
        .table img {
            width: 100px;
            height: auto;
            border-radius: 8px;
        }
        .form-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        @media (max-width: 576px) {
            .table img {
                width: 0px;
            }
            h2, h4 {
                font-size: 1.4rem;
            }
            .form-label, .btn, input, select {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include '../../inc/sidebar.php'; ?>

<div class="container my-4">
    <h2 class="text-center fw-bold mb-4">Kelola Galeri Kegiatan</h2>

    <!-- Tabel Galeri -->
    <div class="table-responsive mb-5">
        <table class="table table-bordered align-middle text-center table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Caption</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($galeri as $g): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="uploads/<?= $g['filename'] ?>" alt="Foto"></td>
                    <td><?= htmlspecialchars($g['caption']) ?></td>
                    <td>
                        <a href="?edit=<?= $g['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="?delete=<?= $g['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Form Tambah/Edit -->
    <div class="form-section">
        <h4 class="mb-3"><?= $editMode ? 'Edit Foto' : 'Tambah Foto Baru' ?></h4>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $editData['id'] ?>">
            <input type="hidden" name="old_filename" value="<?= $editData['filename'] ?>">

            <div class="mb-3">
                <label class="form-label">Caption:</label>
                <input type="text" name="caption" class="form-control" required value="<?= htmlspecialchars($editData['caption']) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto:</label><br>
                <?php if ($editMode): ?>
                    <img src="uploads/<?= $editData['filename'] ?>" width="100" class="mb-2"><br>
                <?php endif; ?>
                <input type="file" name="foto" class="form-control" <?= $editMode ? '' : 'required' ?>>
            </div>

            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary"><?= $editMode ? 'Update' : 'Simpan' ?></button>
                <?php if ($editMode): ?>
                    <a href="galeri_kegiatan.php" class="btn btn-secondary">Batal</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

</body>
</html>

