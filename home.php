<?php /** Template Name: Home */ get_header();





// Get all states and cities from the "area_zone" custom post type with duplicates removed.
function get_all_states_and_cities() {
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
                    $state_name = $state_term->name;

                    if (!isset($states_and_cities[$state_name])) {
                        $states_and_cities[$state_name] = array();
                    }

                    foreach ($city_terms as $city_term) {
                        $city_name = $city_term->name;

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


get_all_states_and_cities();






?>




<?php get_footer()?>

