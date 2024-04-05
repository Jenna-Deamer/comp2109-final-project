<?php
/**
 * Template Name: Custom Contact page
 * Template Post Type: page
 */
get_header();
$contactFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>
<main>
    <section class="masthead" style="background-image: url('<?php echo esc_url($contactFeaturedImg[0]); ?>')">
        <div class="masthead-content container">
            <h1><?php echo wp_kses_post(get_field('page_title')); ?></h1>
        </div>
    </section>

    <section class="contact-form-container container">

        <div class="form-wrapper">
            <?php
            // Manually process WPForms shortcode
            echo do_shortcode('[wpforms id="140"]');
            ?>
        </div>

    </section>
</main>

<?php
get_footer();
?>
