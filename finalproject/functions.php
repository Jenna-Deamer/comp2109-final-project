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
function custom_learning_material_post_type() {
    $labels = array(
        'name'                  => _x( 'Learning Materials', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Learning Material', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Learning Materials', 'text_domain' ),
        'name_admin_bar'        => __( 'Learning Material', 'text_domain' ),
        'archives'              => __( 'Learning Material Archives', 'text_domain' ),
        'attributes'            => __( 'Learning Material Attributes', 'text_domain' ),
        'all_items'             => __( 'All Learning Materials', 'text_domain' ),
        'add_new_item'          => __( 'Add New Learning Material', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Learning Material', 'text_domain' ),
        'edit_item'             => __( 'Edit Learning Material', 'text_domain' ),
        'update_item'           => __( 'Update Learning Material', 'text_domain' ),
        'view_item'             => __( 'View Learning Material', 'text_domain' ),
        'view_items'            => __( 'View Learning Materials', 'text_domain' ),
        'search_items'          => __( 'Search Learning Material', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into Learning Material', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Learning Material', 'text_domain' ),
        'items_list'            => __( 'Learning Materials list', 'text_domain' ),
        'items_list_navigation' => __( 'Learning Materials list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter Learning Materials list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Learning Material', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'learning_material', $args );
}
//set custom post type
add_action( 'init', 'custom_learning_material_post_type', 0 );


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

<?php
//Product Template Items Moved or Removed Hooks
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

remove_action('woocommerce_product_additional_information','wc_display_product_attributes',10);

remove_action('woocommerce_single_variation','woocommerce_single_variation',10);


//add information back in a different order
add_action('woocommerce_single_product_summary','woocommerce_template_single_title',10);
add_action('woocommerce_single_product_summary','woocommerce_template_single_price',15);
add_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',15);

// Remove sidebar
function remove_woocommerce_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'remove_woocommerce_sidebar' );




?>
