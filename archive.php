<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package narasix
 */

get_header();
?>
  <main id="primary">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 mt-4">
      <div class="grid grid-cols-12 lg:space-x-8">
        <!-- Section Post -->
        <div class="col-span-12 space-y-6 justify-center lg:col-span-8 lg:h-auto">

        <?php if ( have_posts() ) : ?>

          <?php
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
        <aside class="col-span-12 flex flex-col lg:col-span-4 mt-4 lg:mt-0 space-y-6">
          <?php get_sidebar(); ?>
        </aside>
      </div>
    </div>
	</main><!-- #main -->
<?php
get_footer();
