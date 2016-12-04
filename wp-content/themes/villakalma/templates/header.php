<header class="banner">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?>
             <!--  <img alt="Brand" src="..."> -->
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
<!-- 
 <nav class="navBar">
  <nav class="wrapper">
    <div class="logo"></div>
    <input type="checkbox" id="menu-toggle">
      <label for="menu-toggle" class="label-toggle"></label>
    </input>
    <ul>
      <a href="#"><li>Lorem</li></a>
      <a href="#"><li>Ipsum</li></a>
      <a href="#"><li>Serum</li></a>
    </ul>
  </nav>
</nav> -->
</header>
