<?php
/*
Products CPT setup
*/

class avaProductsCpt extends avaProductsPlugin {

	public function __construct() {
		$options = get_option('ava_cc_content_options');
		if ( array_key_exists('products', $options) && $options['products'] == true ) {
			add_action( 'init', array($this, 'createProductsCpt'));
		} else {
			remove_action( 'init', array($this, 'createProductsCpt'));
		}
	}

	/*
	* Creating a function to create our CPT
	*/

	public function createProductsCpt() {
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Products', 'Post Type General Name', 'avacptplugin' ),
			'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'avacptplugin' ),
			'menu_name'           => __( 'Products', 'avacptplugin' ),
			'parent_item_colon'   => __( 'Parent Product', 'avacptplugin' ),
			'all_items'           => __( 'All Products', 'avacptplugin' ),
			'view_item'           => __( 'View Product', 'avacptplugin' ),
			'add_new_item'        => __( 'Add New Product', 'avacptplugin' ),
			'add_new'             => __( 'Add New', 'avacptplugin' ),
			'edit_item'           => __( 'Edit Product', 'avacptplugin' ),
			'update_item'         => __( 'Update Product', 'avacptplugin' ),
			'search_items'        => __( 'Search Product', 'avacptplugin' ),
			'not_found'           => __( 'Not Found', 'avacptplugin' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'avacptplugin' ),
		);

	// Set other options for Custom Post Type

		$args = array(
			'label'               => __( 'Products', 'avacptplugin' ),
			'description'         => __( 'Product information', 'avacptplugin' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'revisions' ),
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies'          => array( '' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'rewrite' => array( 'slug' => 'products','with_front' => FALSE),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		// Registering your Custom Post Type
		register_post_type( 'products', $args );

		// build the acf fcf based on available sections
		$options = get_option('ava_cc_product_options');

		$layouts = array();

		if(is_array($options)) {
	
			$avaDesignModuleDefs = new avaDesignModuleDefs;

			if ( array_key_exists('hero', $options) && $options['hero'] ) {
				$layouts[] = $avaDesignModuleDefs -> product_hero_layout();
			}
			if ( array_key_exists('textbar', $options) && $options['textbar'] ) {
				$layouts[] = $avaDesignModuleDefs -> product_textbar_layout();
			}
			if ( array_key_exists('home-page-hero', $options) && $options['home-page-hero'] ) {
				$layouts[] = $avaDesignModuleDefs -> home_page_hero_layout();
			}
			if ( array_key_exists('whitepaper-hero', $options) && $options['whitepaper-hero'] ) {
				$layouts[] = $avaDesignModuleDefs -> whitepaper_hero_layout();
			}
			if ( array_key_exists('description', $options) && $options['description'] ) {
				$layouts[] = $avaDesignModuleDefs -> product_description_layout();
			}
			if ( array_key_exists('features', $options) && $options['features'] ) {
				$layouts[] = $avaDesignModuleDefs -> product_features_layout();
			}
			if ( array_key_exists('video', $options) && $options['video'] ) {
				$layouts[] = $avaDesignModuleDefs -> product_video_layout();
			}
		}

		$args = array (
			'key' => 'group_57fb25155ae83',
			'title' => 'Product Elements',
			'fields' => array (
				array (
					'key' => 'field_57fb2526ec822',
					'label' => 'Flexible Content',
					'name' => 'flexible_content',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'button_label' => 'Add Section',
					'min' => '',
					'max' => '',
					'layouts' => array (),
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'products',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		);

		// add in the layouts
		$args['fields'][0]['layouts'] = $layouts;

		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group($args);
		endif;
	}
}
