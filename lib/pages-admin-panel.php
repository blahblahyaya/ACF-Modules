<?php

class avaPagesAdminPanel extends avaProductsPlugin {

	public function __construct() {
		add_action("admin_menu", array($this, "add_pages_menu_item"));
		add_action("admin_init", array($this, "display_pages_fields"));
	}

	public function pages_settings() {
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
							settings_fields( 'cc-pages-options' );
							do_settings_sections( 'cc-pages-options' );
							submit_button();
						?>
					</form>
			</div>
	  <?php
	}

	public function display_the_hero_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[hero]" value="1" <?php checked(1, $options['hero'], true); ?> />
		<?php
	}

	public function display_description_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[description]" value="1" <?php checked(1, $options['description'], true); ?> />
		<?php
	}

	public function display_features_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[features]" value="1" <?php checked(1, $options['features'], true); ?> />
		<?php
	}

	public function display_video_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[video]" value="1" <?php checked(1, $options['video'], true); ?> />
		<?php
	}

	public function display_whitepaper_hero_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[whitepaper-hero]" value="1" <?php checked(1, $options['whitepaper-hero'], true); ?> />
		<?php
	}

	public function display_home_page_hero_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[home-page-hero]" value="1" <?php checked(1, $options['home-page-hero'], true); ?> />
		<?php
	}
	public function display_home_page_value_prop_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[home-page-value-prop]" value="1" <?php checked(1, $options['home-page-value-prop'], true); ?> />
		<?php
	}
	public function display_home_page_prod_svcs_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[home-page-prod-svcs]" value="1" <?php checked(1, $options['home-page-prod-svcs'], true); ?> />
		<?php
	}
	public function display_partners_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[partners]" value="1" <?php checked(1, $options['partners'], true); ?> />
		<?php
	}
	public function display_thank_you_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[thank-you]" value="1" <?php checked(1, $options['thank-you'], true); ?> />
		<?php
	}
	public function display_contact_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[contact]" value="1" <?php checked(1, $options['contact'], true); ?> />
		<?php
	}
	public function display_about_element()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[about]" value="1" <?php checked(1, $options['about'], true); ?> />
		<?php
	}
	public function display_testimonial_hero_banner()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[testimonial-hero-banner]" value="1" <?php checked(1, $options['testimonial-hero-banner'], true); ?> />
		<?php
	}
	public function display_testimonial_hero_quote()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[testimonial-hero-quote]" value="1" <?php checked(1, $options['testimonial-hero-quote'], true); ?> />
		<?php
	}
	public function display_testimonial_quote_boxes()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[testimonial-quote-boxes]" value="1" <?php checked(1, $options['testimonial-quote-boxes'], true); ?> />
		<?php
	}
	public function display_testimonial_feature_quote()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[testimonial-feature-quote]" value="1" <?php checked(1, $options['testimonial-feature-quote'], true); ?> />
		<?php
	}
	public function display_testimonial_cta()
	{
		$options = get_option('ava_cc_page_options');
		?>
			<input type="checkbox" name="ava_cc_page_options[testimonial-cta]" value="1" <?php checked(1, $options['testimonial-cta'], true); ?> />
		<?php
	}

	public function display_pages_fields()
	{
		register_setting( 'cc-pages-options', 'ava_cc_page_options' );

		add_settings_section("pages-section", "Pages - Enable Design Modules to include for Pages", array( $this, "section_callback"), "cc-pages-options");

		add_settings_field("home-page-hero", "Home Page Hero?", array( $this, "display_home_page_hero_element"), "cc-pages-options", "pages-section");

		add_settings_field("home-page-value-prop", "Home Page Value Prop?", array( $this, "display_home_page_value_prop_element"), "cc-pages-options", "pages-section");
		
		add_settings_field("home-page-prod-svcs", "Home Page Prod/Svcs?", array( $this, "display_home_page_prod_svcs_element"), "cc-pages-options", "pages-section");
		
		add_settings_field("hero", "Product/Services Hero?", array( $this, "display_the_hero_element"), "cc-pages-options", "pages-section");
				
		add_settings_field("description", "Description?", array( $this, "display_description_element"), "cc-pages-options", "pages-section");
		
		add_settings_field("features", "Features?", array( $this, "display_features_element"), "cc-pages-options", "pages-section");
		
		add_settings_field("video", "Video?", array( $this, "display_video_element"), "cc-pages-options", "pages-section");

		add_settings_field("partners", "Partners?", array( $this, "display_partners_element"), "cc-pages-options", "pages-section");
		
		add_settings_field("thank-you", "Thank You?", array( $this, "display_thank_you_element"), "cc-pages-options", "pages-section");

		add_settings_field("contact", "Contact?", array( $this, "display_contact_element"), "cc-pages-options", "pages-section");

		add_settings_field("about", "About?", array( $this, "display_about_element"), "cc-pages-options", "pages-section");

		add_settings_field("testimonial-hero-banner", "Testimonial Hero Banner?", array( $this, "display_testimonial_hero_banner"), "cc-pages-options", "pages-section");

		add_settings_field("testimonial-hero-quote", "Testimonial Hero Quote?", array( $this, "display_testimonial_hero_quote"), "cc-pages-options", "pages-section");

		add_settings_field("testimonial-quote-boxes", "Testimonial Quote Boxes?", array( $this, "display_testimonial_quote_boxes"), "cc-pages-options", "pages-section");
//testimonial_feature_quote
		add_settings_field("testimonial-feature-quote", "Testimonial Feature Quote?", array( $this, "display_testimonial_feature_quote"), "cc-pages-options", "pages-section");

		add_settings_field("testimonial-cta", "Testimonial CTA?", array( $this, "display_testimonial_cta"), "cc-pages-options", "pages-section");
	}

	public function add_pages_menu_item()
	{
		$options = get_option('ava_cc_content_options');
		if ( $options['pages'] == true ) {
			add_submenu_page( 'content-control-panel', 'Page Options', 'Pages', 'manage_options', 'cc-pages-panel', array( $this, "pages_settings") );
		}
	}
}
