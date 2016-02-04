<?php
//boilerplate for single site settings page
//@todo - get logic for multisite!

function plugin_name_register_settings_page() {
	return new PLUGIN_SETTINGS_PAGE();
}

add_action('init', 'plugin_name_register_settings_page' );


class PLUGIN_SETTINGS_PAGE {

	public function __construct() {
		add_action( 'admin_init', array( $this, 'plugin_settings_init') );
		add_action( 'admin_menu', array( $this, 'plugin_settings_menu') );
	}

	public function plugin_settings_menu() {

		add_options_page( 
			'Plugin Settings Page Title', 
			'Plugin Menu Title', 
			'edit_posts', 
			'plugin-boilerplate', 
			array( $this, 'plugin_options_page_callback')
			);

	}

	public function plugin_settings_init() {

		//register the settings group and the settings themselves
		register_setting( 'plugin_settings_group', 'plugin_settings' );
		//create a settings section - there can be multiple settings sections, just make sure you attribute
		//the settings fields to the sections you want
		add_settings_section( 'settings-section-id', 'Plugin Settings Section Title', array( $this, 'settings_section_callback' ), 'plugin-boilerplate' );
		//create the settings fields, associate them with the required settings sections
		add_settings_field( 'settings-fields-id', 'Settings Fields Title', array( $this, 'settings_field_callback' ), 'plugin-boilerplate', 'settings-section-id' );
		
	}

	public function settings_section_callback() {
		?>

			<p>If we want some explanatory text for this section, this is where we would put it</p>

		<?php

	}

	public function settings_field_callback() {

		$settings = (array) get_option('plugin_settings');
		$checkbox = esc_attr( $settings['checkbox'] );
		$radio_button =  esc_attr( $settings['radio_button'] );
		$textarea =  esc_attr( $settings['textarea'] );
		$input_field =  esc_attr( $settings['input_field'] );
		$color =  esc_attr( $settings['color'] );


		?>

		<p>
			<input type="checkbox" name="plugin_settings[checkbox]" value="" />
		</p>
		<p>
			<input type="radio" name="plugin_settings[radio_button]" value="" />
		</p>
		<p>
			<input type="text" name="plugin_settings[input_field]" value="" />
		</p>
		<p>
			<textarea name="plugin_settings[textarea]" value=""></textarea>
		</p>
		<p>
			<input type="text" name='plugin_settings[color]' value="" class="my-color-field" />
		</p>

		<?php

	}

	public function plugin_options_page_callback() {
		?>
		<div class='wrap'>

			<h2>Plugin Boilerplate Settings Page</h2>
			<form action='options.php' method='POST'>
				<?php 

					//output the settings fields using the settings group registered in register_settings
					settings_fields( 'plugin_settings_group' );

				?>
				<?php 

					//output the settings sections using the options page slug to grab everything
					//can optionally include individual sections here if needed
					do_settings_sections( 'plugin-boilerplate' );

				?>
				<?php 

					//output the submit button for the <form> element
					submit_button( );

				?>
			</form>

		</div>
		<?php
	}

}

?>