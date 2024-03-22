<?php
/**
 * Template Name: Custom Homepage
 * Template Post Type: page
 */
get_header();
?>

<main>
    <section class="heroSection" style="background-image: url('<?php echo wp_kses_post(get_field('hero_image')); ?>')">
        <div class="heroContent container">
            <h1><?php echo wp_kses_post(get_field('hero_header')); ?></h1>
            <h2><?php echo wp_kses_post(get_field('hero_sub_header')); ?></h2>
            <a href="#">View Courses</a>
        </div>
    </section>

    <section class="row reasonCardContainer">
        <article class="reasonCard col-lg-4 text-center">
            <i class="bi bi-cash-coin"></i>
            <h3>Reason 1</h3>
            <p><?php echo wp_kses_post(get_field('reason_card_text_one'))?></p>
        </article>
        <article class="reasonCard col-lg-4 text-center">
            <i class="bi bi-journal-bookmark-fill"></i>
            <h3>Reason 2</h3>
            <p><?php echo wp_kses_post(get_field('reason_card_text_two'))?></p>
        </article>
        <article class="reasonCard col-lg-4 text-center">
            <i class="bi bi-lightbulb"></i>
            <h3>Reason 3</h3>
            <p><?php echo wp_kses_post(get_field('reason_card_text_three'))?></p>
        </article>
    </section>

    <section class="featuredSection">
        <h2 id="featuredSectionHeader">Our Featured Courses</h2>
        <div class="courseCardContainer">
            <?php echo do_shortcode('[courseCards_shortcode]'); ?>
        </div>
        <section id="featuredShopLink">
            <h2 class="mb-4">Not seeing something you like?</h2>
            <a href="#" class="courseCardButton" ">Explore More Courses</a>
        </section>
    </section>

</main>

<?php
get_footer();
?>
