<?php
/**
* Template Name: Custom Homepage
* Template Post Type: page
*/
get_header();
?>

<main>
    <section class="hero-section" style="background-image: url('<?php echo wp_kses_post(get_field('hero_image')); ?>')">
        <div class="hero-content container">
            <h1><?php echo wp_kses_post(get_field('hero_header')); ?></h1>
            <h2><?php echo wp_kses_post(get_field('hero_sub_header')); ?></h2>
            <a href="#">View Courses</a>
        </div>
    </section>

    <section class="row reason-card-container">
        <article class="reason-card col-lg-4 text-center">
            <img src="/wp-content/themes/finalproject/assets/salary.png" alt="Salary Icon" width="50" height="50">
            <h3>Reason 1</h3>
            <p><?php echo wp_kses_post(get_field('reason_card_text_one'))?></p>
        </article>
        <article class="reason-card col-lg-4 text-center">
            <img src="/wp-content/themes/finalproject/assets/light-bulb.png" alt="light bulb Icon" width="50" height="50">
            <h3>Reason 2</h3>
            <p><?php echo wp_kses_post(get_field('reason_card_text_two'))?></p>
        </article>
        <article class="reason-card col-lg-4 text-center">
            <img src="/wp-content/themes/finalproject/assets/online-learning.png" alt="Online learning icon" width="50" height="50">
            <h3>Reason 3</h3>
            <p><?php echo wp_kses_post(get_field('reason_card_text_three'))?></p>
        </article>
    </section>

    <section class="featured-section">
        <h2 id="featured-section-header">Our Featured Courses</h2>
        <div class="featured-wrapper">
        <div class="course-card-container">
            <?php echo do_shortcode('[featuredCourses_shortcode]'); ?>
        </div>
        </div>
        <section id="featured-shop-link">
            <h2 class="mb-4">Not seeing something you like?</h2>
            <a href="#" class="featured-shop-button" ">Explore More Courses</a>
        </section>
    </section>

</main>

<?php
get_footer();
?>
