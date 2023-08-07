<?php
/** Template Name: Result */

get_header();


$args = array(
    'post_type' => 'providers',    
    // 'meta_query' => array(
    //     array(
    //         'key' => 'internet_serices',
    //         'value' => array('01005'),
    //         'compare' => 'IN', 
    //    ),
    // ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        // Your post content display code here
        the_title();
 
    }
    wp_reset_postdata(); // Reset post data to the main query
} else {
    echo 'No posts found';
}



get_footer();  ?>