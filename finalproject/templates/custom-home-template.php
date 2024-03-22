<?php
/**
 * Template Name: Custom Homepage
 * Template Post Type: page
 */
?>

<main>
    <section class="heroSection" style="background-image: url('<?php echo wp_kses_post(get_field('hero_image')); ?>')">
        <?php get_header(); ?>
        <div class="heroContent container">
            <h1><?php echo wp_kses_post(get_field('hero_header')); ?></h1>
            <h2><?php echo wp_kses_post(get_field('hero_sub_header')); ?></h2>
            <a href="#">View Courses</a>
        </div>
    </section>

<section class="row reasonCardContainer">
    <article class="reasonCard col-lg-4 text-center">
            <i>Reason Icon</i>
        <h3>Reason 1</h3>
        <p>Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim  veniam</p>
    </article>
    <article class="reasonCard col-lg-4 text-center">
        <i>Reason Icon</i>
        <h3>Reason 2</h3>
        <p>Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim  veniam</p>
    </article>
    <article class="reasonCard col-lg-4 text-center">
        <i>Reason Icon</i>
        <h3>Reason 3</h3>
        <p>Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim  veniam</p>
    </article>
</section>
    <section class="container">
        <h2 id="featuredSectionHeader">Our Featured Courses</h2>
        <div class="courseCardContainer">
            <?php echo do_shortcode('[courseCards_shortcode]'); ?>

        </div>
        <section id="featuredShopLink">
            <h2>Not seeing something you like?</h2>
            <a href="#" class="btn btn-info">Explore More Courses</a>
        </section>
    </section>

</main>


<?php
get_footer();
?>
