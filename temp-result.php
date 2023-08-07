<?php
 /*  Template Name:  Search  Result */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<div class="search-results">
    <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
    </article>
    <?php endwhile; ?>
</div>
<?php else : ?>
<p>No results found.</p>
<?php endif; ?>



<?php get_footer(); ?>