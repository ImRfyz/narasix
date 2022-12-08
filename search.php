<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package narasix
 */

get_header();

?>

	<main id="primary" class="site-main">

		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 mt-4">
			<div class="narasix-search-wrap flex-none md:flex lg:flex gap-9">
				<div class="w-full md:w-8/12 lg:w-8/12 mx-auto space-y-6">
					<?php if ( have_posts() ) : ?>
						<?php
						/* Start the Loop */
						while ( have_posts() ) : 
							the_post(); 
							?>

							<?php get_template_part( 'template-parts/content', 'search' ); ?>

						<?php endwhile; ?>

						<?php 
						the_posts_pagination( array(
							'prev_text' => __( 'Prev', 'narasix' ),
							'next_text' => __( 'Next', 'narasix' ),
						) ); 
						?>

					<?php else : ?>

						<?php 
						get_template_part( 'template-parts/content', 'none' ); 
						?>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
