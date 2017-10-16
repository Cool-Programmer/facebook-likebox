<?php
/*
*	Plugin name: Facebook Page Plugin
*	Plugin URI: http://www.iodevllc.com
*	Description: Add facebook page to your WordPress webstite.
* 	Version: 0.1 beta
*	Author:	Mher Margaryan
*	Author URI: http://www.iodevllc.com
*/

if (!defined('ABSPATH')) {
	exit('You are not allowed to be here.');
}

// Require scripts
require_once(plugin_dir_path(__FILE__) . '/includes/facebook-page-plugin-scripts.php');

// Require class
require_once(plugin_dir_path(__FILE__) . 'includes/facebook-page-plugin-class.php');

// Register the widget
function fpp_register_widget()
{
	register_widget('FPP_Widget');
}
add_action('widgets_init', 'fpp_register_widget');