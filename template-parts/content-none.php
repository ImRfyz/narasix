<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package narasix
 */

?>

<section class="no-results not-found -mt-6 pb-16 px-1 md:px-12 lg:px-12">

	<header class="page-header pb-3">
		<h1 class="page-title text-3xl mb-3">
			<?php esc_html_e( 'Search Results for:', 'narasix' ); ?>
			<span><?php echo get_search_query(); ?></span>
		</h1>
		<p class="text-lg mb-0 text-[#464646] font-light"><?php esc_html_e( 'Showing 0 results for your search', 'narasix' ) ?></p>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'narasix' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			get_search_form();
			?>
				<p class="pt-10 mx-auto text-[#3a3a3a] text-xl font-bold w-full	md:w-3/4 lg:w-1/2"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'narasix' ); ?></p>
			<?php
			

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'narasix' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
