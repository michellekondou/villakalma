<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_enqueue_script('sage/modernizr', Assets\asset_path('scripts/modernizr-custom.js'), [], null, false);

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js?123'), ['jquery'], null, true);


}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/**
 * Image sizes
 */
add_image_size( 'gallery-lg-ls', 548, 411, array( 'center', 'center' ) ); // (cropped)
add_image_size( 'gallery-lg-pt', 548, 730, array( 'center', 'center' ) ); // (cropped)
add_image_size( 'gallery-ipad-pt', 768, 573, array( 'center', 'center' ) ); // (cropped)
add_image_size( 'gallery-wide-xxl', 1920, 741, array( 'center', 'center' ) ); // (cropped)
add_image_size( 'gallery-wide-xl', 1662, 642, array( 'center', 'center' ) ); // (cropped)
add_image_size( 'gallery-wide-l', 1141, 440, array( 'center', 'center' ) ); // (cropped)


function custom_thumb_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'gallery-lg-ls' => __( 'Gallery Large Landscape' ),
        'gallery-lg-pt' => __( 'Gallery Large Portrait' ),
        'gallery-ipad-pt' => __( 'Gallery iPad Portrait' ),
        'gallery-wide-xxl' => __( 'Gallery Wide XXL' ),
        'gallery-wide-xl' => __( 'Gallery Wide XL' ),
        'gallery-wide-l' => __( 'Gallery Wide L' )
    ) );
}
add_filter( 'image_size_names_choose', __NAMESPACE__ . '\\custom_thumb_sizes' );





