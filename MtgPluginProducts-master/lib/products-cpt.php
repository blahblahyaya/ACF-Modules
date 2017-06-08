<?php
/*
Products CPT setup
*/

// Our custom post type function
function ava_products_create_cpt() {

	register_post_type( 'products',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Products' ),
				'singular_name' => __( 'Product' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'products'),
		)
	);
	remove_post_type_support( 'products', 'editor' );
}
// Hooking up our function to theme setup
add_action( 'init', 'ava_products_create_cpt' );

/*
* Creating a function to create our CPT
*/

function ava_products_cpt() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Products', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Products', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Product', 'twentythirteen' ),
		'all_items'           => __( 'All Products', 'twentythirteen' ),
		'view_item'           => __( 'View Product', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Product', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Product', 'twentythirteen' ),
		'update_item'         => __( 'Update Product', 'twentythirteen' ),
		'search_items'        => __( 'Search Product', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Products', 'twentythirteen' ),
		'description'         => __( 'Product information', 'twentythirteen' ),
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

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'ava_products_cpt', 0 );