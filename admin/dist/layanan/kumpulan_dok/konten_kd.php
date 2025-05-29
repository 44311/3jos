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
                                    <a class="btn btn-sm btn-primary"
                                        href="../../admin/dist/layanan/kumpulan_dokumen/uploads/<?= $row['file_pdf'] ?>"
                                        download>Download</a>
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
