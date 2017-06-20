<?php
/*
Display avaform toggle and shortcode configuration
*/
class avaFormToggle extends avaProductsPlugin {

	public function __construct() {
		add_action('acf/init', array($this, 'register_fields'));
	}

	/*Avaform config custom fields, this function auto-registers the necessary fields so no wp-admin setup is required*/
	public function register_fields() {

		acf_add_local_field_group(array (
			'key' => 'group_57d2de048824d',
			'title' => 'AvaForm Config',
			'fields' => array (
				array (
					'key' => 'field_57d2de6f59737',
					'label' => 'Show AvaForm',
					'name' => 'show_avaform',
					'type' => 'true_false',
					'instructions' => 'Toggles display of AvaForm',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_57d2decd59738',
					'label' => 'AvaForm Shortcode',
					'name' => 'avaform_shortcode',
					'type' => 'text',
					'instructions' => 'Insert the avaform shortcode here with desired settings, for example: [avaform v=3 connectors=true poi_menu="false"]',
					'required' => 1,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_57d2de6f59737',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
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
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'services',
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '(these settings are page specific)',
		));
	}
}