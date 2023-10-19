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
		"graphql_single_name" => "SingleProvider",
		"graphql_plural_name" => "AllProviders",
	];

	register_post_type( "providers", $args );
}


function cptui_register_my_taxes_providers_types() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => esc_html__( "Types", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Type", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "Types", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'providers_types', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "providers_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => true,
		"graphql_single_name" => "ProviderType",
		"graphql_plural_name" => "ProviderTypes",
	];
	register_taxonomy( "providers_types", [ "providers" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_providers_types' );


function cptui_register_my_taxes_providers_service_types() {

	/**
	 * Taxonomy: Services Type.
	 */

	$labels = [
		"name" => esc_html__( "Services", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Service", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "Services", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'providers_service_types', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "providers_service_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => true,
		"graphql_single_name" => "ServiceType",
		"graphql_plural_name" => "ServiceTypes",
	];
	register_taxonomy( "providers_service_types", [ "providers" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_providers_service_types' );

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


	// API 



	function custom_rest_endpoint_init() {
		register_rest_route('custom/v1', '/providers', array(
			'methods' => 'POST',
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
				'posts_per_page' => -1
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
					'features' => get_post_meta($provider->ID, 'features', true),
					'slug' => basename(get_permalink($provider->ID)),				
					'services_info' => get_post_meta($provider->ID, 'services_info', true),
					'featured_image' => get_the_post_thumbnail_url($provider->ID),
					'providers_service_types' => get_the_terms($provider->ID, 'providers_service_types'),	
					'providers_types' => wp_get_post_terms($provider->ID, 'providers_types', array('fields' => 'slugs')),			

					'services_info_internet_services_features' =>  get_post_meta($provider->ID, 'services_info_internet_services_features', true),
					'services_info_internet_services_speed' =>  get_post_meta($provider->ID, 'services_info_internet_services_speed', true),
					'services_info_internet_services_price' =>  get_post_meta($provider->ID, 'services_info_internet_services_price', true),
					'services_info_internet_services_summary_features' =>  get_post_meta($provider->ID, 'services_info_internet_services_summary_features', true),
					'services_info_internet_services_summary_speed' =>  get_post_meta($provider->ID, 'services_info_internet_services_summary_speed', true),

					'services_info_tv_services_features' =>  get_post_meta($provider->ID, 'services_info_tv_services_features', true),
					'services_info_tv_services_speed' =>  get_post_meta($provider->ID, 'services_info_tv_services_speed', true),
					'services_info_tv_services_price' =>  get_post_meta($provider->ID, 'services_info_tv_services_price', true),				
					'services_info_tv_services_summary_features' =>  get_post_meta($provider->ID, 'services_info_tv_services_summary_features', true),
					'services_info_tv_services_summary_speed' =>  get_post_meta($provider->ID, 'services_info_tv_services_summary_speed', true),

					'services_info_internet_tv_bundles_channels' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_channels', true),
					'services_info_internet_tv_bundles_features' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_features', true),
					'services_info_internet_tv_bundles_speed' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_speed', true),
					'services_info_internet_tv_bundles_price' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_price', true),
					'services_info_internet_tv_bundles_summary_channel' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_summary_channel', true),
					'services_info_internet_tv_bundles_summary_features' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_summary_features', true),
					'services_info_internet_tv_bundles_summary_speed' =>  get_post_meta($provider->ID, 'services_info_internet_tv_bundles_summary_speed', true),


					
					 
				
				);
				$response['providers'][] = $provider_data;
			}	
			
			
		}
		return rest_ensure_response($response);
	}






// http://localhost/clients/cbl/wp-json/custom/v1/providers?internet_services=20001,20005

// https://cblproject.cablemovers.net/wp-json/custom/v1/providers?internet_services=20001,20005


function custom_area_zone_endpoint( $request ) {
	$params = $request->get_params();
	$state = isset( $params['state'] ) ? $params['state'] : 'ae';
    $args = array(
        'post_type' => 'area_zone',
        'posts_per_page' => -1, // Retrieve all posts
        'tax_query' => array(
            array(
                'taxonomy' => 'zone_state',
                'field' => 'slug',
                'terms' => $state, // California
            ),
        ),
    );

    $area_zones = new WP_Query( $args );

    if ( $area_zones->have_posts() ) {
        $data = array();

        while ( $area_zones->have_posts() ) {
            $area_zones->the_post();
            $data[] = array(
              
                'title' => get_the_title()
             
            );
        }

        return rest_ensure_response( $data );
    } else {
        return new WP_Error( 'no_area_zones', 'No area zones found in California.', array( 'status' => 404 ) );
    }
}

function register_custom_area_zone_endpoint() {
    register_rest_route( 'custom/v1', '/area-zones', array(
        'methods'  => 'GET',
        'callback' => 'custom_area_zone_endpoint',
    ) );
}

add_action( 'rest_api_init', 'register_custom_area_zone_endpoint' );




function city_area_zone_endpoint( $request ) {
	$params = $request->get_params();
	$state = isset( $params['state'] ) ? $params['state'] : 'ae';
    $args = array(
        'post_type' => 'area_zone',
        'posts_per_page' => -1, // Retrieve all posts
        'tax_query' => array(
            array(
                'taxonomy' => 'zone_city',
                'field' => 'slug',
                'terms' => $state, // California
            ),
        ),
    );

    $area_zones = new WP_Query( $args );

    if ( $area_zones->have_posts() ) {
        $data = array();

        while ( $area_zones->have_posts() ) {
            $area_zones->the_post();
            $data[] = array(
              
                'title' => get_the_title()
             
            );
        }

        return rest_ensure_response( $data );
    } else {
        return new WP_Error( 'no_area_zones', 'No area zones found in California.', array( 'status' => 404 ) );
    }
}

function register_city_area_zone_endpoint() {
    register_rest_route( 'custom/v1', '/area-zones-city', array(
        'methods'  => 'GET',
        'callback' => 'city_area_zone_endpoint',
    ) );
}

add_action( 'rest_api_init', 'register_city_area_zone_endpoint' );


//custom/v1/area-zones

// http://localhost/clients/cbl/wp-json/custom/v1/area-zones
// https://cblproject.cablemovers.net/wp-json/custom/v1/area-zones?state=ca

//https://cblproject.cablemovers.net/wp-json/custom/v1/area-zones-city


// Create a custom REST API endpoint to get states and cities
function get_states_and_cities_data() {
    $args = array(
        'post_type' => 'area_zone',
        'posts_per_page' => 1000,
    );

    $query = new WP_Query($args);
    $states_and_cities = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $state_terms = get_the_terms(get_the_ID(), 'zone_state');
            $city_terms = get_the_terms(get_the_ID(), 'zone_city');

            if ($state_terms && $city_terms) {
                foreach ($state_terms as $state_term) {
                    $state_name = $state_term->slug;

                    if (!isset($states_and_cities[$state_name])) {
                        $states_and_cities[$state_name] = array();
                    }
					foreach ($city_terms as $city_term) {
                        $city_name = $city_term->slug;

                        // Check if the city is not already in the array for the current state
                        if (!in_array($city_name, $states_and_cities[$state_name])) {
                            $states_and_cities[$state_name][] = $city_name;
                        }
                    }
                }
            }
        }

        wp_reset_postdata();
    }

    return $states_and_cities;
}

// Register the custom REST API endpoint
function register_states_and_cities_endpoint() {
    register_rest_route('custom/v1', '/states-cities', array(
        'methods' => 'GET',
        'callback' => 'get_states_and_cities_data',
    ));
}

add_action('rest_api_init', 'register_states_and_cities_endpoint');

//https://cblproject.cablemovers.net/wp-json/custom/v1/states-cities






$post_id = 42505;  // Replace with the actual post ID
$internet_services_value = ['70769','70734','70774','70778','70736','70773','70544','70740','70757','70772','70780','70788','70813','70803','70514','70729','70752','70801','70776','70721','70777','70725','70538','70770','70392','70737','70836','70719','70346','70710','70819','70767','70812','70811','70764','70814','70785','70820','70807','70714','70791','70706','70805','70815','70802','70806','70809','70808','70817','70816','70810','70726','02864','02830','02895','02896','44147','44138','44131','44116','44126','44129','44134','44130','44107','74948','72769','72761','72751','72734','72722','72736','72921','72947','72952','72946','72934','74902','74932','72944','72936','72941','72937','72940','72938','72945','74954','72744','72959','72730','72753','72768','72774','72739','72905','72727','72719','72718','74901','72923','72714','72916','72745','72715','72908','72956','72904','72903','72901','72756','72704','72703','72712','72758','72762','72701','72764','32610','32611','32615','32603','32609','32641','32606','32669','32601','32653','32607','32605','32608','06410','06450','06451','06109','06479','06016','06026','06035','06042','06060','06067','06073','06074','06078','06088','06090','06093','06096','06082','06489','06033','06040','06111','06071','06076','66748','66749','66711','66712','66735','66756','66762','66733','66763','66783','70526','70504','70528','70533','70548','70552','70512','70584','70517','70582','70578','70583','70555','70529','70510','70560','70520','70518','70507','70501','70563','70592','70503','70506','70508','89122','89121','89142','89120','89158','89178','89141','89179','89161','89123','89139','89183','89129','89128','89124','89032','89052','89012','89074','89014','89011','89015','89002','89081','89084','89030','89085','89086','89104','89103','89102','89101','89169','89109','89110','89115','89156','89108','89107','89106','89131','89130','89166','89143','89149','89134','89145','89135','89138','89144','89117','89147','89146','89148','89113','89119','89118','89191','89005','89044','89019','89031','92697','92651','92676','92603','92617','92604','92624','92629','90274','92657','92614','92673','92610','90275','92660','92782','92606','92612','92602','92675','92653','92691','92692','92625','92679','92694','92705','92630','92618','92656','92688','92620','90731','92677','31207','31052','31050','31025','31047','31069','31098','31046','31008','31020','31028','31220','31201','31093','31216','31217','31088','31211','31210','31206','31005','31204','32509','32536','32539','32541','32542','32544','32548','32567','32569','32578','32579','32547','32502','32501','32534','32505','32533','32504','32506','32507','32526','32503','32514','70030','70057','70080','70036','70067','70129','70040','70086','70116','70031','70071','70052','70085','70039','70113','70128','70127','70079','70131','70126','70075','70032','70117','70130','70092','70125','70119','70087','70112','70070','70122','70047','70062','70114','70124','70118','70121','70006','70053','70043','70002','70115','70094','70056','70123','70058','70005','70001','70065','70003','70072','23502','23503','23504','23505','23507','23508','23509','23510','23511','23513','23517','23523','23529','23551','23460','23461','23186','23662','23168','23185','23188','23690','23692','23693','23696','23061','23062','23072','23011','23089','23140','23156','23518','74857','73045','73121','73151','73149','73150','73019','73104','73036','73165','73141','73129','73020','73102','73169','73131','73145','73134','73173','73128','73117','73108','73105','73103','73179','73139','73127','73111','73106','73122','73142','73116','73109','73135','73064','73008','73114','73119','73115','73118','73132','73069','73162','73159','73012','73107','73120','73170','73072','73112','73071','73013','73160','73099','68116','68164','68022','68154','68007','68118','68142','68010','68104','68134','68122','68152','68111','68112','68110','68131','68102','68107','68105','68108','68106','68132','68117','68127','68124','68114','68135','68137','68144','68130','68064','68069','68178','68182','68198','51501','51503','51510','51526','68123','68005','68133','68147','68157','68113','68046','68136','68128','68028','68138','34482','34474','34475','34479','34470','34471','34480','32439','32550','85392','85323','85353','85042','85040','85034','85035','85043','85037','85033','85027','85050','85024','85054','85083','85085','85396','85225','85224','85295','85298','85297','85308','85310','85338','85041','85009','85007','85004','85340','85355','85207','85205','85345','85381','85142','85255','85262','85266','85351','85335','85373','85375','85363','85286','85226','85374','85379','85282','85281','85008','85006','85003','85283','85284','85248','85234','85296','85233','85302','85304','85306','85204','85206','85202','85210','85213','85201','85203','85254','85260','85259','85257','85258','85251','85250','85383','85382','85331','85015','85013','85014','85016','85012','85339','85395','85388','85387','85378','85303','85301','85305','85307','85212','85209','85208','85268','85253','85051','85019','85031','85017','85018','85028','85020','85021','85032','85022','85029','85023','85053','85048','85044','85045','85390','85377','85342','85263','85143','85140','85122','85132','85128','85326','85249','85215','02835','02837','02842','02871','02878','02840','02841','02915','02916','02917','02919','02921','02904','02906','02908','02903','02905','02907','02909','02912','02920','02860','02802','02814','02815','02824','02826','02828','02831','02838','02839','02857','02858','02859','02861','02863','02865','02910','02911','02914','02804','02808','02812','02813','02822','02832','02833','02852','02873','02874','02875','02879','02881','02882','02891','02892','02894','02898','02836','02806','02809','02885','02816','02817','02818','02827','02893','02886','02888','02889','23124','23141','23091','23108','23110','23181','24072','24079','24019','24077','24011','24012','24013','24014','24015','24016','24017','24018','24059','24179','92134','92182','92152','92096','91935','92135','91962','92055','92136','92067','92064','92003','91901','91978','91902','91914','92007','92029','92065','92075','92672','92173','91915','92081','92058','92106','92083','91945','92078','91941','92069','92139','92119','92019','91950','91932','92025','92110','92027','92120','92026','92040','92084','92102','91913','92107','92113','91942','92020','92054','92056','92021','92114','92057','92071','91977','92116','92101','92154','92105','92103','91911','92115','92024','91910','92104','93108','93013','93105','93067','93101','93103','93111','93110','93109','93106','93117','72601','72633','72611','72616','72631','72638','72632','66441','66512','66429','66535','66506','66409','66402','66539','66546','66533','66612','66617','66603','66542','66517','66615','66619','66608','66609','66618','66607','66610','66611','66616','66605','66606','66503','66604','66614','66502','85635','85650','85615','85616','85613','85630','85638','85609','85749','85748','85641','85719','85716','85705','85701','85710','85711','85713','85712','85715','85714','85730','85746','85706','85756','85708','85707','85629','85614','85622','85745','85721','85709','85645','85607','85747','74964','74338','74047','74039','67333','67337','67335','74072','74117','74011','74012','74429','74130','74126','74014','74041','74103','74131','74008','74116','74015','74119','74120','74108','74132','74128','74033','74133','74106','74017','74134','74145','74110','74146','74107','74104','74066','74129','74037','74127','74063','74135','74136','74115','74114','74137','74112','74055','74105','83333','83353','83340','83313','83348','83320','22030','22031','20120','20121','20124','20151','20171','22003','22027','22032','22033','22039','22041','22042','22043','22044','22066','22079','22101','22102','22124','22150','22151','22152','22153','22181','22182','22303','22306','22307','22308','22309','22310','22312','22315','22015','67065','67530','67544','67525','67564','67042','67010','67133','67144','67051','67156','67547','67846','67868','67801','67882','67114','67062','67135','67056','67117','67020','67151','67068','67035','67005','67460','67456','67464','67550','67124','67066','67561','67554','67579','67448','67470','67442','67026','67025','67050','67120','67149','67232','67055','67221','67030','67147','67110','67017','67227','67052','67223','67202','67505','67067','67228','67501','67210','67101','67215','67230','67060','67209','67220','67002','67235','67219','67502','67214','67205','67206','67226','67204','67216','67218','67207','67208','67213','67401','67217','67037','67211','67203','67212']; // Use square brackets to create an array
//add_post_meta($post_id, 'internet_services', $internet_services_value, true);
//update_post_meta($post_id, 'internet_services', $internet_services_value);






