<div id="galleryPage" data-aos='fade' data-aos-duration='1000'>
    <h1>galerie</h1>

    <?php $titlePage = "PN - galerie"; ?>

    <div id="gallery">
        <?php foreach ($photos as $key => $photo) : ?>
            <div class="card" onclick="ShowSlider('<?= $key; ?>')">
                <!-- <h3><?= $photo->pho_name; ?></h3> -->
                <div class="thumbnail"><img src="<?= $photo->pho_path ?>"></div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="mask" data-aos='fade' data-aos-duration='1000'>
    </div>

    <div id="slider" data-aos='fade' data-aos-duration='1000'>
        <span class="material-symbols-outlined" onclick="HideSlider()">
            disabled_by_default
        </span>
    </div>
</div>