<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>SMPN 3 Pasar Kemis</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo_favicon.png">

</head>
<body>
    <!-- =============================================================================================== -->
    <!-- Header --> 
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/header.php'); ?>

    <!-- =============================================================================================== -->
    <!-- Banner -->
    <?php
        $bannerImage = 'assets/img/cp.jpg';
        $bannerTitle = 'Dokumen Pembelajaran';   

        include '../component/banner.php';
    ?>

    <!-- =============================================================================================== -->
    <!-- Content -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>    

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

    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
</body>
</html>
            