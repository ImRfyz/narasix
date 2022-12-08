<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package narasix
 */

?>
<div id="post-<?php the_ID(); ?>" class="flex w-full flex-wrap group post-461 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
  <div class="relative w-[25%] overflow-hidden rounded-lg shadow-md sm:w-[40%]">
    <?php 
      /**
       * @func narasix_feature_category
      */
      narasix_feature_image();
      do_action( 'narasix_posts_category' ); 
    ?>
  </div>
  <!-- .Featured img -->
  <div class="flex w-[75%] flex-wrap items-center px-4 sm:w-[60%] sm:px-5">
    <?php the_title( sprintf( '<h3 class="text-limit-2 font-bold" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <!-- .Title card -->
    <?php 
        /**
         * @func narasix_post_content
        */
        narasix_post_content();
    ?> <!-- .Post conten card -->
    <!-- .Post conten card -->
    <div class="flex w-full flex-wrap items-center justify-between text-xs dark:text-gray-400">
      <div class="flex space-x-3 items-center">
        <?php 
            /**
                * @func post_author
                * @func narasix_post_date
                * @func narasix_post_comment
                * @func narasix_post_category
            */
            do_action( 'narasix_post_meta' );
        ?>	
      </div>
    </div>
  </div>
</div><!-- #post-<?php the_ID(); ?> -->
