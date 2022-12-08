<?php /* Template Name: Blank Template */ ?>

<?php get_header(); ?>
	<main id="primary">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 mt-4">
			<div class="w-full">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
				?>
			</div>
		</div>

	</main><!-- #main -->
<?php get_footer(); ?>