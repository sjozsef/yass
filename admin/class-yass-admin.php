<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sjozsef.com/
 * @since      1.0.0
 *
 * @package    Yass
 * @subpackage Yass/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Yass
 * @subpackage Yass/admin
 * @author     Samu József <sjozsef@sjozsef.com>
 */
class Yass_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yass_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yass_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 
		if($hook == 'settings_page_yet_another_smooth_scroll')
		{
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yass-admin.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yass_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yass_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if($hook == 'settings_page_yet_another_smooth_scroll')
		{
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yass-admin.js', array( 'jquery' ), $this->version, true );
		}
	}
	
	/**
	 * Adding admin menu
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menu() { 

		add_options_page( 'Yet Another Smooth Scroll', 'YASS', 'manage_options', 'yet_another_smooth_scroll', array($this, 'options_page') );
	
	}
	
	/**
	 * Init settings
	 *
	 * @since    1.0.0
	 */
	public function settings_init(  ) { 

		register_setting( 'YASS_Settings', 'YASS_settings' );
	
		add_settings_section(
			'YASS_pluginPage_section', 
			'', //__( 'Settings', 'yass' ), 
			array($this, 'settings_section_callback'), 
			'YASS_Settings'
		);
	
		add_settings_field( 
			'YASS_enabled', 
			__( 'Smooth Scroll enabled', 'yass' ), 
			array($this, 'enabled_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	
		add_settings_field( 
			'YASS_keyboard', 
			__( 'Allow keyboard scrolling', 'yass' ), 
			array($this, 'keyboard_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	
		add_settings_field( 
			'YASS_touch', 
			__( 'Allow for touchpad', 'yass' ), 
			array($this, 'touch_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	
		add_settings_field( 
			'YASS_anim_interval', 
			__( 'Animation interval (ms)', 'yass' ), 
			array($this, 'anim_interval_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	
		add_settings_field( 
			'YASS_step', 
			__( 'Step (px)', 'yass' ), 
			array($this, 'step_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	
		add_settings_field( 
			'YASS_pulse', 
			__( 'Pulse scale', 'yass' ), 
			array($this, 'pulse_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	
		add_settings_field( 
			'YASS_fixed_bg', 
			__( 'Fixed background', 'yass' ), 
			array($this, 'fixed_bg_render'), 
			'YASS_Settings', 
			'YASS_pluginPage_section' 
		);
	}
	
	/**
	 * Renders the 'enabled' option field
	 *
	 * @since    1.0.0
	 */
	function enabled_render(  ) { 

		$options = get_option( 'YASS_settings' );
		?>
		<label>
		<input type='checkbox' name='YASS_settings[YASS_enabled]' <?php checked( isset($options['YASS_enabled']) ? $options['YASS_enabled'] : 0, 1 ); ?> value='1'>
		<?php _e('Enable or disable SmoothScroll', 'yass'); ?>
		</label>
		<?php
	
	}
	
	/**
	 * Renders the 'keyboard' option field
	 *
	 * @since    1.0.0
	 */
	function keyboard_render(  ) { 
	
		$options = get_option( 'YASS_settings' );
		?>
		<label>
		<input type='checkbox' name='YASS_settings[YASS_keyboard]' <?php checked( isset($options['YASS_keyboard']) ? $options['YASS_keyboard'] : 0, 1 ); ?> value='1'>
		<?php _e('Allow SmoothScroll for keyboard arrows.', 'yass'); ?>
		</label>
		<?php
	
	}
	
	/**
	 * Renders the 'touch' option field
	 *
	 * @since    1.0.0
	 */
	function touch_render(  ) { 
	
		$options = get_option( 'YASS_settings' );
		?>
		<label>
		<input type='checkbox' name='YASS_settings[YASS_touch]' <?php checked( isset($options['YASS_touch']) ? $options['YASS_touch'] : 0, 1 ); ?> value='1'>
		<?php _e('Enable or disable SmoothScroll for touchpad', 'yass'); ?>
		</label>
		<?php
	
	}
	
	/**
	 * Renders the 'anim_interval' option field
	 *
	 * @since    1.0.0
	 */
	function anim_interval_render(  ) { 

		$options = get_option( 'YASS_settings' );
		?>
		<input data-slider="true" data-slider-theme="volume" data-slider-range="100,1000" data-slider-step="100"
		type='text' name='YASS_settings[YASS_anim_interval]' value='<?php if(isset($options['YASS_anim_interval'])) echo $options['YASS_anim_interval']; ?>'>
		<?php
	
	}
	
	/**
	 * Renders the 'step' option field
	 *
	 * @since    1.0.0
	 */
	function step_render(  ) { 
	
		$options = get_option( 'YASS_settings' );
		?>
		<input data-slider="true" data-slider-theme="volume" data-slider-range="50,200" data-slider-step="15"
		type='text' name='YASS_settings[YASS_step]' value='<?php if(isset($options['YASS_anim_interval'])) echo $options['YASS_step']; ?>'>
		<?php
	
	}
	
	/**
	 * Renders the 'pulse' option field
	 *
	 * @since    1.0.0
	 */
	function pulse_render(  ) { 
	
		$options = get_option( 'YASS_settings' );
		?>
		<input data-slider="true" data-slider-theme="volume" data-slider-range="0,10" data-slider-step="1"
		type='text' name='YASS_settings[YASS_pulse]' value='<?php if(isset($options['YASS_anim_interval'])) echo $options['YASS_pulse']; ?>'>
		<?php
	
	}
	
	/**
	 * Renders the 'fiexed_bg' option field
	 *
	 * @since    1.0.0
	 */
	function fixed_bg_render(  ) { 
	
		$options = get_option( 'YASS_settings' );
		?>
		<label>
		<input type='checkbox' name='YASS_settings[YASS_fixed_bg]' <?php checked( isset($options['YASS_fixed_bg']) ? $options['YASS_fixed_bg'] : 0, 1 ); ?> value='1'>
		<?php _e('Enable fixed background image', 'yass'); ?>
		</label>
		<?php
	
	}
	
	/**
	 * Callback for settings section (does nothing yet)
	 *
	 * @since    1.0.0
	 */
	public function settings_section_callback(  ) { 

		//echo __( '', 'yass' );
	
	}
	
	/**
	 * Loads the template file for rendering the option page
	 *
	 * @since    1.0.0
	 */
	public function options_page(  ) { 

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/yass-admin-display.php';
	
	}

}
