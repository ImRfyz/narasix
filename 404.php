<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package narasix
 */

get_header();
?>
	<style>
		.hds {
			display: none;
		}
	</style>
	<main id="primary" class="site-main container">

		<section class="error-404 not-found my-24 px-8 md:px-10 lg:px-16 text-center">

			<header class="page-header">
				<h1 class="page-title text-7xl md:text-7xl lg:text-9xl font-black pb-16 font-bold text-[#fa2626]"><?php esc_html_e( '404', 'narasix' ); ?></h1>
				<h4 class="page-title text-2xl md:text-4xl lg:text-4xl pb-4 font-bold mb-2 text-slate-800"><?php esc_html_e( 'Oops!Page Not Found', 'narasix' ); ?></h4>
				<p class="font-medium text-[#404040] text-lg leading-7 pb-2"><?php esc_html_e( 'It looks like nothing was found at this location.', 'narasix' ); ?></p>
			</header><!-- .page-header -->
			
			<a class="inline-block mt-2.5 text-sm font-semibold bg-charcoal-700 text-white p-3 px-4 rounded" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return Home Page', 'narasix' ); ?></a>

		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
