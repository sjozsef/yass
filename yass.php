<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sjozsef.com/
 * @since             1.0.0
 * @package           Yass
 *
 * @wordpress-plugin
 * Plugin Name:       Yet Another Smooth Scroll
 * Plugin URI:        http://sjozsef.com/yass/
 * Description:       Customisable SmoothScroll plugin for WordPress
 * Version:           1.1.0
 * Author:            Samu József
 * Author URI:        http://sjozsef.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yass
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yass-activator.php
 */
function activate_yass() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yass-activator.php';
	Yass_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yass-deactivator.php
 */
function deactivate_yass() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yass-deactivator.php';
	Yass_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yass' );
register_deactivation_hook( __FILE__, 'deactivate_yass' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yass.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_yass() {

	$plugin = new Yass();
	$plugin->run();

}
run_yass();
