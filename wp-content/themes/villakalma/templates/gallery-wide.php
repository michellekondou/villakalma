<?php if( is_page('home') ) : ?>
<?php 
    $images = get_field('gallery');
    if( $images ): 
?>
 
<!--Gallery full size module-->
<div class="gallery-wide image-container">
    <?php foreach( $images as $image ): 
        $file_id = $image['id'];
        $file_url = get_field('image_url', $file_id);
    ?>  
    <div class="col-xs-12 gallery-cell">
        <svg class="loader" width='120px' height='120px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-default"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(0 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(30 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.08333333333333333s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(60 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.16666666666666666s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(90 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.25s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(120 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.3333333333333333s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(150 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.4166666666666667s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(180 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(210 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5833333333333334s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(240 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.6666666666666666s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(270 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.75s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(300 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.8333333333333334s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(330 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.9166666666666666s' repeatCount='indefinite'/></rect></svg>
        <figure>
        <?php if( $file_url ): ?>
        <a href="<?php echo $file_url; ?>">
        <?php endif; ?>
            <picture class="is-loading test">
                <source srcset="<?php echo $image['sizes']['gallery-wide-l']; ?>" media="(max-width: 991px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-xl']; ?>" media="(max-width: 1662px)">
                <source srcset="<?php echo $image['sizes']['gallery-wide-xxl']; ?>" media="(min-width: 1663px)">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="alt: <?php echo $image['caption'];  ?>">
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