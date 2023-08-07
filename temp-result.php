<?php
/** Template Name: Result */

get_header();

$query = $_REQUEST['zipcode'];




$args = array(
    'post_type' => 'providers',    
    'meta_query' => array(
        array(
            'key' => 'internet_serices',
           // 'value' => array('15401'),
            'value' => $query,
            'compare' => 'LIKE'
       ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) { $query->the_post(); $Pid = get_the_ID()


        // Your post content display code here
        ?>
        <h2> <?php the_title() ?></h2>
        <h2> <?php $Pid; ?></h2> <hr/>

        <?php
 
    }
    wp_reset_postdata(); // Reset post data to the main query
} else {
    echo 'No posts found';
}



get_footer();  ?>