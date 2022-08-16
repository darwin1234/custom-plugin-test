<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.facebook.com/
 * @since      1.0.0
 *
 * @package    Custom_Plugin_Test
 * @subpackage Custom_Plugin_Test/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Plugin_Test
 * @subpackage Custom_Plugin_Test/includes
 * @author     Darwin Sese < darwinsese@gmail.com>
 */
class Custom_Plugin_Test_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-plugin-test',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
