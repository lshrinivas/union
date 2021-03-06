<?php
/**
 * Union functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Union
 */

if ( ! function_exists( 'union_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function union_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Union, use a find and replace
	 * to change 'union' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'union', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'union' ),
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
	add_theme_support( 'custom-background', apply_filters( 'union_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif;
add_action( 'after_setup_theme', 'union_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function union_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'union_content_width', 640 );
}
add_action( 'after_setup_theme', 'union_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function union_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'union' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'union' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'union_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function union_scripts() {
	wp_enqueue_style( 'union-style', get_stylesheet_uri() );

	wp_enqueue_script( 'union-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'union-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array (), 1.3, true);

    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/site.js', array (), 1.1, true);

    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'union_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/shortcodes.php';

add_shortcode('search', 'get_search_form');

add_action('wp_ajax_take_pledge', 'take_pledge_callback');
add_action('wp_ajax_nopriv_take_pledge', 'take_pledge_callback');

function take_pledge_callback() {

    global $post;  // You still may need to pass the POST ID here from the JS ajax.
    // get each post by ID
    $postID = $post->ID;
    // get the post's custom fields
    $custom = get_post_custom($postID);
    // find the view count field
    $views = intval($custom['number_attending'][0]);
    // increment the count
    if($views > 0) {
        update_post_meta($postID, 'number_attending', ($views + 1));
    } else {
        add_post_meta($postID, 'number_attending', 1, true);
    }
    wp_die(); // this is required to return a proper result
}
