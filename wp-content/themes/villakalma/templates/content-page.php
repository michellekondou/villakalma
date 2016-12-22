<?php if ( !is_page('gallery') ) : ?>
<?php if( is_page('location') ) : ?>
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
<?php if( !is_page('book-with-us') ) : ?>
<?php
  $file = get_field('single_image');
  if( $file ): 
?>
<div class="container-fluid">
  <div class="row">
     <figure class="main-image">
      <picture>
        <img src="<?php echo $file['url'] ?>" alt="<?php echo $file['caption'] ?>" />
      </picture>
    </figure>
  </div>
</div>
<?php endif; ?>

<div class="container">
<?php
//PROJECTS
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
//PROJECTS
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
<?php if(is_page('6')) : ?><!--about page-->
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
  if( $file ): 
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
<?php endif; ?>

<?php endif; ?>
<?php elseif( is_page('gallery') ) : ?>
 
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

