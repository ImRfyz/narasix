<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package narasix
 */

get_header();

?>

	<main id="primary" class="site-main">
    <div class="mx-auto mt-4 max-w-7xl px-4 sm:px-6 lg:px-20">
    
      <!-- Section content sidebar -->
      
      <div class="grid grid-cols-12 lg:space-x-8">

      <?php if ( true == get_theme_mod( 'narasix_single_sidebar', 'on' ) ) : ?>
          <!-- content sidebar -->
          <div class="col-span-12 justify-center lg:col-span-8 lg:h-auto">
            <!-- Content -->
            <?php
              while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'single' );

                the_post_navigation(
                  array(
                    'prev_text' => '<span class=""><span class="mr-2" aria-hidden="true">&larr;</span>' . esc_html__( 'Previous:', 'narasix' ),
                    'next_text' => '<span class="">' . esc_html__( 'Next:', 'narasix' ) . '<span class="ml-2" aria-hidden="true">&rarr;</span>',
                  )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;

              endwhile; // End of the loop.
            ?>
          </div>
          <!-- Sidebar -->
          <aside class="col-span-12 flex flex-col lg:col-span-4 mt-4 lg:mt-0 space-y-6">
            <?php get_sidebar(); ?>
          </aside>
          <!-- content no sidebar -->
        <?php else : ?>
          <div class="col-span-12 justify-center">
            <?php
            while ( have_posts() ) :
              the_post();

              get_template_part( 'template-parts/content', 'single-no-sidebar' );

              the_post_navigation(
                array(
                  'prev_text' => '<span class="nav-subtitle font-bold	text-slate-700 hover:text-[#BB0000] pl-8"><span class="mr-2" aria-hidden="true">&larr;</span>' . esc_html__( 'Previous:', 'narasix' ),
                  'next_text' => '<span class="nav-subtitle font-bold	text-slate-700 hover:text-[#BB0000] pr-8">' . esc_html__( 'Next:', 'narasix' ) . '<span class="ml-2" aria-hidden="true">&rarr;</span>',
                )
              );

              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;

            endwhile; // End of the loop.
            ?>
          </div>
        <?php endif; ?>
      </div>
      <!-- / Section content -->

    </div>
  </main><!-- #main -->


<?php
get_footer();
