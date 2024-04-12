<?php
/**
 * Template Name: Learning Materials Single Post
 * * Template Post Type: learning_material
 */
get_header();
$materialFeaturedImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>

    <main class="single-material-post">
        <section class="masthead"  style="background-image: url('<?php echo esc_url($materialFeaturedImage[0]); ?>')">>
            <div class="masthead-content container">
            <h1><?php the_title(); ?></h1>
            </div>
        </section>
        <section class="single-material-post-container container">

            <div class="single-material-post-content">
                <?php the_content(); ?>
            </div>

        </section>
    </main>

<?php
get_footer();
?>
