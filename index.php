<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package narasix
 */

get_header();
$narasix_title = get_theme_mod( 'narasix_title_option_section_three', 'Recently' );
?>

	<main id="primary">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 mt-4">


      <?php
        if(is_front_page()){
          echo narasix_post_featured();
          echo narasix_post_top_stories();
          echo narasix_post_most_popular();
        }
      ?>
    
      <div class="relative grid grid-cols-12 mx-auto lg:space-x-4 pt-8">  
        <!-- Section Post -->
        <div class="flex flex-col space-y-5 col-span-12 lg:col-span-8 lg:h-auto">
          <div class="flex items-center justify-between">
            <h2 class="border-l-8 pl-3 text-[20px] font-bold uppercase">
              <?php echo $narasix_title ?>
            </h2>
          </div>
          <!-- all posts -->
          <?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<div>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
              </div>
							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							?>
								<div>
								
									<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

								</div>
							<?php
							

						endwhile;

						the_posts_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;

            /* Restore original Post Data 
            * NB: Because we are using new WP_Query we aren't stomping on the 
            * original $wp_query and it does not need to be reset.
            */
            wp_reset_postdata();

						?>
          
        </div>
        <!-- Sidebar -->
        <aside class="col-span-12 mt-6 lg:mt-0 flex flex-col lg:col-span-4">
          <?php get_sidebar(); ?>
        </aside>
      </div>
    </div>
	</main><!-- #main -->

<?php
get_footer();