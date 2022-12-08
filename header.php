<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package narasix
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-charcoal-50 dark:bg-charcoal-800 text-charcoal-900 dark:text-charcoal-100 antialiased' ); ?>>
<?php wp_body_open(); ?>
<div id="page">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'narasix' ); ?></a>

	<?php 
		/**
		 * @hook narasix_header_action
		*/
		do_action( 'narasix_header_action' );

		/**
		 * Breadcrumbs
		 *
		 * @since 1.0.0
		 */
		if ( ! is_front_page() ) {
			narasix_breadcrumbs();
		}
		
	?>
	