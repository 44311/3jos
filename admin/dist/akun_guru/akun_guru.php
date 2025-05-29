<?php
$conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

// Fungsi untuk amanin input (simple)
function aman($str) {
    global $conn;
    return htmlspecialchars($conn->real_escape_string(trim($str)));
}

// Proses tambah akun
if (isset($_POST['tambah'])) {
    $nip = aman($_POST['nip']);
    $password = aman($_POST['password']);
    $nama_lengkap = aman($_POST['nama_lengkap']);
    $email_guru = aman($_POST['email_guru']);
    $telp_guru = aman($_POST['telp_guru']);
    $mapel = aman($_POST['mapel']);

    // Cek unik NIP
    $cek = $conn->query("SELECT * FROM akun_guru WHERE nip='$nip'");
    if ($cek->num_rows > 0) {
        $error = "NIP sudah terdaftar!";
    } else {
        $conn->query("INSERT INTO akun_guru (nip, password, nama_lengkap, email_guru, telp_guru, mapel) VALUES 
        ('$nip', '$password', '$nama_lengkap', '$email_guru', '$telp_guru', '$mapel')");
        header("Location: akun_guru.php");
        exit;
    }
}

// Proses hapus
if (isset($_GET['hapus'])) {
    $id_guru = (int)$_GET['hapus'];
    $conn->query("DELETE FROM akun_guru WHERE id_guru=$id_guru");
    header("Location: akun_guru.php");
    exit;
}

// Ambil data untuk edit (jika ada)
$edit_data = null;
if (isset($_GET['edit'])) {
    $id_guru = (int)$_GET['edit'];
    $res = $conn->query("SELECT * FROM akun_guru WHERE id_guru=$id_guru");
    $edit_data = $res->fetch_assoc();
}

// Proses update
if (isset($_POST['update'])) {
    $id_guru = (int)$_POST['id_guru'];
    $nip = aman($_POST['nip']);
    $password = aman($_POST['password']);
    $nama_lengkap = aman($_POST['nama_lengkap']);
    $email_guru = aman($_POST['email_guru']);
    $telp_guru = aman($_POST['telp_guru']);
    $mapel = aman($_POST['mapel']);

    // Cek unik NIP selain id_guru ini
    $cek = $conn->query("SELECT * FROM akun_guru WHERE nip='$nip' AND id_guru != $id_guru");
    if ($cek->num_rows > 0) {
        $error = "NIP sudah terdaftar oleh akun lain!";
    } else {
        $conn->query("UPDATE akun_guru SET nip='$nip', password='$password', nama_lengkap='$nama_lengkap', email_guru='$email_guru', telp_guru='$telp_guru', mapel='$mapel' WHERE id_guru=$id_guru");
        header("Location: akun_guru.php");
        exit;
    }
}

// Ambil semua data akun guru
$akun_guru = $conn->query("SELECT * FROM akun_guru ORDER BY tanggal_dibuat DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Akun Guru</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- penting untuk responsif -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        #formTambah {
            display: none;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            h2, h4 {
                font-size: 1.3rem;
            }
            label {
                font-size: 0.9rem;
            }
            .form-control {
                font-size: 0.9rem;
            }
            .btn {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body class="container py-4">
    <?php include '../inc/sidebar.php'; ?>
    <h2 class="mb-4">Kelola Akun Guru</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <button id="btnTambah" class="btn btn-primary mb-3 w-100">Tambah Akun Guru</button>

    <div id="formTambah" class="border rounded p-3 shadow-sm bg-light">
        <form method="POST" action="">
            <input type="hidden" name="id_guru" value="<?= $edit_data['id_guru'] ?? '' ?>">
            
            <div class="mb-3">
                <label>NIP (Username)</label>
                <input type="text" name="nip" required class="form-control" value="<?= htmlspecialchars($edit_data['nip'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="text" name="password" required class="form-control" value="<?= htmlspecialchars($edit_data['password'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required class="form-control" value="<?= htmlspecialchars($edit_data['nama_lengkap'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email_guru" class="form-control" value="<?= htmlspecialchars($edit_data['email_guru'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="telp_guru" class="form-control" value="<?= htmlspecialchars($edit_data['telp_guru'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" value="<?= htmlspecialchars($edit_data['mapel'] ?? '') ?>">
            </div>

            <?php if ($edit_data): ?>
                <button type="submit" name="update" class="btn btn-warning w-100 mb-2">Update Akun</button>
                <a href="akun_guru.php" class="btn btn-secondary w-100">Batal</a>
            <?php else: ?>
                <button type="submit" name="tambah" class="btn btn-success w-100">Tambah Akun</button>
            <?php endif; ?>
        </form>
    </div>

    <hr>

    <h4>Daftar Akun Guru</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Mata Pelajaran</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($akun_guru->num_rows > 0): ?>
                    <?php while ($row = $akun_guru->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($row['nip']) ?></td>
                            <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                            <td><?= htmlspecialchars($row['email_guru']) ?></td>
                            <td><?= htmlspecialchars($row['telp_guru']) ?></td>
                            <td><?= htmlspecialchars($row['mapel']) ?></td>
                            <td class="text-center"><?= $row['tanggal_dibuat'] ?></td>
                            <td class="text-center">
                                <a href="?edit=<?= $row['id_guru'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?hapus=<?= $row['id_guru'] ?>" onclick="return confirm('Yakin ingin hapus akun ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center">Belum ada akun guru</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        const btnTambah = document.getElementById('btnTambah');
        const formTambah = document.getElementById('formTambah');

        btnTambah.addEventListener('click', () => {
            formTambah.style.display = formTambah.style.display === 'none' ? 'block' : 'none';
            btnTambah.textContent = formTambah.style.display === 'none' ? 'Tambah Akun Guru' : 'Tutup Form';
        });

        // Jika mode edit, tampilkan form otomatis
        <?php if ($edit_data): ?>
            formTambah.style.display = 'block';
            btnTambah.textContent = 'Tutup Form';
        <?php endif; ?>
    </script>
</body>
</html>

