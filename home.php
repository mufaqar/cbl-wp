<?php /** Template Name: Home */ get_header();
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

