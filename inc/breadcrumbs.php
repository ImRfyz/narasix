<?php
/**
 * Breadcrumbs
 */
if ( ! function_exists( 'narasix_breadcrumbs' ) ) {
	/**
	 * Breadcrumbs
	 *
	 * @since 1.0.0
	 */
	function narasix_breadcrumbs() {
			 if ( true == get_theme_mod( 'narasix_breadcrumb', 'on' ) ) : ?>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 mt-4 hds">
            <div class="bg-charcoal-200/80 dark:bg-charcoal-700/70 mb-6 backdrop-blur text-center py-4 rounded-lg space-y-2">
                <?php 
                  $home_link = '<i class="fa-solid fa-house mr-1 text-[15px]"></i><a href="' . esc_url( home_url() ) . '" rel="nofollow">' . esc_html( 'Home', 'narasix' ) . '</a>';
                    if ( is_home() ) {
                      echo '<h1 class="m-0 text-4xl md:text-6xl lg:text-6xl">' . esc_html( 'Blog', 'narasix' ) . '</h1>';
                    } else {

                      if ( is_archive() ) {
                                      
                        if ( is_category() ) {
      
                          echo '<h1 class="font-bold">' . esc_html( 'Category', 'narasix' ) . '</h1>';
                          echo $home_link;
                          echo '<i class="mx-2">/</i>';
                          $category = get_the_category();
                          echo '<span class="capitalize">' . $category[0]->cat_name . '</span>';
                          
                        }
                        if (  is_tag() ) {
                          
                          echo '<h1 class="font-bold">' . esc_html( 'Tags', 'narasix' ) . '</h1>';
                          echo $home_link;
                          echo '<i class="mx-2">/</i>';
                          $tag = get_the_tags();
                          echo '<span class="capitalize">' . $tag[0]->name . '</span>';
                          
                        }
                        if ( is_author() ) {
                          $tag = get_the_tags();
                          echo '<h1 class="font-bold">' . get_the_author() . '</h1>';
                        }
                      }
    
                      if( is_page() ) {
                        the_title( '<h1 class="font-bold">', '</h1>' );
                      } 
                      if ( is_search() ) {
                        echo '<h1 class="font-bold"> Search Results</h1>';
                      }

                    }
                    
                    
                  ?>
              <p class="text-[13px] dark:text-gray-400">
                <?php echo category_description(3); ?>
              </p>
            </div>
          </div>
        <?php endif; ?>
			<?php
	}
}
