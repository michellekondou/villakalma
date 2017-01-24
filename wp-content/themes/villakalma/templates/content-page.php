<?php if( is_page('location') ) : ?>
<!--LOCATION-->
  <?php
    get_template_part('templates/gmap');
  ?>
  <?php 
    $location = get_field('google_maps');
    if( !empty($location) ):
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="acf-map">

        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          <p class="address"><?php echo $location['address']; ?></p>
        </div>

      </div>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>

<?php if( !is_page('book-with-us') && !is_page('gallery') && !is_page('home') ) : ?>
<!--ABOUT / ACCOMODATION / LOCATION-->
<?php
  $file_desktop = get_field('single_image');
  $file_mobile = get_field('single_image_mobile');

  if( $file_desktop || $file_mobile ): 
?>
<div class="container-fluid">
  <div class="row image-container">
  <svg class="loader" width='60px' height='60px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-default"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(0 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(30 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.08333333333333333s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(60 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.16666666666666666s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(90 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.25s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(120 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.3333333333333333s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(150 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.4166666666666667s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(180 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(210 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5833333333333334s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(240 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.6666666666666666s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(270 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.75s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(300 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.8333333333333334s' repeatCount='indefinite'/></rect><rect  x='48' y='40' width='4' height='20' rx='2' ry='2' fill='#065b80' transform='rotate(330 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.9166666666666666s' repeatCount='indefinite'/></rect></svg>
    <figure class="main-image">
      <picture class="is-loading">
        <source srcset="<?php echo $file_mobile['sizes']['large']; ?>" media="(max-width: 480px)">
        <source srcset="<?php echo $file_desktop['sizes']['gallery-wide-xl']; ?>" media="(max-width: 992px)">
        <source srcset="<?php echo $file_desktop['sizes']['gallery-wide-xl']; ?>" media="(max-width: 1662px)">
        <source srcset="<?php echo $file_desktop['sizes']['gallery-wide-xxl']; ?>" media="(min-width: 1663px)">
        <img src="<?php echo $file_desktop['sizes']['large']; ?>" alt="alt: <?php echo $image['caption'];  ?>">
      </picture>
    </figure>
  </div>
</div>
<?php endif; ?>

<div class="container">
<?php
// check if the flexible content field has rows of data 
if( have_rows('main_content') ): ?>

  <!-- loop through the rows of data -->
  <?php while ( have_rows('main_content') ) : the_row();
    
    if( get_row_layout() == 'text' ): ?>
    
    <div class="row main-content">
      
      <?php if( get_sub_field('title') ): ?>
      <h2 class="col-xs-12"><?php the_sub_field('title'); ?></h2>
      <?php endif; ?>
      <?php if( get_sub_field('body_text') ): ?>

      <div class="col-xs-12"><?php the_sub_field('body_text'); ?></div>

      <?php endif; ?>
    </div>

    <?php endif; ?>

    <?php if( get_row_layout() == 'column_title' ): ?>

    <?php if( get_sub_field('title') ): ?>
    <div class="row">
      <h2 class="col-xs-12"><?php the_sub_field('title'); ?></h2>
    </div>
    <?php endif; ?>

    <?php endif; ?>

    <?php if( get_row_layout() == 'columns' ): ?>

    <div class="row columns">
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_1'); ?></div>
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_2'); ?></div>
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_3'); ?></div>
    </div>

    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>

<?php
// check if the flexible content field has rows of data 
if( have_rows('extended_content') ): ?>
<div class="row">
<button 
  class="btn btn-primary extended-content<?php if(is_page('6')){ echo ' about'; } ?>" 
  type="button" 
  data-toggle="collapse" 
  data-target="#collapseContent" 
  aria-expanded="false" 
  aria-controls="collapseContent"
>
<?php if(is_page('about')) : ?>
  services &amp; facilities
<?php else : ?>
  read more
