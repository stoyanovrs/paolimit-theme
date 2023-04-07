<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Paolimit Theme
 * @since 1.0.0
 */


if ( ! function_exists( 'paolimit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook.
 */
function paolimit_setup() {
	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Enqueue editor styles.
	add_editor_style( 'editor-style.css' );
}
endif; // paolimit_setup
add_action( 'after_setup_theme', 'paolimit_setup' );

// Custom functions

// Filters.
require_once get_theme_file_path( 'assets/inc/addons.php' );
