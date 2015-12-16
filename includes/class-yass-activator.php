<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sjozsef.com/
 * @since      1.0.0
 *
 * @package    Yass
 * @subpackage Yass/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Yass
 * @subpackage Yass/includes
 * @author     Samu József <sjozsef@sjozsef.com>
 */
class Yass_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$defaults = array(
			"YASS_enabled"			=>  	1,
			"YASS_keyboard"			=>  	1,
			"YASS_touch"			=> 		0,
			"YASS_fixed_bg"			=>		0,
			"YASS_anim_interval"	=> 		400,
			"YASS_step"				=>		100,
			"YASS_pulse"			=>		4
		);
		update_option('YASS_settings', $defaults);
	}

}
