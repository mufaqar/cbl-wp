<?php


function cptui_register_my_cpts() {

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
		"show_in_graphql" => false,
	];

	register_post_type( "providers", $args );

	/**
	 * Post Type: Zone.
	 */

	$labels = [
		"name" => esc_html__( "Zone", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Zone", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Zone", "custom-post-type-ui" ),
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
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "area_zone", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "area_zone", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Country.
	 */

	// $labels = [
	// 	"name" => esc_html__( "Country", "custom-post-type-ui" ),
	// 	"singular_name" => esc_html__( "Country", "custom-post-type-ui" ),
	// ];

	
	// $args = [
	// 	"label" => esc_html__( "Country", "custom-post-type-ui" ),
	// 	"labels" => $labels,
	// 	"public" => true,
	// 	"publicly_queryable" => true,
	// 	"hierarchical" => true,
	// 	"show_ui" => true,
	// 	"show_in_menu" => true,
	// 	"show_in_nav_menus" => true,
	// 	"query_var" => true,
	// 	"rewrite" => [ 'slug' => 'zone_country', 'with_front' => true, ],
	// 	"show_admin_column" => false,
	// 	"show_in_rest" => true,
	// 	"show_tagcloud" => false,
	// 	"rest_base" => "zone_country",
	// 	"rest_controller_class" => "WP_REST_Terms_Controller",
	// 	"rest_namespace" => "wp/v2",
	// 	"show_in_quick_edit" => false,
	// 	"sort" => false,
	// 	"show_in_graphql" => false,
	// ];
	// register_taxonomy( "zone_country", [ "area_zone" ], $args );

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
		"hierarchical" => true,
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
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "zone_city", [ "area_zone" ], $args );

	/**
	 * Taxonomy: State.
	 */

	$labels = [
		"name" => esc_html__( "State", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "State", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "State", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
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
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "zone_state", [ "area_zone" ], $args );

	/**
	 * Taxonomy: Area Code.
	 */

	$labels = [
		"name" => esc_html__( "Area Code", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Area Code", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "Area Code", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'zone_code', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "zone_code",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "zone_code", [ "area_zone" ], $args );

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
		"hierarchical" => true,
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
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "zone_county", [ "area_zone" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );