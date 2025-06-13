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
        $bannerImage = 'assets/img/kumpulan.jpg';
        $bannerTitle = 'Dokumen Layanan';   

        include '../component/banner.php';
    ?>

    <!-- =============================================================================================== -->
    <!-- Content -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>    

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

    <!-- =============================================================================================== -->
    <!-- Footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Project_SMPN3/includes/home/footer.php'; ?>
    <!-- =============================================================================================== --> 
    
</body>
</html>
            