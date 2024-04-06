<?php
/**
 * Template Name: Custom Cart Template
 */
get_header();
$cartFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>

<main class="cart-container">
    <section class="masthead" style="background-image: url('<?php echo esc_url($cartFeaturedImg[0]); ?>')">
        <div class="masthead-content container">
            <h1><?php echo wp_kses_post(get_field('page_title')); ?></h1>
        </div>
    </section>
    <section class="cart-body container">
        <?php
        // Display WooCommerce cart content
        echo do_shortcode('[woocommerce_cart]');
        ?>
    </section>

</main>

<?php
get_footer();
?>
