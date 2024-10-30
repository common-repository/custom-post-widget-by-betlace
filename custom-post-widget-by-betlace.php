<?php

/**
 * Plugin Name: Сustom post widget by Betlace
 * Description: Elementor custom post widget
 * Version: 1.0.0
 * License: GPLv2 or later
 * Plugin URI: https://wordpress.org/plugins/custom-post-widget-by-betlace/
 * Author: Betlace
 * Author URI: https://www.betlace.com/
 *
 * @package Сustom-post-widget-by-betlace
 *
*/

class Ecpwb_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
    require_once('ecpwb-custom-posts.php');
    add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
  }

	public function register_widgets() {
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Ecpwb_Custom_Posts_Widget() );
  }

}

add_action( 'init', 'ecpwb_elementor_init' );
function ecpwb_elementor_init() {
	Ecpwb_Elementor_Widgets::get_instance();
}