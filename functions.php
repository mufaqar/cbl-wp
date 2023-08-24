<?php
/**
 * CBL_Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CBL_Theme
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
function cbl_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on CBL_Theme, use a find and replace
		* to change 'cbl_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cbl_theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'cbl_theme' ),
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
			'cbl_theme_custom_background_args',
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
add_action( 'after_setup_theme', 'cbl_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cbl_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cbl_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'cbl_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cbl_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cbl_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cbl_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cbl_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cbl_theme_scripts() {
	wp_enqueue_style( 'cbl_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cbl_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cbl_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cbl_theme_scripts' );


require get_template_directory() . '/inc/template-functions.php';




function cptui_register_my_cpts() {

	/**
	 * Post Type: Providers.
	 */

	$labels = [
		"name" => esc_html__( "Providers", "cbl_theme" ),
		"singular_name" => esc_html__( "Provider", "cbl_theme" ),
	];

	$args = [
		"label" => esc_html__( "Providers", "cbl_theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => true,
		"rewrite" => [ "slug" => "providers", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "page-attributes" ],
		"show_in_graphql" => true,
		"graphql_single_name" => "Provider",
		"graphql_plural_name" => "Providers",
	];

	register_post_type( "providers", $args );

	/**
	 * Post Type: Zone.
	 */

	$labels = [
		"name" => esc_html__( "Zone", "cbl_theme" ),
		"singular_name" => esc_html__( "Zone", "cbl_theme" ),
	];

	$args = [
		"label" => esc_html__( "Zone", "cbl_theme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "area_zone", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => true,
		"graphql_single_name" => "Zone",
		"graphql_plural_name" => "Zone",
	];

	register_post_type( "area_zone", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );





	function cptui_register_my_taxes() {

	/**
	 * Taxonomy: City.
	 */

	$labels = [
		"name" => esc_html__( "City", "cbl_theme" ),
		"singular_name" => esc_html__( "City", "cbl_theme" ),
	];

	
	$args = [
		"label" => esc_html__( "City", "cbl_theme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'zone_city', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "zone_city",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => true,
		"graphql_single_name" => "City",
		"graphql_plural_name" => "Cities",
	];
	register_taxonomy( "zone_city", [ "area_zone" ], $args );

	/**
	 * Taxonomy: State.
	 */

	$labels = [
		"name" => esc_html__( "State", "cbl_theme" ),
		"singular_name" => esc_html__( "State", "cbl_theme" ),
	];

	
	$args = [
		"label" => esc_html__( "State", "cbl_theme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'zone_state', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "zone_state",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => true,
		"graphql_single_name" => "State",
		"graphql_plural_name" => "States",
	];
	register_taxonomy( "zone_state", [ "area_zone" ], $args );

	/**
	 * Taxonomy: County.
	 */

	$labels = [
		"name" => esc_html__( "County", "cbl_theme" ),
		"singular_name" => esc_html__( "County", "cbl_theme" ),
	];

	
	$args = [
		"label" => esc_html__( "County", "cbl_theme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'zone_county', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "zone_county",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => true,
		"graphql_single_name" => "County",
		"graphql_plural_name" => "Countys",
	];
	register_taxonomy( "zone_county", [ "area_zone" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );




function get_provider_terms ($id , $term) {

	// Get the post terms (categories or tags)
$terms = get_the_terms($id, $term); // Change 'category' to 'post_tag' for tags

if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        return $term->name ;
    }
}



}


function enqueue_theme_styles() {
  wp_enqueue_style('tailwind', get_template_directory_uri() . '/src/styles/main.css');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');


	function custom_rest_endpoint_init() {
		register_rest_route('custom/v1', '/providers', array(
			'methods' => 'GET',
			'callback' => 'custom_rest_endpoint_callback',
		));
	}
	add_action('rest_api_init', 'custom_rest_endpoint_init');

		function custom_rest_endpoint_callback($request) {
		$params = $request->get_params();
		$response = array();
		if (!empty($params['internet_services'])) {
			$values = explode(',', $params['internet_services']);
			$values = array_map('trim', $values);
			$meta_query = array(
				'relation' => 'OR',
			);
			foreach ($values as $value) {
				$meta_query[] = array(
					'key'     => 'internet_services',
					'value'   => $value,
					'compare' => 'LIKE',
				);
			}
			$query_args = array(
				'post_type' => 'providers',
				'meta_query' => $meta_query,
			);
			$providers = get_posts($query_args);
			$response['providers'] = $providers;
		}
		return rest_ensure_response($response);
	}



// http://localhost/clients/cbl/wp-json/custom/v1/providers?internet_services=20001,20005

// https://cblproject.aspactglobal.com/wp-json/custom/v1/providers?internet_services=20001,20005










$meta_value_array = array('');
$post_id = 42467; 
$meta_key = 'internet_services';
//update_post_meta($post_id, $meta_key, $meta_value_array);












