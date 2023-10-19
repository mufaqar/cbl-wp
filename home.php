<?php /** Template Name: Home */ get_header();






// Define the old and new meta key names
$old_meta_key = 'services_info_tv_services_Price';
$new_meta_key = 'services_info_tv_services_price';

// Query for the posts you want to update (you can modify the query as needed)
$args = array(
    'post_type' => 'providers', // Change this to the post type you want to update
    'posts_per_page' => -1, // Retrieve all posts
);

$posts = new WP_Query($args);

if ($posts->have_posts()) {
    while ($posts->have_posts()) {
        $posts->the_post();

        // Get the current value of the old meta key
        $old_meta_value = get_post_meta(get_the_ID(), $old_meta_key, true);

        if ($old_meta_value) {
            // Update the post with the new meta key
            update_post_meta(get_the_ID(), $new_meta_key, $old_meta_value);

            // Remove the old meta key
            delete_post_meta(get_the_ID(), $old_meta_key);
        }
    }

    // Reset post data to the main loop
    wp_reset_postdata();

    echo 'Meta keys updated successfully.';
} else {
    echo 'No posts found.';
}














        ?>

        <?php query_posts(array(
            'post_type' => 'providers',
            'posts_per_page' => 5,
			'order' => 'asc'
			
        )); 
		if (have_posts()) :  while (have_posts()) : the_post();
        
            $price =  get_post_meta(get_the_ID(), 'services_info_tv_services_price', true);
        ?>
        <h2> <?php the_title()?></h2>

        <p> <?php  

        // Get all custom fields for the current post
        $custom_fields = get_post_custom();

        // Loop through and display the custom fields
        foreach ($custom_fields as $key => $value) {
            echo '<p><strong>' . $key . ':</strong> ' . implode(', ', $value) . '</p>';
        }

        // You can also get specific custom fields by key if needed
        $specific_field = get_post_meta(get_the_ID(), 'your_custom_field_key', true);
        if ($specific_field) {
            echo '<p><strong>Your Specific Custom Field:</strong> ' . $specific_field . '</p>';
        }
	
      ?></p>
	
		  <?php endwhile; wp_reset_query(); else : ?>
			<h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
	        <?php endif; ?> 
 




<?php get_footer()?>

