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
    <link rel="icon" type="image/png" href="/Project_SMPN3/assets/img/logo_favicon.png"> 
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
                <?php
                $conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

                // Ambil filter
                $filter_mapel = isset($_GET['mapel']) ? $_GET['mapel'] : '';
                $filter_kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';

                // Query filter
                $query = "SELECT * FROM bahan_ajar WHERE 1";
                if (!empty($filter_mapel)) {
                    $query .= " AND mata_pelajaran = '$filter_mapel'";
                }
                if (!empty($filter_kelas)) {
                    $query .= " AND kelas = '$filter_kelas'";
                }
                $query .= " ORDER BY tanggal_upload DESC";

                $data = $conn->query($query);

                // Ambil list mapel unik untuk dropdown
                $mapelList = $conn->query("SELECT DISTINCT mata_pelajaran FROM bahan_ajar");
                ?>

        <section class="py-5">
            <div class="container">
                <h2 class="mb-4">Bahan Ajar</h2>

                <!-- Form Filter -->
                <form method="GET" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <select name="mapel" class="form-select">
                            <option value="">-- Semua Mata Pelajaran --</option>
                            <?php while ($m = $mapelList->fetch_assoc()) { ?>
                                <option value="<?= $m['mata_pelajaran'] ?>" <?= ($filter_mapel == $m['mata_pelajaran']) ? 'selected' : '' ?>>
                                    <?= $m['mata_pelajaran'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="kelas" class="form-select">
                            <option value="">-- Semua Kelas --</option>
                            <option value="7" <?= ($filter_kelas == '7') ? 'selected' : '' ?>>Kelas 7</option>
                            <option value="8" <?= ($filter_kelas == '8') ? 'selected' : '' ?>>Kelas 8</option>
                            <option value="9" <?= ($filter_kelas == '9') ? 'selected' : '' ?>>Kelas 9</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="?" class="btn btn-secondary">Reset</a>
                    </div>
                </form>

                <!-- Tabel Hasil -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Materi</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data->num_rows > 0) { ?>
                                <?php while ($row = $data->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['materi']) ?></td>
                                        <td><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                                        <td><?= $row['kelas'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="/Project_SMPN3/uploads/bahan_ajar/<?= $row['file_pdf'] ?>"
                                                download>
                                                Download
                                            </a>
                                            <a class="btn btn-secondary btn-sm" href="/Project_SMPN3/uploads/bahan_ajar/<?= $row['file_pdf'] ?>" target="_blank" class="btn btn-outline-primary btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr><td colspan="4" class="text-center">Data tidak ditemukan</td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="bi bi-bar-chart-line me-2"></i> Capaian Pembelajaran
            </div>
            <div class="card-body">
                <?php
                $conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

                // Ambil filter
                $filter_mapel = isset($_GET['mapel']) ? $_GET['mapel'] : '';
                $filter_kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';

                // Query filter
                $query = "SELECT * FROM layanan_cp WHERE 1";
                if (!empty($filter_mapel)) {
                    $query .= " AND mata_pelajaran = '$filter_mapel'";
                }
                if (!empty($filter_kelas)) {
                    $query .= " AND kelas = '$filter_kelas'";
                }
                $query .= " ORDER BY tanggal_upload DESC";

                $data = $conn->query($query);

                // Ambil list mapel unik untuk dropdown
                $mapelList = $conn->query("SELECT DISTINCT mata_pelajaran FROM layanan_cp");
                ?>

                <section class="py-5">
                    <div class="container">
                        <h2 class="mb-4">Capaian Pembelajaran</h2>

                        <!-- Form Filter -->
                        <form method="GET" class="row g-3 mb-4">
                            <div class="col-md-4">
                                <select name="mapel" class="form-select">
                                    <option value="">-- Semua Mata Pelajaran --</option>
                                    <?php while ($m = $mapelList->fetch_assoc()) { ?>
                                        <option value="<?= $m['mata_pelajaran'] ?>" <?= ($filter_mapel == $m['mata_pelajaran']) ? 'selected' : '' ?>>
                                            <?= $m['mata_pelajaran'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="kelas" class="form-select">
                                    <option value="">-- Semua Kelas --</option>
                                    <option value="7" <?= ($filter_kelas == '7') ? 'selected' : '' ?>>Kelas 7</option>
                                    <option value="8" <?= ($filter_kelas == '8') ? 'selected' : '' ?>>Kelas 8</option>
                                    <option value="9" <?= ($filter_kelas == '9') ? 'selected' : '' ?>>Kelas 9</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="?" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>

                        <!-- Tabel Hasil -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($data->num_rows > 0) { ?>
                                        <?php while ($row = $data->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['judul']) ?></td>
                                                <td><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                                                <td><?= $row['kelas'] ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/Project_SMPN3/uploads/capaian_pembelajaran/<?= $row['file_pdf'] ?>"
                                                        download>
                                                        Download
                                                    </a>
                                                    <a class="btn btn-secondary btn-sm" href="/Project_SMPN3/uploads/capaian_pembelajaran/<?= $row['file_pdf'] ?>" target="_blank" class="btn btn-outline-primary btn-sm">Lihat</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr><td colspan="4" class="text-center">Data tidak ditemukan</td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <i class="bi bi-folder-fill me-2"></i> Kumpulan Dokumen
            </div>
            <div class="card-body">
                <?php
                $conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

                $filter_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
                $filter_tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';

                $query = "SELECT *, YEAR(tanggal_upload) AS tahun FROM kumpulan_dokumen WHERE 1";
                if (!empty($filter_kategori)) {
                    $query .= " AND kategori = '$filter_kategori'";
                }
                if (!empty($filter_tahun)) {
                    $query .= " AND YEAR(tanggal_upload) = '$filter_tahun'";
                }
                $query .= " ORDER BY tanggal_upload DESC";

                $data = $conn->query($query);

                $kategoriList = $conn->query("SELECT DISTINCT kategori FROM kumpulan_dokumen");
                $tahunList = $conn->query("SELECT DISTINCT YEAR(tanggal_upload) AS tahun FROM kumpulan_dokumen ORDER BY tahun DESC");
                ?>

                <section class="py-5">
                    <div class="container">
                        <h2 class="mb-4">Kumpulan Dokumen</h2>

                        <!-- Filter Form -->
                        <form method="GET" class="row g-3 mb-4">
                            <div class="col-md-4">
                                <select name="kategori" class="form-select">
                                    <option value="">-- Semua Kategori --</option>
                                    <?php while ($k = $kategoriList->fetch_assoc()) { ?>
                                        <option value="<?= $k['kategori'] ?>" <?= ($filter_kategori == $k['kategori']) ? 'selected' : '' ?>>
                                            <?= $k['kategori'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="tahun" class="form-select">
                                    <option value="">-- Semua Tahun --</option>
                                    <?php while ($t = $tahunList->fetch_assoc()) { ?>
                                        <option value="<?= $t['tahun'] ?>" <?= ($filter_tahun == $t['tahun']) ? 'selected' : '' ?>>
                                            <?= $t['tahun'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="?" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>

                        <!-- Tabel Dokumen -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Kategori</th>
                                        <th>Tahun</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($data->num_rows > 0) { ?>
                                        <?php while ($row = $data->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['judul']) ?></td>
                                                <td><?= htmlspecialchars(strlen($row['deskripsi']) > 100 ? substr($row['deskripsi'], 0, 100) . '...' : $row['deskripsi']) ?></td>
                                                <td><?= htmlspecialchars($row['kategori']) ?></td>
                                                <td><?= $row['tahun'] ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/Project_SMPN3/uploads/kumpulan_dokumen/<?= $row['file_pdf'] ?>"
                                                        download>
                                                        Download
                                                    </a>
                                                    <a class="btn btn-secondary btn-sm" href="/Project_SMPN3/uploads/kumpulan_dokumen/<?= $row['file_pdf'] ?>" target="_blank" class="btn btn-outline-primary btn-sm">Lihat</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
