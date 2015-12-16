<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://sjozsef.com/
 * @since      1.0.0
 *
 * @package    Yass
 * @subpackage Yass/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Yass
 * @subpackage Yass/includes
 * @author     Samu József <sjozsef@sjozsef.com>
 */
class Yass_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option( 'YASS_settings' );
	}

}
