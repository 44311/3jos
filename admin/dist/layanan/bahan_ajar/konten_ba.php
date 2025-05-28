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
                                        href="../../admin/dist/layanan/capaian_pembelajaran/uploads/<?= $row['file_pdf'] ?>"
                                        download>
                                        Download
                                    </a>
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
