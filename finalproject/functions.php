<?php
//nav setup
function WebsiteNavigation_theme_setup(){
    register_nav_menus(array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}
add_action( 'after_setup_theme','WebsiteNavigation_theme_setup');

//add support for featured image for posts
add_theme_support( 'post-thumbnails' );


//setup footer widget
function customFooter (){
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area One', 'customFooter'),
        'id' => 'footer-widget-area-one',
        'description' => __( 'The logo widget area', 'customFooter'),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Two', 'customFooter'),
        'id' => 'footer-widget-area-two',
        'description' => __( 'The contact widget area', 'customFooter'),
        'before_widget' => '<div class="copyright-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Three', 'customFooter'),
        'id' => 'footer-widget-area-three',
        'description' => __( 'The other content widget area', 'customFooter'),
        'before_widget' => '<div class="content-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Four', 'customFooter'),
        'id' => 'footer-widget-area-four',
        'description' => __( 'The copyright widget area', 'customFooter'),
        'before_widget' => '<div class="copyright-widget">',
        'after_widget' => '</div>',

    ));
}
//add custom footer
add_action('widgets_init','customFooter');

//custom post-type

//set custom post-type

/*
function courseCards_shortcode() {
    $products_per_page = is_front_page() ? 3 : 8; // Limit to 3 on the homepage, otherwise default to 8
    $query = new WP_Query(array('post_type' => 'product', 'posts_per_page' => $products_per_page));
    while ($query->have_posts()) : $query->the_post();
    //enable use of product var
        global $product;
        // Get tags
        $tags = get_the_terms($product->get_id(), 'product_tag');
        // Get categories
        $categories = get_the_terms($product->get_id(), 'product_cat');
        //get image
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'full');
        ?>
        <div class="courseCard">
            <img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <div class="courseCardBody">
                <a href="<?php echo get_permalink(); ?>" class="cardHeading"> <h3><?php echo get_the_title(); ?></h3> </a>

                <div class="courseCardDescription">
                    <p><?php echo wp_kses_post($product->get_short_description()); ?></p>
                </div>

    <p>Categories:
        <?php
        //loop through all category & tags, for grey bg styles
        foreach ($categories as $category) {
            echo '<a href="' . get_term_link($category) . '" class="categoryBox">' . $category->name . '</a>';
        }
        ?>
    </p>
<div class="tagsWrapper">
    <p>Tags:
        <?php
        foreach ($tags as $tag) {
            echo '<a href="' . get_term_link($tag) . '" class="tagBox">' . $tag->name . '</a>';
        }
        ?>
    </p>
</div>
</div>


            <div class="courseCardFooter">
                <p><strong>Price:</strong> <?php echo $product->get_price_html(); ?></p>

                <button class="courseCardButton" data-product_id="<?php echo $product->get_id(); ?>"> Add to Cart</button>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata();
}



// Register Shortcode
add_shortcode('courseCards_shortcode', 'courseCards_shortcode');
*/


//Featured Shortcode
function featuredCourses_shortcode()
{
    $products_per_page = 3; // Limit to 3 featured products

    // Query products with the 'featured' tag
    $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => $products_per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tag',
                'field' => 'slug',
                'terms' => 'featured',
            ),
        ),
    );

    $query = new WP_Query( $query_args );

    while ( $query->have_posts() ) : $query->the_post();
        global $product;

        $tags = get_the_terms( $product->get_id(), 'product_tag' );
        $categories = get_the_terms( $product->get_id(), 'product_cat' );
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'full' );
        ?>


            <?php wc_get_template_part( 'content', 'product' ); ?>


    <?php endwhile;
    wp_reset_postdata();
}

// Register Shortcode
add_shortcode('featuredCourses_shortcode', 'featuredCourses_shortcode');




// adding woocommerce support to our theme
function customtheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );
function enqueue_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' ); }
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );
//?>