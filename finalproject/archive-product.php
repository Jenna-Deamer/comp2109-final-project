<?php
get_header();
$shopFeaturedImg = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );
?>
    <section class="shop-masthead" style="background: url('<?php echo $shopFeaturedImg[0]; ?>');">
        <div>
            <h1 class="text-center">Shop Page</h1>
        </div>
    </section>
    <section class="shopContainer">
        <?php
        do_action('woocommerce_before_shop_loop');
        echo do_shortcode ('[products limit="6" columns="3"]');
        do_action('woocommerce_after_shop_loop');
        ?>
    </section>
<?php
get_footer();
