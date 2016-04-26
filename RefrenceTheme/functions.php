<?php
/**
 * olevia functions and definitions
 *
 * @since   1.0.0
 * @package olevia
 */

/**
 * The current version of the theme.
 *
 * @since  1.0.0
 */
define( 'OLEVIA_VERSION', wp_get_theme()->get( 'Version' ) );


if ( ! function_exists( 'olevia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since  1.0.0
 */
function olevia_setup() {
  /**
   * Get theme options.
   */
  $theme_options = olevia_get_options();


  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on olevia, use a find and replace
   * to change 'olevia' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'olevia', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /**
   * Add custom logo support.
   *
   * @since 1.3.3
   */
  if ( version_compare( $GLOBALS['wp_version'], '4.5', '>=' ) ) {
    add_theme_support( 'custom-logo', array(
      'flex-width'  => true,
      'flex-height' => true
    ) );
  }

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
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  /**
   * Add image sizes.
   */
  add_image_size( 'olevia-featured', 780, 0 );
  add_image_size( 'olevia-featured-full', 1200, 0 );
  add_image_size( 'olevia-featured-grid', 370, 200, true );
  // Portfolio page template
  if ( 'col_4' === $theme_options['portfolio_projects_columns'] ) {
    add_image_size( 'olevia-featured-portfolio', 270, 400, true );
  }
  else {
    add_image_size( 'olevia-featured-portfolio', 370, 400, true );
  }
  // Home page template
  if ( 'col_2' === $theme_options['portfolio_projects_columns'] ) {
    add_image_size( 'olevia-featured-portfolio-home', 600, 0 );
  }
  elseif ( 'col_4' === $theme_options['portfolio_projects_columns'] ) {
    add_image_size( 'olevia-featured-portfolio-home', 300, 0 );
  }
  else {
    // col_3
    add_image_size( 'olevia-featured-portfolio-home', 400, 0 );
  }

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary'        => esc_html__( 'Primary', 'olevia' ),
    'footer-social'  => esc_html__( 'Footer Social', 'olevia' ),
    'footer'         => esc_html__( 'Footer', 'olevia' )
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
  add_theme_support( 'custom-background', apply_filters( 'olevia_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  // Add styling to WYSIWYG editor backend
  add_editor_style( array( 'css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'olevia_setup' );
endif; // olevia_setup


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since  1.0.0
 */
function olevia_set_content_width() {
  $content_width = 1200;
  $GLOBALS['content_width'] = apply_filters( 'olevia_set_content_width', $content_width );
}
add_action( 'after_setup_theme', 'olevia_set_content_width', 0 );


/**
 * Register widget area.
 *
 * @since  1.0.0
 */
function olevia_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Content Sidebar', 'olevia' ),
    'id'            => 'sidebar-content',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="c-widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="c-wiget__title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Sidebar', 'olevia' ),
    'id'            => 'sidebar-footer',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="c-widget c-widget--footer %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="c-wiget__title c-widget__title--footer">',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'olevia_widgets_init' );


/**
 * Enqueue/Register scripts and styles.
 *
 * @since  1.0.0
 */
function olevia_assets() {
  // Libraries
  wp_enqueue_script(
    'fitvids',
    get_template_directory_uri() . '/lib/jquery.fitvids.js',
    array( 'jquery' ),
    '1.1',
    true
  );
  wp_enqueue_style(
    'fontawesome',
    get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css',
    array(),
    '4.5.0'
  );

  // Styles
  wp_enqueue_style(
    'olevia-style',
    get_stylesheet_uri(),
    array(),
    OLEVIA_VERSION
  );

  // Scripts
  $theme_script_dependencies = array( 'jquery' );
  if ( is_page_template( 'page-templates/home.php' ) )
    $theme_script_dependencies[] ='jquery-masonry';

  wp_enqueue_script(
    'olevia-script',
    get_template_directory_uri() . '/js/theme.js',
    $theme_script_dependencies,
    OLEVIA_VERSION,
    true
  );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'olevia_assets' );


/**
 * Implement the Custom Header feature.
 *
 * @since  1.0.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since  1.0.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 *
 * @since  1.0.0
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Adds main customizer file.
 *
 * @since  1.0.0
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * Load Jetpack compatibility file.
 *
 * @since  1.0.0
 */
// require get_template_directory() . '/inc/jetpack.php';


/**
 * Load Admin related functinos.
 *
 * @since  1.0.0
 */
require get_template_directory() . '/inc/admin/admin.php';
