<?php
session_start();
// Cek session login admin
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: /Project_SMPN3/admin/auth/login.php");
    exit;
}
?>
<?php
// Koneksi database
include_once("../../../config/config.php");

// Tambah data
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "../../../uploads/pengumuman/";

    if ($gambar != "") {
        move_uploaded_file($tmp, "$folder" . $gambar);
    }

    $query = "INSERT INTO pengumuman (judul, isi, kategori, tanggal, gambar)
            VALUES ('$judul', '$isi', '$kategori', '$tanggal', '$gambar')";
    mysqli_query($conn, $query);
    header("Location: pengumuman.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id_pengumuman = $_GET['hapus'];
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman=$id_pengumuman"));
    if ($data['gambar'] != "" && file_exists("../../../uploads/pengumuman/" . $data['gambar'])) {
        unlink("../../../uploads/pengumuman/" . $data['gambar']);
    }
    mysqli_query($conn, "DELETE FROM pengumuman WHERE id_pengumuman=$id_pengumuman");
    header("Location: pengumuman.php");
}

// Ambil data untuk edit
$edit = null;
if (isset($_GET['edit'])) {
    $id_pengumuman = $_GET['edit'];
    $edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman=$id_pengumuman"));
}

// Update data
if (isset($_POST['update'])) {
    $id_pengumuman = $_POST['id_pengumuman'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        // Ambil data lama sebelum upload baru
        $lama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman=$id_pengumuman"));
        $oldPath = "../../../uploads/pengumuman/" . $lama['gambar'];

        // Hapus gambar lama (kalau ada)
        if ($lama['gambar'] != "" && file_exists($oldPath)) {
            unlink($oldPath);
        }

        // Upload gambar baru
        move_uploaded_file($tmp, "../../../uploads/pengumuman/" . $gambar);

        $query = "UPDATE pengumuman SET judul='$judul', isi='$isi', kategori='$kategori', tanggal='$tanggal', gambar='$gambar' WHERE id_pengumuman=$id_pengumuman";
    } else {
        $query = "UPDATE pengumuman SET judul='$judul', isi='$isi', kategori='$kategori', tanggal='$tanggal' WHERE id_pengumuman=$id_pengumuman";
    }

    mysqli_query($conn, $query);
    header("Location: pengumuman.php");
}

?>

<!DOCTYPE html>
<html lang="id_pengumuman">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengumuman</title>
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo_favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-thumbnail {
            max-height: 60px;
        }

        .text-center {
            text-align: center;
            padding-top: 50px;
        }
        @media (max-width: 576px) {
            h2, label, th, td, button {
                font-size: 14px !important;
            }
            .img-thumbnail {
                max-height: 40px;
            }
        }
    </style>
</head>
<body class="p-3">
<?php include '../inc/sidebar.php'; ?>

<div class="container mt-4">
    <h2 class="text-center fw-bold mb-4">Kelola Pengumuman</h2>

    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><img src="../../../uploads/pengumuman/<?= $row['gambar'] ?>" alt="gambar" class="img-thumbnail img-fluid"></td>
                        <td>
                            <a href="?edit=<?= $row['id_pengumuman'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <a href="?hapus=<?= $row['id_pengumuman'] ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <h2 class="mb-3"><?= $edit ? "Edit Pengumuman" : "Tambah Pengumuman" ?></h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pengumuman" value="<?= $edit['id_pengumuman'] ?? '' ?>">

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required value="<?= $edit['judul'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Isi</label>
            <textarea name="isi" class="form-control" rows="5" required><?= $edit['isi'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" required value="<?= $edit['kategori'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="<?= $edit['tanggal'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar <?= $edit ? "(Biarkan kosong jika tidak ingin ganti)" : "" ?></label>
            <input type="file" name="gambar" class="form-control" <?= $edit ? '' : 'required' ?>>
            <?php if ($edit && $edit['gambar']): ?>
                <img src="../../../uploads/pengumuman/<?= $edit['gambar'] ?>" class="mt-2 img-thumbnail" height="70">
            <?php endif; ?>
        </div>

        <button type="submit" name="<?= $edit ? 'update' : 'tambah' ?>" class="btn btn-success">
            <?= $edit ? "Update" : "Tambah" ?>
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


