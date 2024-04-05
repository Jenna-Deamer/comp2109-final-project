<?php
/**
 * Template Name: Custom About page
 * Template Post Type: page
 */
get_header();
$aboutFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>
<main>
    <section class="masthead" style="background-image: url('<?php echo esc_url($aboutFeaturedImg[0]); ?>')">
        <div class="masthead-content container">
            <h1><?php echo wp_kses_post(get_field('page_title')); ?></h1>
        </div>
    </section>
    <section class="about-page container">
        <h2><?php echo wp_kses_post(get_field('section_header_one')); ?></h2>
        <article class="row about-article">
            <div class="col-lg-6">
                <p><?php echo wp_kses_post(get_field('paragraph_one')); ?></p>
            </div>
            <figure class="col-lg-6 ">
                <?php echo wp_get_attachment_image(get_field('paragraph_image_one'), 'full'); ?>
            </figure>
        </article>
        <h2><?php echo wp_kses_post(get_field('section_header_two')); ?></h2>
        <article class="row about-article">
            <figure class="col-lg-6">
                <?php echo wp_get_attachment_image(get_field('paragraph_image_two'), 'full'); ?>
            </figure>
            <div class="col-lg-6">
                <p><?php echo wp_kses_post(get_field('paragraph_two')); ?></p>
            </div>
        </article>
    </section>
</main>
<?php
get_footer();
?>
