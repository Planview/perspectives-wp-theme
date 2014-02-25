<?php
/**
 * Portfolio Perspectives functions and definitions
 *
 * @package Portfolio Perspectives
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 848; /* pixels */
}

if ( ! function_exists( 'portfolio_perspectives_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_perspectives_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Portfolio Perspectives, use a find and replace
	 * to change 'portfolio-perspectives' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'portfolio-perspectives', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'portfolio-perspectives' ),
        'footer' => __( 'Footer Menu', 'portfolio-perspectives' ),
	) );

	// Enable support for Post Formats.
//	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'portfolio_perspectives_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // portfolio_perspectives_setup
add_action( 'after_setup_theme', 'portfolio_perspectives_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function portfolio_perspectives_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'portfolio-perspectives' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'portfolio_perspectives_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_perspectives_scripts() {
    if ( is_admin() ) wp_enqueue_style( 'portfolio-perspectives', get_stylesheet_uri() );

    if ( !is_admin() ) wp_enqueue_style( 'portfolio-perspectives-style', get_stylesheet_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'portfolio-perspectives-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'portfolio-perspectives-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/min/bootstrap.min.js', array('jquery'), '3.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_perspectives_scripts' );

function portfolio_perspectives_bg_size () {
    if () { ?>
<!--[if lte IE 8]>
<style>
    .site-header, .site-title, .site-description { -ms-behavior: url('<?php echo get_template_directory_uri() . '/vendor/background-size-polyfill/backgroundsize.min.htc' ?>');}
</style>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/vendor/respond/dest/respond.min.js' ?>"></script>
<![endif]-->
<?php }
}
add_action( 'wp_head', 'portfolio_perspectives_bg_size', 100 );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load nav walkers file.
 */
require get_template_directory() . '/inc/nav-walkers.php';
