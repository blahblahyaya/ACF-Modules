<?php

class avaServicesAdminPanel extends avaProductsPlugin {

	public function __construct() {
		add_action("admin_menu", array($this, "add_services_menu_item"));
		add_action("admin_init", array($this, "display_services_fields"));
	}

	public function services_settings() {
		// check if the user have submitted the settings
	  if (isset($_GET['settings-updated'])) {
	    add_settings_error('wporg_messages', 'wporg_message', __('Settings Saved', 'wporg'), 'updated');
	  }
	  settings_errors('wporg_messages');
	  ?>
			<div class="wrap">
					<h1>Content Control</h1>
					<form method="post" action="options.php">
						<?php
							settings_fields( 'cc-services-options' );
							do_settings_sections( 'cc-services-options' );
							submit_button();
						?>
					</form>
			</div>
	  <?php
	}

	public function display_the_hero_element()
	{
		$options = get_option('ava_cc_service_options');
		?>
			<input type="checkbox" name="ava_cc_service_options[hero]" value="1" <?php checked(1, $options['hero'], true); ?> />
		<?php
	}

	public function display_description_element()
	{
		$options = get_option('ava_cc_service_options');
		?>
			<input type="checkbox" name="ava_cc_service_options[description]" value="1" <?php checked(1, $options['description'], true); ?> />
		<?php
	}

	public function display_features_element()
	{
		$options = get_option('ava_cc_service_options');
		?>
			<input type="checkbox" name="ava_cc_service_options[features]" value="1" <?php checked(1, $options['features'], true); ?> />
		<?php
	}

	public function display_video_element()
	{
		$options = get_option('ava_cc_service_options');
		?>
			<input type="checkbox" name="ava_cc_service_options[video]" value="1" <?php checked(1, $options['video'], true); ?> />
		<?php
	}

	public function display_whitepaper_hero_element()
	{
		$options = get_option('ava_cc_service_options');
		?>
			<input type="checkbox" name="ava_cc_service_options[whitepaper-hero]" value="1" <?php checked(1, $options['whitepaper-hero'], true); ?> />
		<?php
	}

	public function display_services_fields()
	{
		register_setting( 'cc-services-options', 'ava_cc_service_options' );

		add_settings_section("services-section", "Choose Design Modules to Enable for Services", array( $this, "section_callback"), "cc-services-options");

		add_settings_field("hero", "Include Product/Services Hero?", array( $this, "display_the_hero_element"), "cc-services-options", "services-section");
		add_settings_field("description", "Include Description?", array( $this, "display_description_element"), "cc-services-options", "services-section");
		add_settings_field("features", "Include Features?", array( $this, "display_features_element"), "cc-services-options", "services-section");
		add_settings_field("video", "Include Video?", array( $this, "display_video_element"), "cc-services-options", "services-section");
		add_settings_field("whitepaper-hero", "Include Whitepaper Hero?", array( $this, "display_whitepaper_hero_element"), "cc-services-options", "services-section");
	}

	public function add_services_menu_item()
	{
		$options = get_option('ava_cc_content_options');
		if ( array_key_exists('services', $options) && $options['services'] == true ) {
			add_submenu_page( 'content-control-panel', 'Services Options', 'Services', 'manage_options', 'cc-services-panel', array( $this, "services_settings") );
		}
	}
}
