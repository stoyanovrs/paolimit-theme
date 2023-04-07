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

/**
 * Disable Emoji mess
 */
 
function disable_wp_emojicons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
    return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

/**
 * Remove query string from static resources 
 */
 
function remove_cssjs_ver( $src ) {
    if ( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

/**
 * Modify jQuery
 */

function modify_jquery() {
    wp_deregister_script( 'jquery' );
  
}
if (!is_admin()) add_action('wp_enqueue_scripts', 'modify_jquery');

//Disable the message - JQMIGRATE: Migrate is installed, version 1.4.1
add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});