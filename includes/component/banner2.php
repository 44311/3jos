<?php if (isset($carouselItems) && is_array($carouselItems)): ?>
<div id="carouselCustom" class="carousel slide mb-5" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <?php foreach ($carouselItems as $index => $item): ?>
            <li data-bs-target="#carouselCustom" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner rounded shadow">
        <?php foreach ($carouselItems as $index => $item): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= $item['img'] ?>" class="d-block w-100" alt="<?= $item['alt'] ?>">
                <?php if (!empty($item['caption'])): ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h3><?= $item['caption'] ?></h3>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselCustom" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </a>
    <a class="carousel-control-next" href="#carouselCustom" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Selanjutnya</span>
    </a>
</div>
<?php endif; ?>
