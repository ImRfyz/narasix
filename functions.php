<?php
/**
 * narasix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package narasix
 */

if ( ! defined( 'NARASIX_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NARASIX_VERSION', '1.0.0' );
}

/**
 * Define Constants
 */
define( 'get_template_directory()', trailingslashit( get_template_directory() ) );

/**
 * Install Plugin
 */
require  get_template_directory() . '/inc/install-plugin.php';

/**
 * Tgm Activation
 */
require_once  get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Load Customizer
 */
require  get_template_directory() . '/inc/customizer.php';

/**
 * Load Search
 */
require get_template_directory() . '/inc/live-search.php';

/**
 * Load enqueue function
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Load enqueue function
 */
require get_template_directory() . '/inc/comments-helper.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load markup function
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load markup function
 */
require get_template_directory() . '/inc/markup.php';

/**
 * Walker menu.
 */
require get_template_directory() . '/inc/class-narasix-walker-menu.php';

/**
 * Functions and definitions.
 */
require get_template_directory() . '/inc/class-narasix-after-setup-theme.php';

/**
 * Load widget
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load breadcrumbs function
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load breadcrumbs function
 */
require get_template_directory() . '/inc/toc.php';

