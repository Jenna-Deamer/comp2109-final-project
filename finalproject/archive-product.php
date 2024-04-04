<?php
get_header();
$shopFeaturedImg = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );
?>
    <section class="shop-masthead" style="background: url('<?php echo $shopFeaturedImg[0]; ?>');">
        <div class="shop-masthead-content">
            <h1 class="text-center">Explore Our Selection</h1>
        </div>
    </section>
    <section class="container pt-4">

            <?php
            do_action('woocommerce_before_shop_loop');
            echo do_shortcode('[products columns="3"]');
            do_action('woocommerce_after_shop_loop');
            ?>
    </section>
<?php
get_footer();
