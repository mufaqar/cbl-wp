<?php


// code for updates  internet_services with custom index

// // // Function to generate a random string
// function generateRandomString($length) {
//     $characters = 'abcdefghijklmnopqrstuvwxyz';
//     $randomString = '';
//     $max = strlen($characters) - 1;
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $max)];
//     }
//     return $randomString;
// }
// $args = array(
//     'post_type' => 'providers', // Adjust the post type as needed
//     'posts_per_page' => -1, // Retrieve all posts
// );

// $query = new WP_Query($args);

// if ($query->have_posts()) {
//     while ($query->have_posts()) {
//         $query->the_post();
//         $post_id = get_the_ID();
//         $values = get_post_meta( $post_id, 'internet_services', true);
//               $length = 5;
//             $modifiedValues = array();
//             foreach ($values as $value) {
//                 $randomKey = generateRandomString($length);
//                 $modifiedValues[$randomKey] = $value;
//             }
//             update_post_meta($post_id, 'internet_services', $modifiedValues);
//     }

//     wp_reset_postdata();
// }



?>
