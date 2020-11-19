<?php
#Load CSS
function load_css(){
    wp_register_style(
        'bootstrap',
        get_template_directory_uri().'/css/bootstrap.min.css',
        [],
        false,
        'all'
    );

    wp_enqueue_style('bootstrap');

    wp_register_style(
        'main',
        get_template_directory_uri().'/css/main.css',
        [],
        false,
        'all'
    );

    wp_enqueue_style('main');
}

add_action( 'wp_enqueue_scripts', 'load_css');

#Load JS
function load_js(){
    wp_enqueue_script('jquery ');

    wp_register_script(
        'bootstrap',
        get_template_directory_uri().'/js/bootstrap.min.js',
        'jquery',
        false,
        true
    );

    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'load_js');

#Theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');

#Menus

register_nav_menus( 
    array(
        'Main-Menu' => "Main menu location",
        'Footer_Menu' => " Footer menu location"
    )
);

#Excerpt

function wpdocs_custom_excerpt_length(){
    return 70;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length');

// function wpdocs_excerpt_more( $more ) {
//     return '[.....]';
// }
// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function wpdocs_excerpt_more() {
    return ' ';       
}

add_filter('excerpt_more', 'wpdocs_excerpt_more');


#Custom Image Sizes
add_image_size( 'blog-large', 800, 600, false);
add_image_size( 'blog-small', 300, 200, true);