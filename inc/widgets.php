<?php
 /**
 * Register widget area.
 */
if ( ! function_exists( 'narasix_widgets_init' ) ) {

    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function narasix_widgets_init() {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Sidebar', 'narasix' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Add widgets here.', 'narasix' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="border-b pb-4 mb-3 font-semibold dark:border-charcoal-700">',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Sidebar 2', 'narasix' ),
                'id'            => 'sidebar-2',
                'description'   => esc_html__( 'Add widgets here.', 'narasix' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="border-b pb-4 font-semibold dark:border-charcoal-700">',
                'after_title'   => '</h3>',
            )
        );
    }
    add_action( 'widgets_init', 'narasix_widgets_init' );
}

