<?php 
    /**
     * Enqueue scripts and styles.
     */
    function narasix_scripts() {
        wp_enqueue_style( 'narasix-style', get_stylesheet_uri(), array(), NARASIX_VERSION );
        wp_enqueue_style( 'narasix-icomoon', get_template_directory_uri() . '/assets/icons/icomoon.css', array(),  NARASIX_VERSION);

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'narasix-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NARASIX_VERSION, true );
        wp_enqueue_script( 'narasix-script', get_template_directory_uri() . '/assets/js/script.js', array(), NARASIX_VERSION, true );
        wp_enqueue_script( 'narasix-search', get_template_directory_uri() . '/assets/js/search.js', array(), NARASIX_VERSION, true );
        wp_enqueue_script( 'narasix-lazysize', get_template_directory_uri() . '/assets/js/lazysize.js', array(), NARASIX_VERSION, true );
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
            ?>
            <style>
                .hds {
                    display: none;
                }
            </style>
            <?php
        }

        if ( is_front_page() ){
            wp_enqueue_style( 'narasix-flickity', get_template_directory_uri() . '/assets/css/flickity.css', array(),  NARASIX_VERSION);
            wp_enqueue_script( 'narasix-flickity', get_template_directory_uri() . '/assets/js/flickity.js', array(), NARASIX_VERSION, true );
        }
    }
    add_action( 'wp_enqueue_scripts', 'narasix_scripts' );
?>