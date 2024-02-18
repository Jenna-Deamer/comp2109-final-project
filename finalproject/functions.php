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

//setup footer widgets
//function customFooter (){
//    register_sidebar(array(
//        'name' =>__( 'Footer Widget Area One', 'customFooter'),
//        'id' => 'footer-widget-area-one',
//        'description' => __( 'The logo widget area', 'customFooter'),
//        'before_widget' => '<div class="logo-widget">',
//        'after_widget' => '</div>',
//    ));
//    register_sidebar(array(
//        'name' =>__( 'Footer Widget Area Two', 'customFooter'),
//        'id' => 'footer-widget-area-two',
//        'description' => __( 'The copyright widget area', 'customFooter'),
//        'before_widget' => '<div class="copyright-widget">',
//        'after_widget' => '</div>',
//    ));
//}
//add_action('widgets_init','customFooter');
//?>