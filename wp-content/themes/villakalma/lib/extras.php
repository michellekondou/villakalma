<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Theme Shortcodes
 */

/**
 * Shortcodes: three col snippet
 */
function one_column_shortcode($atts, $content = null) {
   return '<div class="col-xs-4">' .  $content . '</div>';
}
function caption_shortcode( $atts, $content = null ) {
  return '<span class="caption">' . $content . '</span>';
}

function register_shortcodes(){
   add_shortcode('one-third', __NAMESPACE__ . '\\one_column_shortcode');
   add_shortcode( 'caption', __NAMESPACE__ . '\\caption_shortcode' );
}
 
add_action( 'init', __NAMESPACE__ . '\\register_shortcodes');


function my_acf_init() {
  
  acf_update_setting('google_api_key', 'AIzaSyA_qXHfrU7dT-k5es8MLSk9xyc0PnSfVbU');
}

add_action('acf/init', __NAMESPACE__ . '\\my_acf_init');




