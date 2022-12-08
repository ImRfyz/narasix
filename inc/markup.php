<?php 

    /**
     * Post content featured.
    */
    if ( ! function_exists( 'narasix_post_featured' ) ) {
      /**
       * Featured
       *
       * @since 1.0.0
       */
      function narasix_post_featured() {
        if ( true == get_theme_mod( 'narasix_post_featured', 'off' ) ) : ?>
            <div class="grid grid-cols-12 mx-auto space-x-6">
                <div class="flex flex-col col-span-12 lg:col-span-8 lg:h-auto">
                  <?php 
                    // Query Arguments
                    $featured_1 = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'posts_per_page' => 1,
                      'post__in' => get_option( 'sticky_posts' ),
	                    'ignore_sticky_posts' => true,
                      'order' => 'DESC',
                      'orderby' => 'date',
                    );

                    // The Query
                    $querys = new WP_Query( $featured_1 );

                    // The Loop
                    if ( $querys->have_posts() ) {
                      while ( $querys->have_posts() ) {
                          $querys->the_post();
                          ?>
                            <div class="flex flex-col col-span-12 lg:col-span-8 lg:h-auto">
                              <div class="group relative overflow-hidden rounded-xl">
                                <div class="pt-30 absolute inset-x-0 -bottom-2 z-10 flex items-end rounded-xl bg-gradient-to-t from-black/80 to-transparent text-white opacity-0 transition duration-300 ease-in-out group-hover:opacity-100">
                                  <div>
                                    <div class="translate-y-4 transform space-y-3 p-4 pb-10 featured-title-hover text-xl transition duration-[800ms] ease-in-out group-hover:translate-y-0">
                                      <div class="inline-flex items-center py-2 space-x-2 text-[13px]">
                                      <?php
                                        $category = get_the_category();
                                        $category_link = get_category_link( $category[0]->term_id );  
                                        echo '<span class="bg-sky-700 text-[13px] px-2 pb-0.5 font-base rounded-xl transition-all hover:scale-95 duration-300">
                                                <a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a>
                                              </span>'
                                        ?>
                                        <span class="bg-charcoal-700 px-2 pb-0.5 text-[13px] font-base rounded-xl transition-all hover:scale-95 duration-300">
                                          <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
                                        </span>
                                      </div>
                                      <!-- Featured Title -->
                                      <?php if ( get_the_title() ) : ?>
                                        <h1 class="lg:text-3xl xl:text-4xl font-bold my-4">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                        </h1>
                                      <?php endif; ?>
                                      <!-- Featured Desciption -->
                                      <?php 
                                          /**
                                           * @func narasix_post_content
                                          */
                                          narasix_post_content();
                                      ?> <!-- .Post conten card -->
                                      <!-- Featured Red more -->
                                      <a href="<?php the_permalink(); ?>" class="inline-flex hover:pl-2 items-center py-2 space-x-2 text-[13px]">
                                        <span>Read more</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                          <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <!-- Featured image -->
                                <?php if ( has_post_thumbnail() ) {
                                  narasix_featured_thumbnail();
                                } ?>
                              </div>
                            </div>
                          <?php
                      }
                    } 
                  ?>
                </div>
                <div class="flex flex-col pr-5 col-span-12 divide-y lg:col-span-4 dark:divide-charcoal-700">
                  <?php 
                    // Query Arguments
                    $featured_2 = array(
                      'posts_per_page' => 2,
                      'offset' => 1,
                      'post__in' => get_option( 'sticky_posts' ),
	                    'ignore_sticky_posts' => true,
                      'order' => 'DESC',
                      'orderby' => 'date',
                    );

                    // The Query
                    $query = new WP_Query( $featured_2 );
                    
                    // The Loop 
                    if ( $query->have_posts() ) {
                      while ( $query->have_posts() ) {
                          $query->the_post();
                          ?>
                            <div class="pt-6 lg:pt-0 pb-4 space-y-2 hover">
                              <div class="inline-flex items-center py-2 space-x-2 text-[13px] text-charcoal-100">
                            
                              <?php
                                $category = get_the_category();
                                $category_link = get_category_link( $category[0]->term_id );  
                                echo '<span class="bg-sky-700 px-2 pb-0.5 text-[13px] font-base rounded-xl transition-all hover:scale-95 duration-300">
                                        <a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a>
                                      </span>'
                              ?>

                                <span class="bg-charcoal-700/50 px-2 pb-0.5 text-[13px] font-base rounded-xl transition-all hover:scale-95 duration-300">
                                  <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
                                </span>
                              </div>
                              <?php if ( get_the_title() ) : ?>
                                <h1 class="lg:text-2xl font-bold text-limit-2">
                                  <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h1>
                              <?php endif; ?>
                              
                              <?php 
                                  /**
                                   * @func narasix_post_content
                                  */
                                  narasix_post_content();
                              ?> <!-- .Post conten card -->

                              <a href="<?php the_permalink(); ?>" class="inline-flex hover:pl-2 items-center py-2 space-x-2 text-[13px]">
                                <span>Read more</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                              </a>
                            </div>
                          <?php
                      }
                    } 
                  ?>
                </div>
            </div>
        <?php endif;
      }
    }

    /**
     * Post content TOP STORIES.
    */
    if ( ! function_exists( 'narasix_post_top_stories' ) ) {
      /**
       * Post TOP STORIES.
       */
      function narasix_post_top_stories() {
        $post_limit = get_theme_mod( 'narasix_top_stories_show_post_limit', '6' );
        $post_orderby = get_theme_mod( 'narasix_top_stories_show_post_orderby', 'date' );
        $post_order = get_theme_mod( 'narasix_top_stories_show_post_order', 'DESC' );
        $post_title = get_theme_mod( 'narasix_title_option_section_one', 'Top Stories' );
        
        if ( true == get_theme_mod( 'narasix_post_top_stories', 'off' ) ) : ?>
            <div class="relative">
                <!-- item title-->
                <div class="flex items-center justify-between my-8">
                  <h2 class="border-l-8 pl-3 text-[20px] font-bold uppercase">
                    <?php echo $post_title ?>
                  </h2>
                </div>
                <!-- Start carousel -->
                  <div class="carousel js-flickity" data-flickity='{"contain": true, "freeScroll": true}'>
                      <?php
                        // Query Arguments
                        $top_stories = array(
                          'post_type' => 'post',
                          'post_status' => 'publish',
                          'posts_per_page' => $post_limit,
                          'post__not_in' => get_option( 'sticky_posts' ),
                          'order' => $post_order,
                          'orderby' => $post_orderby,
                        );

                        // The Query
                        $query = new WP_Query( $top_stories );

                        // The Loop
                        if ( $query->have_posts() ) {
                          while ( $query->have_posts() ) {
                              $query->the_post();
                              ?>
                                <div class="carousel-cell group">
                                  <div class="relative overflow-hidden w-full rounded-lg shadow-lg img-h">
                                  <?php narasix_feature_image() ?>
                                  </div>
                                  <?php
                                    $category = get_the_category();
                                    $category_link = get_category_link( $category[0]->term_id );  
                                    echo '<span class="bg-sky-700 text-charcoal-100 absolute top-0 ml-3 mt-3 rounded-full px-3 pb-0.5 text-[13px] transition-all group-hover:scale-95 duration-300">
                                            <a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a>
                                          </span>'
                                  ?>
                                  <div class="flex justify-between px-1 hover">
                                    <?php if ( get_the_title() ) : ?>
                                    <h3 class="text-limit-2 mt-3 font-semibold">
                                      <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                    </h3>
                                    <?php endif; ?>
                                  </div>
                                </div>
                              <?php
                            }
                          } 
                      ?>
                  </div>
            </div>
        <?php endif;  
      }
    }

    /**
     * Post content Most Popular.
    */
    if ( ! function_exists( 'narasix_post_most_popular' ) ) {
      /**
       * Post Most Popular.
       */
      function narasix_post_most_popular() {
        $post_order = get_theme_mod( 'narasix_most_popular_show_post_order', 'DESC' );
        $post_orderby = get_theme_mod( 'narasix_most_popular_show_post_orderby', 'date' );
        $post_limit = get_theme_mod( 'narasix_most_popular_show_post_limit', '6' );
        $post_title = get_theme_mod( 'narasix_title_option_section_two', 'Most Popular' );

        if ( true == get_theme_mod( 'narasix_post_most_popular', 'off' ) ) : ?>
            <div class="relative">
                <!-- item title-->
                <div class="my-8">
                  <h2 class="border-l-8 pl-3 text-[20px] font-bold uppercase">
                  <?php echo $post_title ?>
                  </h2>
                </div>
                  <?php
                    // Query Arguments
                    $popularsingle = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'posts_per_page' => 1,
                      'post__not_in' => get_option( 'sticky_posts' ),
	                    'ignore_sticky_posts' => false,
                      'order' => $post_order,
                      'orderby' => $post_order,
                    );

                    // The Query
                    $querys = new WP_Query( $popularsingle );

                    // The Loop
                    if ( $querys->have_posts() ) {
                      while ( $querys->have_posts() ) {
                          $querys->the_post();
                          ?>
                            <div class="mx-auto mb-6 flex flex-col lg:flex-row group">
                              <div class="w-full flex flex-col rounded-lg md:flex-row">
                                <div class="relative w-full overflow-hidden rounded-lg shadow-lg">
                                <?php if ( has_post_thumbnail() ) {
                                  narasix_mostPopular_thumbnail();
                                } ?>
                                </div>
                                <!-- content -->
                                <div class="flex w-full flex-col justify-between py-2 px-6 hover">
                                  <div class="flex space-x-2">
                                    <?php
                                    $category = get_the_category();
                                    $category_link = get_category_link( $category[0]->term_id );  
                                    echo ' <span class="text-charcoal-100 text-[13px] mt-4 lg:mt-0 self-start rounded-full bg-sky-700 px-4 pb-0.5 transition-all hover:scale-95 duration-300">
                                            <a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a>
                                          </span>'
                                    ?>
                                  </div>
                                  <?php if ( get_the_title() ) : ?>
                                  <h2 class="mt-2 text-2xl font-semibold leading-tight lg:text-3xl">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                  </h2>
                                  <?php endif; ?>
                                  <?php 
                                      /**
                                        * @func narasix_post_content
                                      */
                                      narasix_post_content();
                                  ?> <!-- .Post conten card -->
                                  <div class="mt-4">
                                    <span class="text-xs opacity-50">
                                      <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                      }
                    } 
                  ?>
                <div class="carousel js-flickity" data-flickity='{"contain": true, "freeScroll": true}'>
                  <?php 

                    
                    // Query Arguments
                    $popular = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'posts_per_page' => $post_limit,
                      'offset' => 1,
                      'post__not_in' => get_option( 'sticky_posts' ),
	                    'ignore_sticky_posts' => false,
                      'order' => $post_order,
                      'orderby' => $post_orderby,
                    );

                    // The Query
                    $query = new WP_Query( $popular );
                    
                    // The Loop 
                    if ( $query->have_posts() ) {
                      while ( $query->have_posts() ) {
                          $query->the_post();
                          ?>
                            <div class="carousel-cell hover group">
                              <div class="relative overflow-hidden w-full rounded-lg shadow-lg img-h">
                                <?php narasix_feature_image() ?>
                              </div>
                              <?php
                                  $category = get_the_category();
                                  $category_link = get_category_link( $category[0]->term_id );  
                                  echo '<span class="bg-sky-700 text-charcoal-100 absolute top-0 ml-3 mt-3 rounded-full px-3 pb-0.5 text-[13px] transition-all group-hover:scale-95 duration-300">
                                          <a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a>
                                        </span>'
                              ?>
                              <div class="px-1 mt-2 space-y-4">
                                <div class="flex justify-between">
                                  <?php if ( get_the_title() ) : ?>
                                  <h3 class="text-limit-2 font-semibold">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                  </h3>
                                  <?php endif; ?>
                                </div>
                                  <span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
                              </div>
                            </div>
                          <?php
                      }
                    } 
                  ?>
                </div>
            </div>
        <?php endif;
      }
    }

    /**
     * Post content List.
    */
    if ( ! function_exists( 'narasix_blog_post' ) ) {

        /**
         * Post content.
         *
         * @since 1.0.0
         */
        function narasix_blog_post() {
            
          ?>
            
            <div class="relative w-[25%] overflow-hidden rounded-lg shadow-md sm:w-[40%]">
              <?php 
                /**
                 * @func narasix_feature_category
                */
                narasix_feature_image();
                do_action( 'narasix_posts_category' ); 
              ?>
            </div> <!-- .Featured img -->

            <div class="flex w-[75%] flex-wrap items-center px-4 sm:w-[60%] sm:px-5">
              <?php 
                  /**
                   * @func narasix_post_title
                  */
                  narasix_post_title();
                  
              ?> <!-- .Title card -->
              <?php 
                  /**
                   * @func narasix_post_content
                  */
                  narasix_post_content();
              ?> <!-- .Post conten card -->

              <div class="flex w-full flex-wrap items-center mt-2 justify-between text-xs dark:text-gray-400">
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
              
          <?php

        }
    }
    add_action( 'narasix_post_action', 'narasix_blog_post' );

    /**
     * Post content archive.
    */
    if ( ! function_exists( 'narasix_post_archive' ) ) {
      function narasix_post_archive() {
        ?>
        <div class="relative">
              <div class="group">
                <div class="relative w-full overflow-hidden rounded-lg shadow-lg">
                  <?php if ( has_post_thumbnail() ) {
                    narasix_archive_thumbnail();
                  } ?>
                  <?php
                  $category = get_the_category();
                  $category_link = get_category_link( $category[0]->term_id );  
                  echo '<span class="text-charcoal-100 absolute top-0 ml-3 mt-3 rounded-full bg-sky-700 px-3 py-0.5 text-[13px] transition-all duration-300 group-hover:scale-95">
                          <a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a>
                        </span>'
                  ?>
                </div>
                <div class="hover space-y-3 p-5">
                  <?php if ( get_the_title() ) : ?>
                    <h1 class="font-semibold">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h1>
                  <?php endif; ?>
                  <?php 
                      /**
                       * @func narasix_post_content
                      */
                      narasix_post_content();
                  ?> <!-- .Post conten card -->
                </div>
              </div>
              <div class="flex justify-between px-5">
                <span class="text-xs"> 
                <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
               </span>
                <button class="ml-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-charcoal-900 fill-charcoal-50 dark:stroke-charcoal-50 dark:fill-charcoal-900 h-6 w-6 stroke-1 active:scale-95" viewBox="0 0 24 24">
                    <path d="M 6 2 C 5.861875 2 5.7278809 2.0143848 5.5976562 2.0410156 C 4.686084 2.2274316 4 3.033125 4 4 L 4 22 L 12 19 L 20 22 L 20 4 C 20 3.8625 19.985742 3.7275391 19.958984 3.5976562 C 19.799199 2.8163086 19.183691 2.2008008 18.402344 2.0410156 C 18.272119 2.0143848 18.138125 2 18 2 L 6 2 z"></path>
                  </svg>
                </button>
              </div>
            </div>
        <?php
      }
    }

    /**
     * Post title
     */
    function narasix_post_title() {
      ?>
        <?php if ( get_the_title() ) : ?>
            <h3 class="text-limit-2 font-bold">
              <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h3>
        <?php endif; ?>
        <?php if ( is_sticky() ) echo '<span class="sr-only">' . __( 'Sticky post', 'narasix' ) . '</span>'; ?>
      <?php
    }

    /**
     * Post meta
     */
    function narasix_post_meta() {
        $narasix_comment = get_theme_mod( 'narasix_blog_post_comment', false );
        $narasix_author = get_theme_mod( 'narasix_blog_post_author', true );
        $narasix_publish_date = get_theme_mod( 'narasix_blog_post_publish_date', true );
        $narasix_postcategory = get_theme_mod( 'narasix_blog_post_category', false );
        
        /**
         * author
         */
        if ( ! empty( $narasix_author ) ) {
            post_author();
        }

        /**
         * post date
         */
        if ( ! empty( $narasix_publish_date ) ) {
            narasix_post_date();
        }

        /**
         * post comment
         */
        if ( ! empty( $narasix_comment ) ) {
            narasix_post_comment();
        }

        /**
         * post category
         */
        if ( ! empty( $narasix_postcategory ) ) {
            narasix_post_category();
        }
    }
    add_action( 'narasix_post_meta', 'narasix_post_meta' );

    /**
     * Post Image featured category
     */
    function narasix_posts_category() {
      $narasix_featurecategory = get_theme_mod( 'narasix_blog_post_category', false );

      /**
       * Image feature category
       */
      if ( ! empty( $narasix_featurecategory ) ) {
        narasix_feature_category();
      }
    }
    add_action( 'narasix_posts_category', 'narasix_posts_category' );

    /**
     * Image include category
     */
    function narasix_feature_category() {
      ?>
          <span class="hidden sm:block">
              <?php

                $category = get_the_category();
                $category_link = get_category_link( $category[0]->term_id );
                echo '<span class="text-charcoal-100 absolute hidden sm:block top-0 ml-3 mt-3 rounded-full bg-sky-700 px-3 pb-0.5 text-[13px] transition-all duration-300 group-hover:scale-95"><a href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a></span>';

              ?>
          </span>
      <?php
    }

    /**
     * Post author
     */
    function post_author() {
        ?>
          <span class="tooltip sm:!inline-flex sm:items-center sm:space-x-2">
            <i class="icon-user text-[15px] text-slate-800/50 dark:text-slate-100 hover:text-slate-800 dark:hover:text-slate-100/70"></i>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="text-sm hidden sm:inline-flex">
                <?php 
                  global $current_user; wp_get_current_user();
                  echo esc_html( get_the_author() );
                ?>
            </a>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="text-sm tooltiptext sm:hidden">
                <?php 
                  global $current_user; wp_get_current_user();
                  echo esc_html( get_the_author() );
                ?>
            </a>
          </span>
        <?php
    }

    /**
     * Post date
     */
    function narasix_post_date() {
        ?>
          <span class="tooltip sm:!inline-flex sm:items-center sm:space-x-2">
              <i class="icon-clock2 text-[15px] text-slate-800/50 dark:text-slate-100 hover:text-slate-800 dark:hover:text-slate-100/70"></i>
              <span class="hidden sm:inline-flex">
                <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
              </span>
              <span class="tooltiptext sm:hidden">
                <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
              </span>
          </span>
        <?php
    }

    /**
     * Post comment
     */
    function narasix_post_comment() {
        ?>
            <span class="tooltip  sm:!inline-flex sm:items-center sm:space-x-2">
                <i class="icon-bubble text-[15px] text-slate-800/50 dark:text-slate-100 hover:text-slate-800 dark:hover:text-slate-100/70"></i>
                <span class="hidden sm:inline-flex">
                  <?php 
                    if ( comments_open() ) {
                            comments_popup_link( '0', '1', '%', 'post-comments' );
                  } ?>
                </span>
                <span class="tooltiptext sm:hidden">
                  <?php 
                    if ( comments_open() ) {
                            comments_popup_link( '0', '1', '%', 'post-comments' );
                  } ?>
                </span>
            </span>
        <?php
    }

    /**
     * Post category
     */
    function narasix_post_category() {
        ?>
                <?php

                    $category = get_the_category();
                    $category_link = get_category_link( $category[0]->term_id );
                    echo '<span class="sm:hidden"><a class="font-bold text-sky-700" href="'. esc_url( $category_link ) .'">' . $category[0]->cat_name . '</a></span>';
                ?>
        <?php
    }

    /**
     * Post content
     */
    function narasix_post_content() {
        ?>
            
          <p class="text-limit-3 text-limit-hidden opacity-50"><?php echo excerpt(25); ?></p>
            
        <?php
    }

    /**
     * Post image
     */
    function narasix_feature_image() {
      if ( has_post_thumbnail() ) {
          narasix_post_thumbnail();
      }
    }

    /**
     * Theme header.
     */
    if ( ! function_exists( 'narasix_header' ) ) {
        /**
         * Theme header.
         *
         * @since 1.0.0
         */
        function narasix_header() {
          $narasix_header_sticky = get_theme_mod( 'narasix_header_sticky', 'off' );
          $narasix_header_icon_darkmode = get_theme_mod( 'narasix_header_icon_darkmode', true );
          $narasix_header_search = get_theme_mod( 'narasix_header_search', true );
          $narasix_header_button = get_theme_mod( 'narasix_header_button', true );
          $narasix_header_button_url = get_theme_mod( 'narasix_header_button_url', '#' );
          $narasix_header_button_text = get_theme_mod( 'narasix_header_button_text', 'Subscribe' );

            if ( 'off' == $narasix_header_sticky ) {
              $narasix_header_sticky = 'sticky';
            } else {
              $narasix_header_sticky = 'relative';
            }
            ?>
                <header class="top-0 z-50 <?php echo $narasix_header_sticky; ?>">
                    <div class="bg-charcoal-100/70 dark:bg-charcoal-900/70 text-charcoal-900 dark:text-charcoal-100 backdrop-blur shadow">
                      <div class="flex space-x-4 items-center mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 h-16">
                        <div class="flex flex-none justify-center mr-4">
                          <!-- Branding -->
                          <?php 
                              /**
                               * Site logo.
                               *
                               * @since 1.0.0
                               */
                              narasix_site_logo();
                            ?>
                        </div>
                        <!-- Menu desktop -->
                        <?php 
                          /**
                           * Header navigation.
                           *
                           * @since 1.0.0
                           */
                          narasix_navigation();
                        ?>
                        <!-- / Menu desktop -->
                        <div class="flex w-32 flex-auto space-x-6 items-center justify-end rounded-lg">
                          <!-- button dark mode -->
                          <?php if ( ! empty( $narasix_header_icon_darkmode ) ) { ?> 
                          <button onclick="toggleDarkMode()" class="active:scale-95 " aria-label="Darkmode Toggle Button">
                            <i id="icon" class="icon-brightness-contrast"></i>
                          </button>
                          <?php } ?>
                          <!-- button Search -->
                          <?php if ( ! empty( $narasix_header_search ) ) { ?> 
                          <button id="searchBtn" class="active:scale-95">
                            <i class="icon-search"></i>
                          </button>
                          <?php } ?>
                          <!-- button subscribe -->
                          <?php if ( ! empty( $narasix_header_button) ) { ?> 
                            <a class="bg-yellow-400 hidden lg:inline-block rounded-lg px-5 py-1 text-[13px] font-medium text-charcoal-900" href="<?php echo $narasix_header_button_url ?>"> <?php echo $narasix_header_button_text ?> </a>
                          <?php } ?>
                          <!-- button menu -->
                          <button class="ml-3 lg:hidden bg-yellow-500 py-[1px] px-[5px] rounded" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                            </svg>
                          </button><!-- .nav-toggle -->
                        </div>
                      </div>
                    </div>
                    <!-- Search Open -->
                    <div id="searchModal" class="modal bg-charcoal-900/20 fixed top-0 h-full w-full backdrop-blur">
                      <div class="flex h-screen items-end justify-center sm:items-center">
                        <div class="modal-content dark:divide-charcoal-800/40 bg-charcoal-100 dark:bg-charcoal-700 h-[30rem] w-full divide-y rounded-t-lg p-0 shadow-lg outline-0 sm:h-auto sm:w-[35rem] sm:rounded-lg">
                          <form id="searchform" action="/" method="get" autocomplete="off" class="searchform text-charcoal-800 dark:text-charcoal-100 flex h-10 items-center justify-start space-x-2 px-4 py-6">
                            <svg class="mt-1 block h-5 fill-black dark:fill-charcoal-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                              <path d="M13 3C7.4889971 3 3 7.4889971 3 13c0 5.511003 4.4889971 10 10 10C15.396508 23 17.597385 22.148986 19.322266 20.736328l5.970703 5.970703a1.0001 1.0001.0 101.414062-1.414062l-5.970703-5.970703C22.148986 17.597385 23 15.396508 23 13 23 7.4889971 18.511003 3 13 3zm0 2c4.430123.0 8 3.5698774 8 8 0 4.430123-3.569877 8-8 8-4.4301226.0-8-3.569877-8-8 0-4.4301226 3.5698774-8 8-8z"></path>
                            </svg>
                            <input id="searchInput" type="text" name="s" placeholder="search" onkeyup="fetchResults()" class="field bg-charcoal-100 dark:bg-charcoal-700 placeholder-charcoal-700/20 h-10 w-full px-2 outline-none" />
                            <span class="close fill-charcoal-900 dark:fill-charcoal-100 dark:bg-charcoal-800 dark:border-charcoal-800 cursor-pointer rounded border bg-gray-100 px-2 text-[13px] active:scale-95">
                              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="24" viewBox="0 0 24 24">
                                <path d="M 4.9902344 3.9902344 A 1.0001 1.0001 0 0 0 4.2929688 5.7070312 L 10.585938 12 L 4.2929688 18.292969 A 1.0001 1.0001 0 1 0 5.7070312 19.707031 L 12 13.414062 L 18.292969 19.707031 A 1.0001 1.0001 0 1 0 19.707031 18.292969 L 13.414062 12 L 19.707031 5.7070312 A 1.0001 1.0001 0 0 0 18.980469 3.9902344 A 1.0001 1.0001 0 0 0 18.292969 4.2929688 L 12 10.585938 L 5.7070312 4.2929688 A 1.0001 1.0001 0 0 0 4.9902344 3.9902344 z"></path>
                              </svg>
                            </span>
                          </form>
                          <div class="py-3 px-4">
                            <h3 class="text-charcoal-800 dark:text-charcoal-100 font-semibold">Result</h3>
                          </div>
                          <div class="h-full pb-[7rem] space-y-2 overflow-auto overscroll-contain p-4 sm:h-[20rem] sm:pb-4">
                            <ul id="datafetch" class="space-y-2">
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- menu mobile open -->
                </header>
            <?php

            get_template_part( 'inc/mobile-menu' );	

        }
    }
    add_action( 'narasix_header_action', 'narasix_header' );

    /**
     * Site logo
     */
    if ( ! function_exists( 'narasix_site_logo' ) ) {
        /**
         * Site logo
         *
         * @since 1.0.0
         */
        function narasix_site_logo() {
            ?>
              <div class="flex items-center">
                <?php if( has_custom_logo() ):  ?>
                    <?php 
                        // Get Custom Logo URL
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        $custom_logo_url = $custom_logo_data[0];
                    ?>

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
                      title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" 
                      rel="home">

                        <img class="logo-branding" src="<?php echo esc_url( $custom_logo_url ); ?>" 
                            alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>

                    </a>
                <?php else: ?>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
                      title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" 
                      rel="home">
                    <div class="site-name"><?php bloginfo( 'name' ); ?></div>
                  </a>
                <?php endif; ?>
            </div>

            <?php
        }
        
    }

    /**
     * Navigation
     */
    if ( ! function_exists( 'narasix_navigation' ) ) {
        /**
         * Navigation
         *
         * @since 1.0.0
         */
        function narasix_navigation() {
            ?>
              <nav id="site-navigation" class="hidden lg:flex" aria-label="<?php esc_attr_e( 'Horizontal', 'narasix' ); ?>" role="navigation">
                  <?php
                  if ( has_nav_menu( 'primary' ) ) {
                      wp_nav_menu(
                          array(
                              'container_id'    => 'primary-menu',
                              'container_class' => 'mt-4 p-4 md:mt-0 lg:mt-0 md:p-0 lg:p-0 lg:block',
                              'menu_class'      => 'nav-menu m-0 flex flex-col flex-wrap pl-0 lg:flex-row',
                              'theme_location'  => 'primary',
                              'fallback_cb'     => false,
                              'depth'           => 3,
                              'a_class'     		=> 'py-2 px-4 sub',
                          )
                      );
                  } else {
                      ?>
                        <ul class="narasix__default-menu">
                            <?php 
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'walker'   => new narasix_Walker_Page(),
                                    )
                                );
                            ?>
                        </ul>
                      <?php
                  }
                  
                  ?>
              </nav><!-- #site-navigation -->
            <?php
        }
    }

    /**
     * Share post
     */
      function social_share_links() {
        global $post;
        if(is_singular()) {
        
            // Get current page's URL 
            $sl_url = urlencode(get_permalink());
    
            // Get current page title - replace space by %20
            $sl_title = str_replace(' ', '%20', get_the_title());
    
            // Construct social sharing URLs
            $twitterURL = 'https://twitter.com/intent/tweet?text='.$sl_title.'&url='.$sl_url.'&via=[twitter username]';
            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sl_url;
            $redditURL = 'https://www.reddit.com/submit?url='.$sl_url.'&title='.$sl_title;
            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sl_url.'&title='.$sl_title;
    
            // Add sharing links at the end of page/page content
            $content = '<div class="flex items-center space-x-3">';
            $content .= '<a class="col-2 sbtn" href="'. $twitterURL .'" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48"><path fill="#03A9F4" d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path></svg></span></a>';
            $content .= '<a class="col-2 sbtn" href="'.$facebookURL.'" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48"><linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"></stop><stop offset="1" stop-color="#007ad9"></stop></linearGradient><path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path><path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"></path></svg></span></a>';
            $content .= '<a class="col-2 sbtn" href="'.$linkedInURL.'" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48"><path fill="#0288d1" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path><path fill="#fff" d="M14 19H18V34H14zM15.988 17h-.022C14.772 17 14 16.11 14 14.999 14 13.864 14.796 13 16.011 13c1.217 0 1.966.864 1.989 1.999C18 16.11 17.228 17 15.988 17zM35 24.5c0-3.038-2.462-5.5-5.5-5.5-1.862 0-3.505.928-4.5 2.344V19h-4v15h4v-8c0-1.657 1.343-3 3-3s3 1.343 3 3v8h4C35 34 35 24.921 35 24.5z"></path></svg></span></a>';
            $content .= '<a class="col-2 sbtn" href="'.$redditURL.'" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 40 40"><path fill="#fff" d="M34.5 13.5A4 4 0 1 0 34.5 21.5A4 4 0 1 0 34.5 13.5Z"></path><path fill="#788b9c" d="M34.5,14c1.93,0,3.5,1.57,3.5,3.5S36.43,21,34.5,21S31,19.43,31,17.5S32.57,14,34.5,14 M34.5,13 c-2.485,0-4.5,2.015-4.5,4.5s2.015,4.5,4.5,4.5s4.5-2.015,4.5-4.5S36.985,13,34.5,13L34.5,13z"></path><path fill="#fff" d="M5.5 13.5A4 4 0 1 0 5.5 21.5A4 4 0 1 0 5.5 13.5Z"></path><path fill="#788b9c" d="M5.5,14C7.43,14,9,15.57,9,17.5S7.43,21,5.5,21S2,19.43,2,17.5S3.57,14,5.5,14 M5.5,13 C3.015,13,1,15.015,1,17.5S3.015,22,5.5,22s4.5-2.015,4.5-4.5S7.985,13,5.5,13L5.5,13z"></path><path fill="#fff" d="M20,35.5c-9.649,0-17.5-5.383-17.5-12s7.851-12,17.5-12s17.5,5.383,17.5,12S29.649,35.5,20,35.5z"></path><path fill="#788b9c" d="M20,12c9.374,0,17,5.159,17,11.5S29.374,35,20,35S3,29.841,3,23.5S10.626,12,20,12 M20,11 C10,11,2,16.625,2,23.5S10,36,20,36s18-5.625,18-12.5S30,11,20,11L20,11z"></path><path fill="#f78f8f" d="M13.5 19.5A2 2 0 1 0 13.5 23.5A2 2 0 1 0 13.5 19.5Z"></path><path fill="#c74343" d="M13.5,20c0.827,0,1.5,0.673,1.5,1.5S14.327,23,13.5,23S12,22.327,12,21.5S12.673,20,13.5,20 M13.5,19c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5s2.5-1.119,2.5-2.5S14.881,19,13.5,19L13.5,19z"></path><g><path fill="#f78f8f" d="M26.5 19.5A2 2 0 1 0 26.5 23.5A2 2 0 1 0 26.5 19.5Z"></path><path fill="#c74343" d="M26.5,20c0.827,0,1.5,0.673,1.5,1.5S27.327,23,26.5,23S25,22.327,25,21.5S25.673,20,26.5,20 M26.5,19c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5s2.5-1.119,2.5-2.5S27.881,19,26.5,19L26.5,19z"></path></g><path fill="none" stroke="#788b9c" stroke-linecap="round" stroke-miterlimit="10" d="M13.5,27.9c0,0,2.184,2.6,6.5,2.6	s6.5-2.6,6.5-2.6"></path><g><path fill="#b6c9d6" d="M34.5 2.5A3 3 0 1 0 34.5 8.5A3 3 0 1 0 34.5 2.5Z"></path><path fill="#788b9c" d="M34.5,3C35.878,3,37,4.122,37,5.5S35.878,8,34.5,8S32,6.878,32,5.5S33.122,3,34.5,3 M34.5,2 C32.575,2,31,3.575,31,5.5S32.575,9,34.5,9S38,7.425,38,5.5S36.425,2,34.5,2L34.5,2z"></path></g><path fill="none" stroke="#788b9c" stroke-miterlimit="10" d="M20.5,12V8.113c0-1.987,1.445-3.613,3.613-3.613s2.871,1,7.387,1"></path></svg></span></a>';
            $content .= '</div>';
            
            return $content;
        } else {
            // if not a post/page then don't include sharing links
            return $content;
        }
      }
      
    /**
     * Footer inside
     */
    if( ! function_exists( 'narasix_footer_inside' ) ) {
        /**
         * Footer
         *
         * @since 1.0.0
         */
        function narasix_footer_inside() {
            ?>
              <footer class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-20">
              
                <div class="container py-6">
                  <hr class="mt-6 h-px border-none bg-slate-200" />
                  <div class="mt-6 flex flex-col items-center justify-between md:flex-row">
                    <div>
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-xl font-bold transition-colors duration-300 hover:text-charcoal-700 dark:text-charcoal-100 dark:hover:text-charcoal-100">
                        <?php echo bloginfo('name'); ?>
                      </a>
                    </div>

                    <?php 
                      /**
                       * Footer navigation.
                       *
                       * @since 1.0.0
                       */
                      narasix_footer_navigation();
                    ?>

                  </div>
                    <?php 
                        /**
                         * narasix_footer_copyright_content hook.
                         *
                         * * @hooked narasix_footer_copyright_content (outputs the HTML for the Theme Options footer copyright text)
                         *
                         */
                        do_action( 'narasix_footer_copyright_content' );
                        
                    ?>
                </div>
                
              </footer><!-- #Footer inside -->
            <?php
        }
    }
    add_action( 'narasix_footer', 'narasix_footer_inside' );

    /**
     * Footer Navigation
     */
    if ( ! function_exists( 'narasix_footer_navigation' ) ) {
      /**
       * Footer Navigation
       *
       * @since 1.0.0
       */
      function narasix_footer_navigation() {
        ?>
          <nav id="footer-navigation" class="mt-4 flex md:m-0" aria-label="<?php esc_attr_e( 'Horizontal', 'narasix' ); ?>" role="navigation">
              <?php
              if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                  array(
                      'container_class' => '-mx-4',
                      'menu_class'      => 'flex',
                      'theme_location'  => 'footer-menu',
                      'fallback_cb'     => false,
                      'a_class'     		=> 'px-4 text-[15px] font-medium hover:underline dark:text-slate-200 dark:hover:text-blue-400',
                  )
                );
              }
            ?>
          </nav><!-- #footer-navigation -->
        <?php
      }
    }
    
    /**
     * Footer Copyright
     */
    if ( ! function_exists( 'narasix_footer_copyright' ) ) {
      /**
       * Footer Copyright
       *
       * @since 1.0.0
       */
      function narasix_footer_copyright() {
          ?>
            <p class="mt-2 sm:mt-1 sm:text-left text-center text-slate-800/50 dark:text-slate-100/50 text-[13px]">
              Copyright
              <?php

                echo date_i18n(
                      _x( '©Y', 'copyright date format', 'narasix' )
              );

              ?>
              <span>
                <?php echo bloginfo('name'); ?>
                <?php printf( __( '| Designed & Built by', 'narasix' ) ); ?>
              </span>
              <a class="text-yellow-500 hover:underline ml-1" href="https://hidunks.com" target='_blank'><?php printf( __( 'Hidunks Studio', 'narasix' ) ); ?></a>
            </p>
          <?php
      }
    }
    add_action( 'narasix_footer_copyright_content', 'narasix_footer_copyright' );


?>