<?php /** Template Name: Home */ get_header();




$args = array(
    'post_type' => 'providers', // Replace with your actual post type
    'posts_per_page' => -1,   // Retrieve all posts
   
'meta_query' => array(
    'relation' => 'OR',
    array(
        'key' => 'internet_services',
        'value' => '99362',  // works for int-array
        'compare' => 'LIKE'
    ),
    array(
        'key' => 'internet_services',
        'value' => '99354',  // works for string-array
        'compare' => 'LIKE'
    ),
    array(
        'key' => 'internet_services',
        'value' => '84341',  // works for string-array
        'compare' => 'LIKE'
    ),

    
)
);

$providers_query = new WP_Query($args);

if ($providers_query->have_posts()) {
    while ($providers_query->have_posts()) {
        $providers_query->the_post();
        // Display or process each provider as needed
		
		// Display the title of each provider
        the_title();
        echo '<br>';
    }
    wp_reset_postdata(); // Reset the post data
} else {
    // No providers found
}









?>




<?php get_footer()?>

