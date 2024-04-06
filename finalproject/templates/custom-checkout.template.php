<?php
/**
 * Template Name: Custom Checkout Template
 */
get_header();
$checkoutFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>

<main class="checkout-container">
    <section class="masthead" style="background-image: url('<?php echo esc_url($checkoutFeaturedImg[0]); ?>')">
        <div class="masthead-content container">
            <h1>Checkout</h1>
        </div>
    </section>
    <section class="checkout-body container">
        <?php
        // Output WooCommerce checkout form
        echo do_shortcode('[woocommerce_checkout]');
        ?>
    </section>
</main>

<?php
get_footer();
?>
