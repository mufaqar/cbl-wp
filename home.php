<?php /** Template Name: Home */ get_header();





// Get all states and cities from the "area_zone" custom post type.

function get_all_states_and_cities() {
    $args = array(
        'post_type' => 'area_zone',
        'posts_per_page' => -1,
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
                        $states_and_cities[$state_name][] = $city_term->name;
                    }
                }
            }
        }

        wp_reset_postdata();
    }

    return $states_and_cities;
}

// Example usage:
$states_and_cities = get_all_states_and_cities();

if (!empty($states_and_cities)) {
    foreach ($states_and_cities as $state => $cities) {
        echo '<h2>State: ' . $state . '</h2>';
        foreach ($cities as $city) {
            echo $city . '<br>';
        }
        echo '<br>';
    }
} else {
    echo 'No states and cities found.';
}





?>




<?php get_footer()?>

