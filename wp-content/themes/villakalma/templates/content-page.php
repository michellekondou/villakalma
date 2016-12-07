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
<?php endif; ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
