<?php 


function load_styles() {
    wp_enqueue_style( 'commonStyle', get_template_directory_uri() . '/style.css', false );
    wp_enqueue_style( 'homeCss', get_template_directory_uri() . '/CSS/home.css', false );
    wp_enqueue_style( 'singleCss', get_template_directory_uri() . '/CSS/single.css', false );
    wp_enqueue_style( 'kassaCss', get_template_directory_uri() . '/CSS/kassa.css', false );
//    wp_enqueue_style( 'animations', get_template_directory_uri() . './css/animation.css', false );
}
 
function load_scripts() {
//    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}  





//Widgets
register_sidebar([
    'name' => 'logo',
    'Description' => 'widget for logo',
    'id' => 'logo',
    "before_widget" => false,
]);

register_sidebar([
    'name' => 'search bar',
    'Description' => 'search bar',
    'id' => 'search_bar',
    "before_widget" => false,
]);


//add_action( 'wp_enqueue_scripts', 'load_scripts' );
add_action( 'wp_enqueue_scripts', 'load_styles' );
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('woocommerce');
add_theme_support("widgets");
add_theme_support( 'wp-block-styles' );

// Add support for full and wide align images.
add_theme_support( 'align-wide' );




//add_filter the_excerpt
function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
function wpdocs_excerpt_more( $more ) {
    return ' LÄS MER &#x21d2;';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );




/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );




function banantest() {
    ob_start();
    dynamic_sidebar("logo");
    $inspelning = ob_get_clean();
    return $inspelning;
}

add_shortcode("banan", "banantest");









?>