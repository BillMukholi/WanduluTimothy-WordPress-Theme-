<?php
/**
 * wandulu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wandulu
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wandulu_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wandulu, use a find and replace
		* to change 'wandulu' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wandulu', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'wandulu' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wandulu_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
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
}
add_action( 'after_setup_theme', 'wandulu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wandulu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wandulu_content_width', 640 );
}
add_action( 'after_setup_theme', 'wandulu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wandulu_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wandulu' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wandulu' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wandulu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wandulu_scripts() {
	wp_enqueue_style( 'wandulu-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wandulu-style', 'rtl', 'replace' );

	wp_enqueue_style( 'animate', get_template_directory_uri()."./assets/library/animate", array(), _S_VERSION );
	wp_enqueue_style( 'owl carousel', get_template_directory_uri()."./assets/library/OwlCarousel/dist/assets/owl.carousel.min.css", array(), _S_VERSION );
	wp_enqueue_style( 'owl carousel theme', get_template_directory_uri()."./assets/library/OwlCarousel/dist/assets/owl.theme.default.min.css", array(), _S_VERSION );
	wp_enqueue_style( 'main', get_template_directory_uri()."./css/main.css", array(), _S_VERSION );

	wp_enqueue_script( 'xquery', get_template_directory_uri() . './assets/library/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'gsap', get_template_directory_uri() . './assets/library/gsap/gsap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owl carousel', get_template_directory_uri() . './assets/library/OwlCarousel/dist/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wandulu_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




//Social Media Links

function social_media_links_section( $wp_customize ) {
	// Add a new section to the Customizer.
	$wp_customize->add_section( 'social_media_link_section', array(
	  'title' => __( 'Social Media Links', 'wandulu' ),
	  'priority' => 30,
	) );
  
	// Add a new Facebook setting to the section.
	$wp_customize->add_setting( 'facebook', array(
	  'default' => '',
	  'type' => 'theme_mod',
	) );
  
	// Add a new Facebook control to the section.
	$wp_customize->add_control( 'facebook_control', array(
	  'label' => __( 'Facebook', 'wandulu' ),
	  'section' => 'social_media_link_section',
	  'settings' => 'facebook',
	  'type' => 'text',
	) );

	// Add a new Instagram setting to the section.
	$wp_customize->add_setting( 'instagram', array(
	  'default' => '',
	  'type' => 'theme_mod',
	) );
  
	// Add a new Instagram control to the section.
	$wp_customize->add_control( 'instagram_control', array(
	  'label' => __( 'Instagram', 'wandulu' ),
	  'section' => 'social_media_link_section',
	  'settings' => 'instagram',
	  'type' => 'text',
	) );

	
	// Add a new Threads setting to the section.
	$wp_customize->add_setting( 'threads', array(
		'default' => '',
		'type' => 'theme_mod',
	  ) );
	
	  // Add a new Threads control to the section.
	  $wp_customize->add_control( 'threads_control', array(
		'label' => __( 'Threads', 'wandulu' ),
		'section' => 'social_media_link_section',
		'settings' => 'threads',
		'type' => 'text',
	  ) );

	// Add a new X (Twitter) setting to the section.
	$wp_customize->add_setting( 'x_(Twitter)', array(
	  'default' => '',
	  'type' => 'theme_mod',
	) );
  
	// Add a new  X (Twitter) control to the section.
	$wp_customize->add_control( 'x_control', array(
	  'label' => __( 'X (Twitter)', 'wandulu' ),
	  'section' => 'social_media_link_section',
	  'settings' => 'x_(Twitter)',
	  'type' => 'text',
	) );


	
  }
  
  add_action( 'customize_register', 'social_media_links_section' );

  //Custom Post Types

  function create_works_post_type() {
	register_post_type('works', array(
	  'labels' => array(
		'name' => __('Works'),
		'singular_name' => __('Work'),
		// ... other label definitions ...
	  ),
	  'public' => true,
	  'has_archive' => true,
	  'rewrite' => array('slug' => 'works'),
	  'menu_icon' => 'dashicons-art',
	  'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
	  'taxonomies' => array('category', 'post_tag'),
	));
  
	// Register mandatory custom fields
	register_post_meta('works', 'Location', array(
	  'type' => 'string',
	  'single' => true,
	  'show_in_rest' => true,
	  'default' => 'Default Location',
	  'required' => true,
	));
  
	register_post_meta('works', 'Year', array(
	  'type' => 'number',
	  'single' => true,
	  'show_in_rest' => true,
	  'default' => '0000',
	  'required' => true,
	));
  }
  
  add_action('init', 'create_works_post_type');
  


  // Register the "Exhibitions" post type
function create_exhibitions_post_type() {
	register_post_type('exhibitions', array(
	  'labels' => array(
		'name' => __('Exhibitions'),
		'singular_name' => __('Exhibition'),
		'add_new' => __('Add New'),
		'add_new_item' => __('Add New Exhibition'),
		'edit_item' => __('Edit Exhibition'),
		'new_item' => __('New Exhibition'),
		'view_item' => __('View Exhibition'),
		'search_items' => __('Search Exhibitions'),
		'not_found' => __('No Exhibitions found'),
		'not_found_in_trash' => __('No Exhibitions found in Trash'),
		'parent_item_colon' => __('Parent Exhibition:'),
		'all_items' => __('All Exhibitions'),
		'featured_image' => __('Featured Image'),
		'set_featured_image' => __('Set featured image'),
		'remove_featured_image' => __('Remove featured image'),
		'use_featured_image' => __('Use featured image'),
		'archives' => __('Exhibitions Archives'),
		'attributes' => __('Exhibition Attributes'),
		'insert_into_item' => __('Insert into exhibition'),
		'uploaded_to_this_item' => __('Uploaded to this exhibition'),
		'filter_items' => __('Filter exhibitions'),
		'help' => __('Help with Exhibitions'),
	  ),
	  'public' => true,
	  'has_archive' => true,
	  'rewrite' => array('slug' => 'exhibitions'),
	  'menu_icon' => 'dashicons-tickets-alt',
	  'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
	  'taxonomies' => array('category', 'post_tag'),
	));
  }
  
  add_action('init', 'create_exhibitions_post_type');
  