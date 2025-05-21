<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/galeri_sgk.css">

</head>
<body>
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
<p>Tidak ada galeri yang ditampilkan.</p>
<?php endif; ?>


    <script src="assets/js/galeri_sgk.js"></script>
</body>
</html>
            