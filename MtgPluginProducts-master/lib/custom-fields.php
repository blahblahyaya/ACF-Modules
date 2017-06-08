<?php
/*
Custom fields setup
*/

/*ACF Product custom fields, this function auto-registers the necessary fields so no wp-admin setup is required*/
function ava_add_acf_product_fields() {

		acf_add_local_field_group(array (
			'key' => 'group_57c8c35529b27',
			'title' => 'Products',
			'fields' => array (
				array (
					'key' => 'field_57c8c50ea2c59',
					'label' => 'Product Description',
					'name' => 'product_description',
					'type' => 'text',
					'instructions' => 'Short description of product displayed	in the hero product header.',
					'required' => 1,
					'conditional_logic' => 0,
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
				array (
					'key' => 'field_57c8c35f38de5',
					'label' => 'Product Info',
					'name' => 'product_info',
					'type' => 'textarea',
					'instructions' => 'This is the larger text block between the hero and the features section',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => 'wpautop',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_57c8c3d538de6',
					'label' => 'Product Feature',
					'name' => 'product_feature',
					'type' => 'repeater',
					'instructions' => 'Use this to add the product features (up to 6 can be added)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => '',
					'max' => 6,
					'layout' => 'row',
					'button_label' => 'Add Row',
					'sub_fields' => array (
						array (
							'key' => 'field_57c8c3e938de7',
							'label' => 'Feature Title',
							'name' => 'feature_title',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
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
						array (
							'key' => 'field_57c8c45138de8 ',
							'label' => 'Feature Description',
							'name' => 'feature_description',
							'type' => 'textarea',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'maxlength' => '',
							'rows' => '',
							'new_lines' => 'wpautop',
							'readonly' => 0,
							'disabled' => 0,
						),
					),
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
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

		

}
add_action('acf/init', 'ava_add_acf_product_fields');

/*Avaform config custom fields, this function auto-registers the necessary fields so no wp-admin setup is required*/
function ava_add_avaform_config_fields() {

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
add_action('acf/init', 'ava_add_avaform_config_fields');
