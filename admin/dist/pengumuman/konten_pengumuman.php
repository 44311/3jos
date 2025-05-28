<?php
// Atur limit dan base path gambar
$limit = isset($limit) ? intval($limit) : 0;
$base_path_gambar = isset($base_path_gambar) ? $base_path_gambar : "";

// Koneksi database
$conn = new mysqli("localhost", "root", "", "smp3pasarkemis");

// Query ambil data
$sql = "SELECT * FROM pengumuman ORDER BY tanggal DESC";
if ($limit > 0) {
    $sql .= " LIMIT $limit";
}
$data = $conn->query($sql);

// Tampilkan
while ($row = $data->fetch_assoc()) {
?>
    <div class="post-card">
        <div class="post-image">
            <img src="<?= $base_path_gambar . $row['gambar']; ?>" alt="Blog Post">
            <div class="post-category"><?= htmlspecialchars($row['kategori']); ?></div>
        </div>
        <div class="post-content">
            <a href="#">
                <h3 class="post-title"><?= nl2br(htmlspecialchars($row['judul'])); ?></h3>
            </a>
            <p class="post-excerpt"><?= nl2br(htmlspecialchars(substr($row['isi'], 0, 100))); ?>...</p>
            <div class="post-meta">
                <div class="post-date"><?= date("d M Y", strtotime($row['tanggal'])); ?></div>
            </div>
        </div>
    </div>
<?php } ?>
