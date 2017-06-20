<?php
/*
Pages CPT setup
*/

class avaPagesCpt extends avaProductsPlugin {

	public function __construct() {
		$options = get_option('ava_cc_content_options');
		if ( array_key_exists('pages', $options) && $options['pages'] == true ) {
			add_action( 'init', array($this, 'updatePagesCpt'));
		} else {
			remove_action( 'init', array($this, 'updatePagesCpt'));
		}
	}

	/*
	* Creating a function to update our CPT (no need to create pages as they already exist)
	*/

	public function updatePagesCpt() {

		// build the acf fcf based on available sections
		$options = get_option('ava_cc_page_options');

		$avaDesignModuleDefs = new avaDesignModuleDefs;

		$layouts = array();

		if(is_array($options)) {
			
			if ( array_key_exists('home-page-hero', $options) && $options['home-page-hero'] ) {
				$layouts[] = $avaDesignModuleDefs -> home_page_hero_layout();
			}
			if ( array_key_exists('home-page-value-prop', $options) && $options['home-page-value-prop'] ) {
				$layouts[] = $avaDesignModuleDefs -> home_page_value_prop_layout();
			}
			if ( array_key_exists('home-page-prod-svcs', $options) && $options['home-page-prod-svcs'] ) {
				$layouts[] = $avaDesignModuleDefs -> home_page_prod_svcs_layout();
			}
			if ( array_key_exists('partners', $options) && $options['partners'] ) {
				$layouts[] = $avaDesignModuleDefs -> partners_page_layout();
			}
			if ( array_key_exists('thank-you', $options) && $options['thank-you'] ) {
				$layouts[] = $avaDesignModuleDefs -> thank_you_layout();
			}
			if ( array_key_exists('about', $options) && $options['about'] ) {
				$layouts[] = $avaDesignModuleDefs -> contact_layout();
			}
			if ( array_key_exists('contact', $options) && $options['contact'] ) {
				$layouts[] = $avaDesignModuleDefs -> about_layout();
			}
			if ( array_key_exists('hero', $options) && $options['hero'] ) {
				$layouts[] = $avaDesignModuleDefs -> product_hero_layout();
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
			if ( array_key_exists('testimonial-hero-banner', $options) && $options['testimonial-hero-banner'] ) {
				$layouts[] = $avaDesignModuleDefs -> testimonial_hero_banner();
			}
			if ( array_key_exists('testimonial-hero-quote', $options) && $options['testimonial-hero-quote'] ) {
				$layouts[] = $avaDesignModuleDefs -> testimonial_hero_quote();
			}
			if ( array_key_exists('testimonial-quote-boxes', $options) && $options['testimonial-quote-boxes'] ) {
				$layouts[] = $avaDesignModuleDefs -> testimonial_quote_boxes();
			}
			if ( array_key_exists('testimonial-feature-quote', $options) && $options['testimonial-feature-quote'] ) {
				$layouts[] = $avaDesignModuleDefs -> testimonial_feature_quote();
			}
			if ( array_key_exists('testimonial-cta', $options) && $options['testimonial-cta'] ) {
				$layouts[] = $avaDesignModuleDefs -> testimonial_cta();
			}
		}

		$args = array (
			'key' => 'group_5835a90eec423',
			'title' => 'Page Elements',
			'fields' => array (
				array (
					'key' => 'field_5835a9176667b',
					'label' => 'Flexible Content',
					'name' => 'flexible_content',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 0,
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
						'value' => 'page',
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
