<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package narasix
 */

	$narasix_author_meta   = get_theme_mod( 'narasix_signle_blog_post_author', true );
	$narasix_comment_meta  = get_theme_mod( 'narasix_single_blog_post_comment', false );
	$narasix_publish_date  = get_theme_mod( 'narasix_single_blog_post_publish_date', true );
	$narasix_post_category = get_theme_mod( 'narasix_single_blog_post_category', false );
	$narasix_blog_post_tag = get_theme_mod( 'narasix_single_blog_post_tag', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'wysiwyg wysiwyg-slate max-w-full space-y-8 dark:wysiwyg-invert' ); ?>>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="relative not-wysiwyg img-h-thumbnail w-full overflow-hidden rounded-lg group">
				<?php narasix_post_thumbnail(); ?>

        <?php if ( ! empty( $narasix_post_category ) ) { ?>
          <li class="post-category">
            <?php

              $categories = get_the_category();
              if ( is_array( $categories) || is_object( $categories )) {
                foreach ( $categories as $category ) {
                  $category_link = get_category_link( $category->term_id );
                  echo '<span class="text-charcoal-100 absolute hidden sm:block top-0 ml-3 mt-3 rounded-full bg-sky-700 px-3 pb-0.5 text-[13px] transition-all duration-300 group-hover:scale-95"><a href="' . esc_url( $category_link ) . '">' . esc_html( $category->cat_name ) . '</a></span>';
                }
              }

            ?>
          </li>
        <?php } ?>
			</div>
		<?php endif; ?>

  <!-- Title content -->
  <div class="not-wysiwyg">
    <div class="space-y-4 border-b border-dashed pb-6">

			<?php if ( get_the_title() ) : ?>
        <h1 class="font-semibold break-all"><?php the_title(); ?></h1>
      <?php endif; ?>
			<?php if ( is_sticky() ) echo '<span class="sr-only">' . __( 'Sticky post', 'narasix' ) . '</span>'; ?>

      <div class="flex items-center justify-between">
        <ul class="flex space-x-3 items-center">
          <?php if ( ! empty( $narasix_author_meta ) ) { ?> 
            <li class="inline-flex items-center space-x-2">
              <a class="text-sm font-medium text-slate-800/70 dark:text-slate-100 hover:text-slate-800 dark:hover:text-slate-100/70" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
              <i class="icon-user text-[15px]"></i>
                  <span class="text-slate-800/30 dark:text-slate-100/30 hover:text-slate-800 dark:hover:text-slate-100/70">
                    <?php 
                        global $current_user; wp_get_current_user();
                        echo esc_html( get_the_author() ); 
                    
                    ?>
                  </span>
              </a>
            </li>
          <?php } ?>

          <?php if ( ! empty( $narasix_publish_date ) ) { ?>
            <li class="inline-flex items-center space-x-2 text-sm font-medium text-slate-800/70 dark:text-slate-100 hover:text-slate-800 dark:hover:text-slate-100/70">
              <i class="icon-clock2 text-[15px]"></i>
              <span class="text-slate-800/30 dark:text-slate-100/30 hover:text-slate-800 dark:hover:text-slate-100/70">
                <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
              </span>
            </li>
          <?php } ?>

          <?php if ( ! empty( $narasix_comment_meta ) ) { ?>
            <?php if ( comments_open() ) : ?>
              <li class="inline-flex items-center space-x-2 text-sm font-medium text-slate-800/70 dark:text-slate-100 hover:text-slate-800 dark:hover:text-slate-100/70">
                <i class="icon-bubble text-[15px]"></i>
                  <span class="text-slate-800/30 dark:text-slate-100/30 hover:text-slate-800 dark:hover:text-slate-100/70">
                    <?php comments_popup_link( '0', '1', '%', 'post-comments' ); ?>
                  </span>
              </li>
            <?php endif; ?>
          
          <?php } ?>

        </ul>
          <?php echo social_share_links(); ?>
        <!-- <p class="flex-shrink-0 text-[13px] md:mt-0">4 min read</p> -->
      </div>
    </div>
  </div>
	
	<div class="mt-4">
    <!-- content -->
		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'narasix' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

		?>

    <!-- Tag Content -->
    <?php if ( ! empty( $narasix_blog_post_tag ) ) { ?> 
			<?php 
				$post_tags = get_the_tags();
				if ( is_array( $post_tags ) || is_object( $post_tags ) ) : ?>
        <div class="clear-both not-wysiwyg space-x-2 border-y border-dashed py-6 dark:border-charcoal-700">
          <ul class="flex flex-wrap items-center ">
            <span class="text-base font-bold mr-2"><?php esc_html_e( 'Tags:', 'narasix' ); ?></span>
            <?php
              foreach( $post_tags as $post_tag ) : ?>
              <li class="inline-flex items-center">
                <a href="<?php echo esc_url( get_tag_link( $post_tag->term_id ) ); ?>" class="text-[13px] px-3 dark:bg-yellow-700 bg-white rounded-lg" rel="noopener noreferrer">#<?php echo esc_html( $post_tag->name ); ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif;?>
		<?php } ?>
  </div>

</article><!-- #post-<?php the_ID(); ?> -->