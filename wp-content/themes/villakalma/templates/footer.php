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
          <div class="col-xs-12 col-sm-4">
            <?php the_sub_field('column_2'); ?>
            <a href="http://facebook.com" class="social-links">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"><path fill-rule="evenodd" clip-rule="evenodd" fill="#575757" d="M15.408 24h-4.976V12.52H7.746V8.681h2.678v-.337c.018-1.078-.017-2.159.064-3.231.175-2.312 1.498-3.713 3.805-3.974 1.186-.134 2.39-.099 3.586-.132.438-.012.876-.002 1.333-.002V4.84c-.681 0-1.357-.01-2.032.005a5.246 5.246 0 0 0-.919.103c-.481.098-.78.406-.82.902-.038.466-.035.937-.042 1.405-.007.458-.002.917-.002 1.409h3.836l-.455 3.84h-3.37V24z"/></svg>
            </a>
            <a href="http://instagram.com" class="social-links">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"><path fill-rule="evenodd" clip-rule="evenodd" fill="#575757" d="M1.004 12.518H5.81c.086 2.101.886 3.852 2.521 5.185 1.264 1.029 2.732 1.506 4.355 1.471 3.56-.077 6.476-2.908 6.572-6.651h4.718c.007.078.021.163.021.248.002 2.745.008 5.488-.001 8.233-.005 1.475-.903 2.638-2.249 2.93-.231.05-.475.063-.713.063-5.646.003-11.295.004-16.943.001-1.807-.001-3.085-1.285-3.086-3.095V12.88l-.001-.362zm0-1.947v-.389c0-2.045.034-4.092-.01-6.137C.954 2.205 2.394.995 4.043 1c5.12.015 10.238.005 15.357.005.579 0 1.158-.005 1.736.001 1.658.02 2.838 1.159 2.856 2.818.024 2.185.006 4.37.005 6.556 0 .058-.011.116-.019.188-.102.007-.188.018-.275.018-1.486.001-2.973-.004-4.46.006-.221.001-.304-.077-.371-.278-.921-2.736-3.484-4.551-6.411-4.549-2.794.001-5.369 1.86-6.265 4.538-.074.22-.167.29-.395.288-1.496-.01-2.993-.005-4.49-.006-.087.001-.175-.007-.307-.014zm21.079-5.735V3.819l-.001-.06c-.018-.538-.301-.829-.84-.836a90.81 90.81 0 0 0-2.152 0c-.539.006-.83.298-.836.838a85.844 85.844 0 0 0 0 2.153c.007.538.299.83.838.836.718.009 1.436.009 2.153 0 .538-.007.824-.299.836-.838.008-.358.001-.717.002-1.076z"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#575757" d="M12.499 7.677c2.646.008 4.774 2.162 4.764 4.821-.01 2.622-2.173 4.764-4.803 4.759-2.642-.006-4.785-2.165-4.778-4.813a4.784 4.784 0 0 1 4.817-4.767z"/></svg>
            </a>
          </div>
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
        Villa Kalma <?php echo current_time('Y'); ?> 
        </article>
        <article class="col-xs-12 col-sm-6">
        Website designed by <a href="http://www.lambandlamp.com">Lamb and Lamp</a> <span class="hidden-sm-down">•</span><span class="hidden-sm-up"><br></span> Developed by <a href="http://michellekondou.me">Michelle Kondou</a>
        </article>
      </div>
    </div>
  </div>
</footer>
