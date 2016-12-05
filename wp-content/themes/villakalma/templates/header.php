<header class="banner">
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
              <img class="pull-sm-left" src="/wp-content/themes/villakalma/assets/images/2839C332.png" alt="<?php bloginfo('name'); ?>">
              <article class="pull-sm-left">
                <h1><img src="/wp-content/themes/villakalma/assets/images/BEE3C733.png" alt="<?php bloginfo('name'); ?>"></h1>
                <h2>Luxury Small Villa • Paros Island • Greece</h2>
              </article>
            </a>
          </div>
          <?php
            if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
            endif;
          ?>
        </div>
      </nav>
    </div>
  </div>
</header>
