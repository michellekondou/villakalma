<?php if( is_page('home') ) : ?>
<?php 
    $images = get_field('gallery');
    if( $images ): 
?>
<!--Gallery full size module-->
<div class="gallery-wide">
    <?php foreach( $images as $image ): 
        $file_id = $image['id'];
        $file_url = get_field('image_url', $file_id);
    ?>  
    <div class="col-xs-12 gallery-cell">
        <figure class="">
        <?php if( $file_url ): ?>
        <a href="<?php echo $file_url; ?>">
        <?php endif; ?>
            <picture class="">
                <source srcset="<?php echo $image['sizes']['gallery-wide-l']; ?>" media="(max-width: 991px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-xl']; ?>" media="(max-width: 1662px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-xxl']; ?>" media="(max-width: 1920px)">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="alt: <?php echo $image['caption'];  ?>" />
            </picture>
        <?php if( $file_url ): ?>
        </a>
        <?php endif; ?>
        <figcaption class="caption">
        <p><?php echo $image['caption']; ?></p>
        </figcaption>
        </figure>
    </div> 
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php endif; ?>