<?php endif; ?>
</button>
</div>
<div class="row arrow">
  <svg version="1.1" id="Layer_1" class="arrow-down" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="20px" height="10px" viewBox="0 0 20 10" enable-background="new 0 0 20 10" xml:space="preserve">
  <g>
    <polygon points="17.085,9.217 10,2.19 2.914,9.217 2.21,8.506 10,0.782 17.79,8.506   "/>
  </g>
  </svg>
</div>
<div class="collapse" id="collapseContent">
  <!-- loop through the rows of data -->
  <?php while ( have_rows('extended_content') ) : the_row();
    
    if( get_row_layout() == 'text' ): ?>

    <div class="row extended-content">
      <?php if( get_sub_field('title') ): ?>
      <h2 class="col-xs-12"><?php the_sub_field('title'); ?></h2>
      <?php endif; ?>
      <?php if( get_sub_field('body_text') ): ?>
      <div class="col-xs-12"><?php the_sub_field('body_text'); ?></div>
      <?php endif; ?>
    </div>

    <?php endif; ?>

    <?php if( get_row_layout() == 'column_title' ): ?>

    <?php if( get_sub_field('title') ): ?>
    <div class="row extended-content">
      <h2 class="col-xs-12"><?php the_sub_field('title'); ?></h2>
    </div>
    <?php endif; ?>

    <?php endif; ?>

    <?php if( get_row_layout() == 'columns' ): ?>

    <div class="row columns extended-content">
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_1'); ?></div>
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_2'); ?></div>
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_3'); ?></div>
    </div>

    <?php endif; ?>
  <?php endwhile; ?>
  </div>
<?php endif; ?>
</div>

<?php elseif( is_page('book-with-us') ) : ?>
<?php
  $file = get_field('single_image');
?>
<div class="container-fluid">
  <div class="row">
    <div class="background-image" style="background: url('<?php echo $file['url'] ?>') center center">
      <div class="container">
        <?php
        // check if the flexible content field has rows of data 
        if( have_rows('main_content') ): ?>

          <!-- loop through the rows of data -->
          <?php while ( have_rows('main_content') ) : the_row();
            
            if( get_row_layout() == 'text' ): ?>
            
            <div class="row main-content">
              
              <?php if( get_sub_field('title') ): ?>
              <h2 class="col-xs-12"><?php the_sub_field('title'); ?></h2>
              <?php endif; ?>
              <?php if( get_sub_field('body_text') ): ?>

              <div class="col-xs-12"><?php the_sub_field('body_text'); ?></div>

              <?php endif; ?>
            </div>

            <?php endif; ?>

            <?php if( get_row_layout() == 'column_title' ): ?>

            <?php if( get_sub_field('title') ): ?>
            <div class="row">
              <h2 class="col-xs-12"><?php the_sub_field('title'); ?></h2>
            </div>
            <?php endif; ?>

            <?php endif; ?>

            <?php if( get_row_layout() == 'columns' ): ?>

            <div class="row columns">
              <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_1'); ?></div>
              <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_2'); ?></div>
              <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_3'); ?></div>
            </div>

            <?php endif; ?>

          <?php endwhile; ?>
        <?php endif; ?>
     </div>
    </div> 
  </div>
</div>

<?php elseif( is_page('home') ) : ?>
<!--HOME-->
<?php
  get_template_part('templates/gallery-wide');
?>

<?php elseif( is_page('gallery') ) : ?>
<!--GALLERY-->
<div class="gallery-container">
<?php 
$images = get_field('gallery');
if( $images ): 
?>
  <div class="photoswipe grid">
  <?php foreach( $images as $image ): ?>
    <div class="grid-item grid-item--width2 grid-item--width3 grid-item--width4">
      <a data-size="<?php echo $image['width'].'x'.$image['height'] ?>" href="<?php echo $image['url']; ?>">
        <img src="<?php if($image['width'] > $image['height']){ echo $image['sizes']['gallery-lg-ls']; } else { echo $image['sizes']['gallery-lg-pt']; } ?>" alt="<?php echo $image['caption']; ?>" />
      </a>
    </div>
  <?php endforeach; ?>
  </div>
<?php endif; ?>   
</div>

<?php endif; ?>

