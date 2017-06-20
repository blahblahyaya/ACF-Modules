<?php

class avaContentControlAdminPanel extends avaProductsPlugin {

	public function __construct() {
		add_action("admin_menu", array($this, "add_content_control_menu_item"));
		add_action("admin_init", array($this, "display_content_control_fields"));
	}

	public function content_control_settings()
	{
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
		            settings_fields("content-control-options");
		            do_settings_sections("content-control-options");
		            submit_button();
		        ?>
		    </form>
			</div>
		<?php
	}

	public function display_products_element()
	{
			$options = get_option('ava_cc_content_options');
		?>
			<input type="checkbox" name="ava_cc_content_options[products]" value="1" <?php checked(1, $options['products'], true); ?> />
		<?php
	}

	public function display_services_element()
	{
		$options = get_option('ava_cc_content_options');
		?>
			<input type="checkbox" name="ava_cc_content_options[services]" value="1" <?php checked(1, $options['services'], true); ?> />
		<?php
	}

	public function display_whitepapers_element()
	{
		$options = get_option('ava_cc_content_options');
		?>
			<input type="checkbox" name="ava_cc_content_options[whitepapers]" value="1" <?php checked(1, $options['whitepapers'], true); ?> />
		<?php
	}

	public function display_videos_element()
	{
		$options = get_option('ava_cc_content_options');
		?>
			<input type="checkbox" name="ava_cc_content_options[videos]" value="1" <?php checked(1, $options['videos'], true); ?> />
		<?php
	}

		public function display_pages_element()
		{
			$options = get_option('ava_cc_content_options');
			?>
				<input type="checkbox" name="ava_cc_content_options[pages]" value="1" <?php checked(1, $options['pages'], true); ?> />
			<?php
		}

	public function display_content_control_fields()
	{
		register_setting( 'content-control-options', 'ava_cc_content_options' );

		add_settings_section("section", "Choose Content Types to Enable", null, "content-control-options");

	  	add_settings_field("products", "Include Products?", array( $this, "display_products_element"), "content-control-options", "section");
		add_settings_field("services", "Include Services?", array( $this, "display_services_element"), "content-control-options", "section");
		add_settings_field("whitepapers", "Include Whitepapers?", array( $this, "display_whitepapers_element"), "content-control-options", "section");
		add_settings_field("videos", "Include Videos?", array( $this, "display_videos_element"), "content-control-options", "section");
		add_settings_field("pages", "Include Pages?", array( $this, "display_pages_element"), "content-control-options", "section");
	}

	public function add_content_control_menu_item()
	{
		add_menu_page("Avalara Content Control", "Content Control", "manage_options", "content-control-panel", array( $this, "content_control_settings"), null, 99);
	}
}
