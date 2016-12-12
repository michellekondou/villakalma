<footer class="content-info">
  <div class="container info">
    <?php 
      $args = array(
        'page_id' => 90 //footer
      );
      $query = new WP_Query( $args );
    ?>
    <?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php
    // check if the flexible content field has rows of data 
    if( have_rows('footer') ): ?>

      <!-- loop through the rows of data -->
      <?php while ( have_rows('footer') ) : the_row();
        
        if( get_row_layout() == 'columns' ): ?>

        <div class="row">
          <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_1'); ?></div>
          <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_2'); ?></div>
          <div class="col-xs-12 col-sm-4"><?php the_sub_field('column_3'); ?></div>
        </div>

        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <div class="credits">
    <div class="container">
      <div class="row">
        <article class="col-xs-12 col-sm-6">
        Villa Kalma Santa Maria <?php echo get_the_time('Y', $post ); ?> 
        
        </article>
        <article class="col-xs-12 col-sm-6">
        Website designed by <a href="http://www.lambandlamp.com">Lamb and Lamp</a> <span class="hidden-sm-down">•</span><span class="hidden-sm-up"><br></span> Developed by <a href="http://michellekondou.me">Michelle Kondou</a>
        </article>
      </div>
    </div>
  </div>
</footer>
