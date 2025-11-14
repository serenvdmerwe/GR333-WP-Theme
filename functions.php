<?php
/**
 * GR333 WP Theme Functions
 *
 * @package GR333_WP_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function gr333_theme_setup() {
    // Add theme support for various features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    
    // Add custom image sizes
    add_image_size( 'gr333-featured', 1200, 600, true );
    add_image_size( 'gr333-thumbnail', 400, 300, true );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'gr333-wp-theme' ),
        'footer'  => __( 'Footer Menu', 'gr333-wp-theme' ),
    ) );
    
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    
    // Add support for custom header
    add_theme_support( 'custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 400,
        'flex-width'    => true,
        'flex-height'   => true,
    ) );
    
    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
    
    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
    
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'gr333_theme_setup' );

/**
 * Set content width
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/**
 * Register Widget Areas
 */
function gr333_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'gr333-wp-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'gr333-wp-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'gr333-wp-theme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'gr333-wp-theme' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'gr333_widgets_init' );

/**
 * Enqueue Scripts and Styles
 */
function gr333_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'gr333-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // Enqueue custom CSS if exists
    if ( file_exists( get_template_directory() . '/assets/css/custom.css' ) ) {
        wp_enqueue_style( 'gr333-custom', get_template_directory_uri() . '/assets/css/custom.css', array( 'gr333-style' ), '1.0.0' );
    }
    
    // Enqueue main JavaScript file
    if ( file_exists( get_template_directory() . '/assets/js/main.js' ) ) {
        wp_enqueue_script( 'gr333-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
    }
    
    // Enqueue comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'gr333_scripts' );

/**
 * Custom Excerpt Length
 */
function gr333_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'gr333_excerpt_length' );

/**
 * Custom Excerpt More
 */
function gr333_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'gr333_excerpt_more' );

/**
 * Add Custom Classes to Body
 */
function gr333_body_classes( $classes ) {
    // Add class if sidebar is active
    if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
        $classes[] = 'has-sidebar';
    }
    
    // Add class for singular pages
    if ( is_singular() ) {
        $classes[] = 'singular-page';
    }
    
    return $classes;
}
add_filter( 'body_class', 'gr333_body_classes' );

/**
 * Custom Template Tags
 */

// Posted on date
function gr333_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    
    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'gr333-wp-theme' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );
    
    echo '<span class="posted-on">' . $posted_on . '</span>';
}

// Posted by author
function gr333_posted_by() {
    $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'gr333-wp-theme' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );
    
    echo '<span class="byline"> ' . $byline . '</span>';
}

// Entry footer
function gr333_entry_footer() {
    // Categories
    $categories_list = get_the_category_list( esc_html__( ', ', 'gr333-wp-theme' ) );
    if ( $categories_list ) {
        printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'gr333-wp-theme' ) . '</span>', $categories_list );
    }
    
    // Tags
    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gr333-wp-theme' ) );
    if ( $tags_list ) {
        printf( '<span class="tags-links"> | ' . esc_html__( 'Tagged %1$s', 'gr333-wp-theme' ) . '</span>', $tags_list );
    }
    
    // Edit link
    edit_post_link(
        sprintf(
            wp_kses(
                __( 'Edit <span class="screen-reader-text">%s</span>', 'gr333-wp-theme' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            get_the_title()
        ),
        '<span class="edit-link"> | ',
        '</span>'
    );
}

/**
 * Pagination
 */
function gr333_pagination() {
    $args = array(
        'mid_size'  => 2,
        'prev_text' => __( '&larr; Previous', 'gr333-wp-theme' ),
        'next_text' => __( 'Next &rarr;', 'gr333-wp-theme' ),
    );
    
    the_posts_pagination( $args );
}

/**
 * Customize Register
 */
function gr333_customize_register( $wp_customize ) {
    // Add color scheme option
    $wp_customize->add_setting( 'gr333_primary_color', array(
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gr333_primary_color', array(
        'label'    => __( 'Primary Color', 'gr333-wp-theme' ),
        'section'  => 'colors',
        'settings' => 'gr333_primary_color',
    ) ) );
}
add_action( 'customize_register', 'gr333_customize_register' );

/**
 * Include custom functions
 */
// require get_template_directory() . '/inc/custom-functions.php';
// Load custom theme helpers (includes changelog indicator)
require_once get_template_directory() . '/inc/custom-functions.php';
// require get_template_directory() . '/inc/template-functions.php';
// require get_template_directory() . '/inc/customizer.php';