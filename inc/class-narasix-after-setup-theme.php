<?php
/**
 * Narasix functions and definitions.
 *
 * @package narasix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Narasix_After_Setup_Theme initial setup
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Narasix_After_Setup_Theme' ) ) {

	/**
	 * Narasix_After_Setup_Theme initial setup
	 */
	class Narasix_After_Setup_Theme {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'narasix_setup' ), 2 );
		}

		/**
		 * Setup theme
		 *
		 * @since 1.0.1
		 */
		public function narasix_setup() {

			/*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on narasix, use a find and replace
             * to change 'narasix' to the name of your theme in all the template files.
             */
            load_theme_textdomain( 'narasix', get_template_directory() . '/languages' );

            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support( 'post-thumbnails' );

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'primary' => esc_html__( 'Primary', 'narasix' ),
                    'footer-menu' => esc_html__( 'Footer Menu', 'narasix' ),
                )
            );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support( 'customize-selective-refresh-widgets' );

            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support(
                'custom-logo',
                array(
                    'height'      => 250,
                    'width'       => 250,
                    'flex-width'  => true,
                    'flex-height' => true,
                )
            );

            /**
             * Add support for block styles.
             *
             */
            add_theme_support( 'wp-block-styles' );

            /**
             * Add support for align-wide
             *
             */
            add_theme_support( 'align-wide' );

            /**
             * Set the content width in pixels, based on the theme's design and stylesheet.
             *
             * Priority 0 to make it available to lower priority callbacks.
             *
             * @global int $content_width
             */
            $GLOBALS['content_width'] = apply_filters( 'narasix_content_width', 640 );

		}

	}
}

/**
 * Calling 'get_instance()' method
 */
Narasix_After_Setup_Theme::get_instance();
