<?php

class avaWhitepapersAdminPanel extends avaProductsPlugin {

	public function __construct() {
		add_action("admin_menu", array($this, "add_whitepapers_menu_item"));
		add_action("admin_init", array($this, "display_whitepapers_fields"));
	}

	public function whitepapers_settings() {
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
							settings_fields( 'cc-whitepapers-options' );
							do_settings_sections( 'cc-whitepapers-options' );
							submit_button();
						?>
					</form>
			</div>
	  <?php
	}

	public function display_the_hero_element()
	{
		$options = get_option('ava_cc_whitepaper_options');
		?>
			<input type="checkbox" name="ava_cc_whitepaper_options[hero]" value="1" <?php checked(1, $options['hero'], true); ?> />
		<?php
	}

	public function display_description_element()
	{
		$options = get_option('ava_cc_whitepaper_options');
		?>
			<input type="checkbox" name="ava_cc_whitepaper_options[description]" value="1" <?php checked(1, $options['description'], true); ?> />
		<?php
	}

	public function display_features_element()
	{
		$options = get_option('ava_cc_whitepaper_options');
		?>
			<input type="checkbox" name="ava_cc_whitepaper_options[features]" value="1" <?php checked(1, $options['features'], true); ?> />
		<?php
	}

	public function display_video_element()
	{
		$options = get_option('ava_cc_whitepaper_options');
		?>
			<input type="checkbox" name="ava_cc_whitepaper_options[video]" value="1" <?php checked(1, $options['video'], true); ?> />
		<?php
	}

	//'whitepaper-hero'
	public function display_whitepaper_hero_element()
	{
		$options = get_option('ava_cc_whitepaper_options');
		?>
			<input type="checkbox" name="ava_cc_whitepaper_options[whitepaper-hero]" value="1" <?php checked(1, $options['whitepaper-hero'], true); ?> />
		<?php
	}

	public function display_whitepapers_fields()
	{
		register_setting( 'cc-whitepapers-options', 'ava_cc_whitepaper_options' );

		add_settings_section("whitepapers-section", "Choose Design Modules to Enable for Whitepapers", array( $this, "section_callback"), "cc-whitepapers-options");

		add_settings_field("hero", "Include Product/Services Hero?", array( $this, "display_the_hero_element"), "cc-whitepapers-options", "whitepapers-section");
		add_settings_field("description", "Include Description?", array( $this, "display_description_element"), "cc-whitepapers-options", "whitepapers-section");
		add_settings_field("features", "Include Features?", array( $this, "display_features_element"), "cc-whitepapers-options", "whitepapers-section");
		add_settings_field("video", "Include Video?", array( $this, "display_video_element"), "cc-whitepapers-options", "whitepapers-section");
		add_settings_field("whitepaper-hero", "Include Whitepaper Hero?", array( $this, "display_whitepaper_hero_element"), "cc-whitepapers-options", "whitepapers-section");
	}

	public function add_whitepapers_menu_item()
	{
		$options = get_option('ava_cc_content_options');
		if ( array_key_exists('whitepapers', $options) && $options['whitepapers'] == true ) {
			add_submenu_page( 'content-control-panel', 'Whitepaper Options', 'Whitepapers', 'manage_options', 'cc-whitepapers-panel', array( $this, "whitepapers_settings") );
		}
	}
}
