<div class="carousel-gallery">
    <?php
        $gallery = get_field('gallery_photos', $post->ID);
        foreach ( $gallery as $image) :
            $url = $image['url'];
            $alt = $image['alt'];
        ?>
        <img class="image-container" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
        <?php
        endforeach;
    ?>
</div>