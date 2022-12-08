<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package narasix
 */

	if ( ! is_active_sidebar( 'sidebar-1','sidebar-2' ) ) {
		?>
			<div id="secondary" class="widget-area">
				<section class="widget">
					<?php get_search_form(); ?>
				</section>
				<section class="widget">
					<h2 class="widget-title"><?php esc_html_e( 'Archives', 'narasix' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</section>
			</div>
		<?php
	}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #secondary -->
