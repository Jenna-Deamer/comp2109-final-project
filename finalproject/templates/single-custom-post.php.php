<?php
/**
 * Template Name: Single Custom Post Template
 * Post Type: post
 */
get_header();

// Get the current post's image
$featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<main>
    <section class="masthead">
       <h1>Category</h1>
    </section>
    <section class="category-about">

    </section>

    <section class="row container mx-auto related-products-container">

    </section>
</main>

<?php get_footer(); ?>
