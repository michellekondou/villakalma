<?php if( is_page('home') ) : ?>
<?php 
    $images = get_field('gallery');
    if( $images ): 
?>
<img src="/wp-content/themes/villakalma/dist/images/loader.gif" class="loader-slow">
<!--Gallery full size module-->
<div class="gallery-wide image-container">
    <?php foreach( $images as $image ): 
        $file_id = $image['id'];
        $file_url = get_field('image_url', $file_id);
    ?>  

    <div class="col-xs-12 gallery-cell">
        
        <figure>
        <?php if( $file_url ): ?>
        <a href="<?php echo $file_url; ?>">
        <?php endif; ?>
            <picture class="is-loading loaded">
                <source srcset="<?php echo $image['sizes']['gallery-lg-ls']; ?>" media="(max-width: 480px)">
                <source srcset="<?php echo $image['sizes']['gallery-ipad-pt']; ?>" media="(max-width: 768px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-l']; ?>" media="(max-width: 991px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-xl']; ?>" media="(max-width: 1662px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-xxl']; ?>" media="(min-width: 1663px)">
                <img alt="alt: <?php echo $image['caption'];  ?>" class="preload loaded">
                <!-- loaded by IE 8+, non-IE browsers that don’t support picture, and browsers that support picture but cannot find an appropriate source -->
                <!--[if gte IE 8]>
                <object data="<?php echo $image['sizes']['large']; ?>" type="image/jpeg"></object>
                <span class="fake-alt"><?php echo $image['caption'];  ?></span>
                <![endif]-->

                <!-- loaded by IE 6 and 7 -->
                <!--[if lt IE 8]>
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['caption'];  ?>" />
                <![endif]-->
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