<?php

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

if ( ! function_exists( 'shine_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function shine_theme_setup() {
        
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
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'shine-theme' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'shine_theme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        //Set up the WordPress core custom header feature.
        add_theme_support( 'custom-header', apply_filters( 'shine_theme_custom_header_args', array(
            'default-image'          => '',
            'default-text-color'     => '000000',
            'width'                  => 1000,
            'height'                 => 250,
            'flex-height'            => true,
        ) ) );
    }
endif;
add_action( 'after_setup_theme', 'shine_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shine_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shine-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shine-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shine_theme_widgets_init' );


function shine_theme_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_style( 'shine_theme_style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstarp_style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
}
add_action( 'wp_enqueue_scripts', 'shine_theme_scripts' );


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'rtl.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );