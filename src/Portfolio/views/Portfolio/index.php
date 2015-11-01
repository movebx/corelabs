<?php

?>

<div class="gallery">
    <?php
        foreach($images as $image):
            $imgHref = \Framework\Request\Request::getHost().'/uploads/portfolio/gallery/'.$image->name;
    ?>
    <div class="img-preview">
        <a href="<?= $imgHref?>">
            <img class="gallery-img" src="<?= $imgHref ?>" alt="<?= $image->alt ?>" />
        </a>
    </div>
    <?php endforeach ?>
</div>