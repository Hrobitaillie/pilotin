<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

defined( 'CHLD_THM_CFG_IGNORE_PARENT' ) or define( 'CHLD_THM_CFG_IGNORE_PARENT', TRUE );

// END ENQUEUE PARENT ACTION


add_action( 'wp_enqueue_scripts', 'my_scripts' );
function my_scripts() {
    wp_enqueue_script('mon-script-child', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array(), '3.9.1', true );
    wp_enqueue_script( 'scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js', array( 'gsap' ), '3.9.1', true );
}

function max_title_length( $title ) {
    $max = 100;
    if( strlen( $title ) > $max ) {
        return substr( $title, 0, $max ). "…";
    } else {
        return $title;
    }
}
     
add_filter( 'the_title', 'max_title_length');