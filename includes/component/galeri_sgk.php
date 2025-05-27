<?php if (isset($galeri_items) && is_array($galeri_items)): ?>
    <div class="galeri-sgk-container">
        <?php foreach ($galeri_items as $foto): ?>
            <div class="galeri-sgk-item" onclick="openModal('<?php echo $foto['img']; ?>')">
                <img src="<?php echo $foto['img']; ?>" alt="Foto">
                <p class="caption-sgk"><?php echo $foto['caption']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="modal-sgk" class="modal-sgk">
        <span class="close-sgk" onclick="closeModal()">&times;</span>
        <img class="modal-sgk-content" id="modal-sgk-image">
        <div class="modal-sgk-caption-sgk" id="modal-sgk-caption-sgk"></div>
    </div>
    <?php else: ?>
        <p class="no-galeri-sgk">Tidak ada galeri yang ditampilkan.</p>
    <?php endif; ?>