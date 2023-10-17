<?php /** Template Name: Home */ get_header();







// // Function to generate a random string
function generateRandomString($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $max)];
    }
    return $randomString;
}
$args = array(
    'post_type' => 'providers', // Adjust the post type as needed
    'posts_per_page' => -1, // Retrieve all posts
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $values = get_post_meta( $post_id, 'internet_services', true);
              $length = 5;
            $modifiedValues = array();
            foreach ($values as $value) {
                $randomKey = generateRandomString($length);
                $modifiedValues[$randomKey] = $value;
            }
            update_post_meta($post_id, 'internet_services', $modifiedValues);
    }

    wp_reset_postdata();
}











$params = array('99403,20001,01108,36608');

$values = array();

foreach ($params as $param) {
    $exploded_values = explode(',', $param);
    $trimmed_values = array_map('trim', $exploded_values);
    $values = array_merge($values, $trimmed_values);
}

print "<pre>";
    print_r($values);


    $meta_query = array(
        'relation' => 'OR',
    );
    foreach ($values as $value) {
        $meta_query[] = array(
            'key'     => 'internet_services',
            'value'   => $value,
            'compare' => 'LIKE',
        );
    }
    $query_args = array(
        'post_type' => 'providers',
       'meta_query' => $meta_query,
       'posts_per_page' => -1
    );

    print_r($query_args);
    $providers = get_posts($query_args);

    
    $response['providers'] = array();
    foreach ($providers as $provider) {

      
        echo '<h2>'.$provider->post_title .'</h2>';
       
    }	


?>




<?php get_footer()?>

