<?php
/**
 * @package avalara-products
 */
/*
Plugin Name: Avalara Products
Plugin URI:
Description: CPT and Settings specific to Avalara Custom Post Types and design modules
Version: 0.0.1
Author: Joel Bengson
Author URI: https://github.com/jbengson
License:

*/


require_once(ABSPATH . 'wp-includes/pluggable.php');

require_once (plugin_dir_path( __FILE__ ) . 'lib/avaform-toggle.php');  //Creates the custom fields used by both Products and Services CPT
require_once (plugin_dir_path( __FILE__ ) . 'lib/content-control-admin-panel.php');  //Creates the admin panel and associates it with posts and products
require_once (plugin_dir_path( __FILE__ ) . 'lib/design-module-defs.php');  //Holds the layout definitions for the admin panel

require_once (plugin_dir_path( __FILE__ ) . 'lib/products-admin-panel.php');  //Creates the admin panel and associates it with products
require_once (plugin_dir_path( __FILE__ ) . 'lib/products-cpt.php');  //Child class that creates the "Products" CPT

require_once (plugin_dir_path( __FILE__ ) . 'lib/services-admin-panel.php');  //Creates the admin panel and associates it with services
require_once (plugin_dir_path( __FILE__ ) . 'lib/services-cpt.php');  //Child class that creates the "Services" CPT

require_once (plugin_dir_path( __FILE__ ) . 'lib/whitepapers-admin-panel.php');  //Creates the admin panel and associates it with whitepapers
require_once (plugin_dir_path( __FILE__ ) . 'lib/whitepapers-cpt.php');  //Child class that creates the "Whitepapers" CPT

require_once (plugin_dir_path( __FILE__ ) . 'lib/videos-admin-panel.php');  //Creates the admin panel and associates it with videos
require_once (plugin_dir_path( __FILE__ ) . 'lib/videos-cpt.php');  //Child class that creates the "videos" CPT

require_once (plugin_dir_path( __FILE__ ) . 'lib/pages-admin-panel.php');  //Creates the admin panel and associates it with pages
require_once (plugin_dir_path( __FILE__ ) . 'lib/pages-cpt.php');  //Child class that extends the "pages" CPT


class avaProductsPlugin {

    protected $pluginPath;
    protected $pluginUrl;

    public function __construct()
    {
    	// Set Plugin Path
      $this->pluginPath = plugin_dir_path( __FILE__ );

      // Set Plugin URL
      $this->pluginUrl = WP_PLUGIN_URL . '/avalara-products';

      // Filter the single_template with our custom function
     	add_filter('single_template', array($this, 'enqueue_templates'));
     	add_filter( 'the_content', array($this,'remove_wpautop'), 0 );
     	add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles'));
    }

   /* Function to include our custom page single*/
  public function enqueue_templates($single) {
    global $wp_query, $post;

    /* Checks for single template by post type */
    if ($post->post_type == "products"){
        if(file_exists(plugin_dir_path( __FILE__ ) . 'templates/single-products.php'))
            return plugin_dir_path( __FILE__ ) . 'templates/single-products.php';
    } elseif ($post->post_type == "services"){
        if(file_exists(plugin_dir_path( __FILE__ ) . 'templates/single-services.php'))
            return plugin_dir_path( __FILE__ ) . 'templates/single-services.php';
    } elseif ($post->post_type == "research"){
        if(file_exists(plugin_dir_path( __FILE__ ) . 'templates/single-research.php'))
            return plugin_dir_path( __FILE__ ) . 'templates/single-research.php';
    } elseif ($post->post_type == "video"){
        if(file_exists(plugin_dir_path( __FILE__ ) . 'templates/single-video.php'))
            return plugin_dir_path( __FILE__ ) . 'templates/single-video.php';
    } else {
      return $single;
    }
	}

	/* Function for enqueuing custom products & services page styles */
	public function enqueue_styles() {
    wp_register_style('ava_products', plugins_url('assets/css/products.39ba18.min.css', __FILE__));
    wp_enqueue_style('ava_products');
  }

	public function remove_wpautop( $content )
	{
	    if ('products' === get_post_type()) {
		    remove_filter( 'the_content', 'wpautop' );
		    return $content;
		} else {
			return $content;
		}
	}

} // end avaProductsPlugin class

$avaProductsPlugin = new avaProductsPlugin();
$avaProductsPlugin -> avaProductsCpt = new avaProductsCpt;
$avaProductsPlugin -> avaServicesCpt = new avaServicesCpt;
$avaProductsPlugin -> avaWhitepapersCpt = new avaWhitepapersCpt;
$avaProductsPlugin -> avaVideosCpt = new avaVideosCpt;
$avaProductsPlugin -> avaPagesCpt = new avaPagesCpt;

$avaProductsPlugin -> avaFormToggle = new avaFormToggle;

$avaProductsPlugin -> avaContentControlAdminPanel = new avaContentControlAdminPanel;
$avaProductsPlugin -> avaProductsAdminPanel = new avaProductsAdminPanel;
$avaProductsPlugin -> avaServicesAdminPanel = new avaServicesAdminPanel;
$avaProductsPlugin -> avaWhitepapersAdminPanel = new avaWhitepapersAdminPanel;
$avaProductsPlugin -> avaVideosAdminPanel = new avaVideosAdminPanel;
$avaProductsPlugin -> avaPagesAdminPanel = new avaPagesAdminPanel;
