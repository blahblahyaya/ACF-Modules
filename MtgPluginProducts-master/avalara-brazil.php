<?php
/**
 * @package avalara-products
 */
/*
Plugin Name: Avalara Products
Plugin URI: 
Description: CPT and Settings specific to Avalara Products
Version: 0.0.1
Author: Joel Bengson
Author URI: https://github.com/jbengson
License:

*/


require_once(ABSPATH . 'wp-includes/pluggable.php');
require_once (plugin_dir_path( __FILE__ ) . 'lib/products-cpt.php');  //Creates the "Products" CPT 
require_once (plugin_dir_path( __FILE__ ) . 'lib/custom-fields.php');  //Creates the custom fields used by both Products and Services CPT



/* Filter the single_template with our custom function*/
add_filter('single_template', 'ava_custom_templates');
function ava_custom_templates($single) {
    global $wp_query, $post;

    /* Checks for single template by post type */
    if ($post->post_type == "products"){
        if(file_exists(plugin_dir_path( __FILE__ ) . 'templates/single-products.php')) 
            return plugin_dir_path( __FILE__ ) . 'templates/single-products.php';
    } else {
    return $single;
	}
}



/* Function for enqueuing Avalara Products custom styles */
function ava_products_add_styles() {
	if ( 'products' == get_post_type()) {
		wp_register_style('ava_products', plugins_url('assets/css/products.css', __FILE__));
		wp_enqueue_style('ava_products');
	}
}
add_action( 'wp_enqueue_scripts', 'ava_products_add_styles' ); 

add_filter( 'the_content', 'ava_products_remove_wpautop', 0 );
function ava_products_remove_wpautop( $content )
{
    if ('products' === get_post_type()) {
	    remove_filter( 'the_content', 'wpautop' );
	    return $content;
	} else {
		return $content;
	}
}
