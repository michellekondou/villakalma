<?php if ( !is_page('gallery') ) : ?>
<?php if( is_page('location') ) : ?>
  <?php
    get_template_part('templates/gmap');
  ?>
    <?php 
      $location = get_field('google_maps');
      if( !empty($location) ):
    ?>
 
      <div class="row">
        <div class="acf-map">
 
          <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
             
            <p class="address"><?php echo $location['address']; ?></p>
            
          </div>
 
        </div>
      </div>
    <?php endif; ?>
<?php endif; ?>

<?php

// check if the flexible content field has rows of data 
if( have_rows('image') ): ?>

  <!-- loop through the rows of data -->
  <?php while ( have_rows('image') ) : the_row();
    
    if( get_row_layout() == 'single_image' ): ?>
    
    <div class="row">
      <?php if( get_sub_field('image') ): 
        $file = get_sub_field('image');
      ?>

      <figure class="main-image">
        <picture>

          <img src="<?php echo $file['url'] ?>" alt="<?php echo $file['caption'] ?>" />
        </picture>
      </figure>
      <?php endif; ?>

    </div>

    <?php endif; ?>
 
  <?php endwhile; ?>
<?php endif; ?>
<div class="container">
<?php
//PROJECTS
// check if the flexible content field has rows of data 
if( have_rows('main_content') ): ?>

  <!-- loop through the rows of data -->
  <?php while ( have_rows('main_content') ) : the_row();
    
    if( get_row_layout() == 'text' ): ?>
    
    <div class="row">
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

    <div class="row">
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
<div class="collapse" id="collapseContent">
  <!-- loop through the rows of data -->
  <?php while ( have_rows('extended_content') ) : the_row();
    
    if( get_row_layout() == 'text' ): ?>

    <div class="row">
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

    <div class="row">
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_1'); ?></div>
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_2'); ?></div>
      <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_3'); ?></div>
    </div>

    <?php endif; ?>
  <?php endwhile; ?>
  </div>
<?php endif; ?>
</div>
 
<?php elseif( is_page('gallery') ) : ?>
 
<div class="gallery-container">
 
 <?php 

  $images = get_field('gallery');

  if( $images ): 

  ?>
 
      <div class="photoswipe grid">
      <?php foreach( $images as $image ): 
          $file_id = $image['id'];
          $file_url = $image['url'];
      ?>
      <div class="grid-item grid-item--width2 grid-item--width3 grid-item--width4">
      <?php if( $file_url ): ?>
      <a data-size="<?php echo $image['width'].'x'.$image['height'] ?>" href="<?php echo $file_url; ?>">
      <?php endif; ?>
        <img width="<?php echo $image['width']; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['caption']; ?>" />
      <?php if( $file_url ): ?>
      </a>
      <?php endif; ?>
      </div>
      <?php endforeach; ?>
      </div>
 
  <div class="clearfix"></div>
  <?php endif; ?>
   
</div>

<?php endif; ?>

