<?php /** Template Name: Home */ get_header();





$query_args = [
	'post_type' => 'providers', 
	'meta_query' => [
		'relation' => 'OR',
		[
			'key'   => 'internet_serices',
			'value' => '20001',
			'compare' => 'LIKE', 
		],
		[
			'key'   => 'internet_serices',
			'value' => '01005',
			'compare' => 'LIKE', 
		],
		[
			'key'   => 'internet_serices',
			'value' => '15401',
			'compare' => 'LIKE', 
		],
	],
];
$providers = get_posts($query_args);


print "<pre>";
print_r($providers);






?>




<?php get_footer()?>

