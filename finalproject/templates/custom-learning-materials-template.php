<?php
/**
 * Template Name: Custom Learning Materials Page
 * Template Post Type: page
 */
get_header();
$learningMaterialFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>
<main>
    <section class="masthead" style="background-image: url('<?php echo esc_url($learningMaterialFeaturedImg[0]); ?>')">
        <div class="masthead-content container">
            <h1><?php echo wp_kses_post(get_field('page_title')); ?></h1>
        </div>
    </section>

    <section class="learning-material-page row">
        <?php
        //get all learning material posts by matching slug
        $learning_materials_query = new WP_Query(array(
            'post_type' => 'learning_material',
            'posts_per_page' => -1,
        ));

        //if there are posts. loop through & display
        if ($learning_materials_query->have_posts()) :
            while ($learning_materials_query->have_posts()) : $learning_materials_query->the_post();
                // Get the post thumbnail (featured image)
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                ?>
                <article class="learning-material-post col-md-4 col-sm-6">
                    <?php if ($thumbnail_url) : ?>
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="learning-material-thumbnail">
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="learning-material-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </section>
</main>

<?php get_footer();?>