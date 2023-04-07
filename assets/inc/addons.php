<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Paolimit Theme
 * @since 1.0.0
 */

add_action(
  'wp_enqueue_scripts',
  function () {
    wp_dequeue_style('wp-block-library'); // Wordpress block libaray styles
    wp_dequeue_style('global-styles');// Wordpress global styles generated from theme.json
  }
);

/**
 * Remove oEmbed-specific JavaScript from the front-end and back-end.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_oembed_add_host_js/
 */
remove_action( 'wp_head', 'wp_oembed_add_host_js' );