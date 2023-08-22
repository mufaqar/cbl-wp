<?php /** Template Name: Home */ get_header();





$query_args = [
	'post_type' => 'providers', // Use your custom post type name
	'meta_query' => [
		[
			'key'   => 'internet_serices',
			'value' => '01005',
			'compare' => 'LIKE', // Modify this as needed
		],
	],
];
$providers = get_posts($query_args);

print_r($providers);




  $args = array(
	'post_type'  => 'providers',
	'meta_query' => array(
		array(
			'key'   => 'internet_serices',
			'value' => '01005',
            'compare' => 'LIKE',
		)
	)
);

$providers = get_posts($args);

foreach ($providers as $provider) {
    echo get_the_title($provider->ID); // Output title
   
}




?>




<?php get_footer()?>

