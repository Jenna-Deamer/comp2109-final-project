<?php
/**
 * Template Name: Custom Account Template
 */
get_header();
$accountFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

?>

<main class="account-container">
    <section class="masthead" style="background-image: url('<?php echo esc_url($accountFeaturedImg[0]); ?>')">
        <div class="masthead-content container">
            <h1>My Account</h1>
        </div>
    </section>
    <section class="account-body container">
        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
    </section>

</main>

<?php
get_footer();
?>
