<?php
/** Template Name: Result */

get_header();

$zip_query = $_REQUEST['zipcode'];







$args = array(
    'post_type' => 'providers',    
    'meta_query' => array(
        array(
            'key' => 'internet_serices',
           // 'value' => array('15401'),
            'value' => $zip_query,
            'compare' => 'LIKE'
       ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) { $query->the_post(); $Pid = get_the_ID(); $Zid = get_the_title($Pid);      


        $post_title = $zip_query; 
        $post_type = 'area_zone'; 
        $post = get_page_by_title( $post_title, OBJECT, $post_type );
        if ( $post ) {
            $post_id = $post->ID;
        } else {
            echo 'Post not found.';
        }





        $zone_city = get_provider_terms($post_id,'zone_city');


     


        // Your post content display code here
        ?>
        <h2> <?php the_title() ?></h2>
        <h2> <?php echo $Pid; ?></h2>

        City : <?php echo $zone_city ?> | State : state  | 	Area Code  |   County

      <?php


      

      
        

        ?>
             
        
        <hr/>


        <?php



 
    }
    wp_reset_postdata(); // Reset post data to the main query
} else {
    echo 'No posts found';
}



get_footer();  ?>