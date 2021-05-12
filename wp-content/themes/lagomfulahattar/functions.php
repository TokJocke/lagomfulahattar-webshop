<?php

use DeliciousBrains\WPMDB\Free\UI\Template;


function load_styles_and_scripts()
{
    global $template;

    wp_register_style('indexStyle', get_template_directory_uri() . '/CSS/index.css', array(), "", false);
    wp_register_style('animations', get_template_directory_uri() . '/CSS/animation.css', array(), "", false);
    wp_register_style('styleForMyAcc', get_template_directory_uri() . '/CSS/myacc.css', array(), "", false);
    wp_register_style('commonStyle', get_template_directory_uri() . '/style.css', array(), "", false);
    wp_register_style('homeCss', get_template_directory_uri() . '/CSS/home.css', array(), "", false);
    wp_register_style('singleCss', get_template_directory_uri() . '/CSS/single.css', array(), "", false);
    wp_register_style( 'kontakta-oss', get_template_directory_uri() . '/CSS/kontakta-oss.css', array(), "", false );
    wp_register_style('policy', get_template_directory_uri() . '/CSS/policy.css', array(), "", false);
    wp_register_style('varukorg', get_template_directory_uri() . '/CSS/varukorg.css', array(), "", false);
    wp_register_style('widgetsAndIcons', get_template_directory_uri() . '/CSS/widgetsAndIcons.css', array(), "", false);
    wp_register_style( 'single-product', get_template_directory_uri() . '/CSS/single-product.css', array(), "", false );
    wp_register_style( 'archive-product', get_template_directory_uri() . '/CSS/archive-product.css', array(), "", false );
    wp_register_style('kassaCss', get_template_directory_uri() . '/CSS/kassa.css', array(), "", false);
    wp_register_style('butiker', get_template_directory_uri() . '/CSS/butiker.css', array(), "", false);
    
    wp_enqueue_style( 'commonStyle' );
    wp_enqueue_style( 'widgetsAndIcons' );
    
    if ( basename( $template ) === 'index.php' ) {
        wp_enqueue_style( 'indexStyle' );
        wp_enqueue_style( 'animations' );
        wp_enqueue_script('scripts', get_template_directory_uri() . '/scripts/main.js', array(), '1.0.0', true);

    }
    else if ( basename( $template ) === 'single-shop_page.php' ) {
        wp_enqueue_style( 'butiker' );
    }
    else if ( basename( $template ) === 'archive-product.php' ) {
        wp_enqueue_style( 'archive-product' );
    }
    else if ( basename( $template ) === 'single-product.php' ) {
        wp_enqueue_style( 'single-product' );
    }
    else if ( basename( $template ) === 'home.php' ) {
        wp_enqueue_style( 'homeCss' );
    }
    else if ( basename( $template ) === 'page-kontakta-oss.php' ) {
        wp_enqueue_style( 'kontakta-oss' );
    }
    else if ( basename( $template ) === 'page-mitt-konto.php' ) {
        wp_enqueue_style( 'styleForMyAcc' );
    }
    else if ( basename( $template ) === 'page-kassan.php' ) {
        wp_enqueue_style( 'kassaCss' );
    }
    else if ( basename( $template ) === 'page-varukorg.php' ) {
        wp_enqueue_style( 'varukorg' );
    }
    else if ( basename( $template ) === 'page-integritetspolicy.php' ) {
        wp_enqueue_style( 'policy' );
    }
    else if ( basename( $template ) === 'single.php' ) {
        wp_enqueue_style( 'singleCss' );
    }

}


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)
{

    return $fields;
}


//Short code functions





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


register_sidebar([
    'name' => 'footer top left',
    'Description' => 'footer top left area',
    'id' => 'footer_top_left',
    "before_widget" => false,
]);

register_sidebar([
    'name' => 'footer top right',
    'Description' => 'footer top right area',
    'id' => 'footer_top_right',
    "before_widget" => false,
]);


add_action('wp_enqueue_scripts', 'load_scripts');
add_action('wp_enqueue_scripts', 'load_styles');
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('woocommerce');
add_theme_support("widgets");
add_theme_support('wp-block-styles');


// Add support for full and wide align images.

//ADD shortcodes

add_theme_support('align-wide');

//add_filter the_excerpt
function wpdocs_custom_excerpt_length($length)
{
    return 40;
}
function wpdocs_excerpt_more($more)
{
    return ' LÄS MER &#x21d2;';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);




/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});
