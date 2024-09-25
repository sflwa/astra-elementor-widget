<?php
/**
 * Plugin Name: Astra Custom Meta Options for Elementor
 * Description: Custom Elementor widget to modify Astra page options inside Elementor builder.
 * Version: 1.0
 * Author: South Florida Web Advisors using ChatGPT
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load Elementor widget after Elementor is loaded
function register_astra_meta_elementor_widget() {
    // Ensure Elementor and Astra are active
    if( did_action( 'elementor/loaded' ) && function_exists('astra_get_option') ) {
        require_once( __DIR__ . '/widgets/astra-meta-options.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Astra_Elementor_Meta_Widget() );
    }
}
add_action( 'elementor/widgets/widgets_registered', 'register_astra_meta_elementor_widget' );
