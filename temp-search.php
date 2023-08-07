<?php
 /*  Template Name:  Search  Page */

get_header(); ?>

<div class="custom-search-form">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label>
            <span class="screen-reader-text">Search for:</span>
            <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>"
                name="s">
        </label>
        <button type="submit" class="search-submit"><span class="screen-reader-text">Search</span></button>
    </form>
</div>




<?php get_footer(); ?>