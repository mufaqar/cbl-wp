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


function cptui_register_my_cpts() {

	/**
	 * Post Type: Zones.
	 */

	$labels = [
		"name" => esc_html__( "Zones", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Zone", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Zones", "custom-post-type-ui" ),
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
		"graphql_plural_name" => "Zones",
	];

	register_post_type( "area_zone", $args );

	/**
	 * Post Type: Providers.
	 */

	$labels = [
		"name" => esc_html__( "Providers", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Provider", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Providers", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "providers", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => true,
		"graphql_single_name" => "Provider",
		"graphql_plural_name" => "Providers",
	];

	register_post_type( "providers", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_area_zone() {

	/**
	 * Post Type: Zones.
	 */

	$labels = [
		"name" => esc_html__( "Zones", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Zone", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Zones", "custom-post-type-ui" ),
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
		"graphql_plural_name" => "Zones",
	];

	register_post_type( "area_zone", $args );
}

add_action( 'init', 'cptui_register_my_cpts_area_zone' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: City.
	 */

	$labels = [
		"name" => esc_html__( "City", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "City", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "City", "custom-post-type-ui" ),
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
		"name" => esc_html__( "States Code", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "State Code", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "State", "custom-post-type-ui" ),
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
}
add_action( 'init', 'cptui_register_my_taxes' );

function cptui_register_my_taxes_zone_name() {

	/**
	 * Taxonomy: States.
	 */

	$labels = [
		"name" => esc_html__( "State Names", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "State Name", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "States", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'zone_name', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "zone_name",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => true,
		"graphql_single_name" => "StateName",
		"graphql_plural_name" => "StatesNames",
	];
	register_taxonomy( "zone_name", [ "area_zone" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_zone_name' );


/**
	 * Taxonomy: County.
	 */

	 $labels = [
		"name" => esc_html__( "County", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "County", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "County", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'zone_county', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "zone_county",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => true,
		"graphql_single_name" => "County",
		"graphql_plural_name" => "Counties",
	];
	register_taxonomy( "zone_county", [ "area_zone" ], $args );

















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
		
			
			$response['providers'] = array();
			foreach ($providers as $provider) {
				$provider_data = array(
					'id' => $provider->ID,
					'title' => $provider->post_title,			
					'pro_price' => get_post_meta($provider->ID, 'pro_price', true),
					'pro_speed' => get_post_meta($provider->ID, 'pro_speed', true),
					'pro_phone' => get_post_meta($provider->ID, 'pro_phone', true),
					 'featured_image' => get_the_post_thumbnail_url($provider->ID),
				);
				$response['providers'][] = $provider_data;
			}	
			
			
		}
		return rest_ensure_response($response);
	}



// http://localhost/clients/cbl/wp-json/custom/v1/providers?internet_services=20001,20005

// https://cblproject.aspactglobal.com/wp-json/custom/v1/providers?internet_services=20001,20005


$meta_value_array = array('');
$post_id = 42467; 
$meta_key = 'internet_services';
//update_post_meta($post_id, $meta_key, $meta_value_array);


