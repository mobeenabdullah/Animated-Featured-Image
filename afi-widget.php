<?php
/*
Plugin Name: Animated Featured Image
Plugin URI: http://codexspot.com/afi-demo/
Description: Responsive Featured Image for Sidebar Widgets with CSS3 Animations and Styles
Version: 1.0.1
Author: Mobeen Abdullah
Author URI: http://codexspot.com
License: GPLv2 or later
*/

/**
 * Include CSS
 */
function add_styles(){
	wp_register_style('afi-styles', plugin_dir_url(__FILE__).'/css/afi-widget.css');
	wp_enqueue_style('afi-styles');
}
add_action('wp_enqueue_scripts', 'add_styles');

/**
 * Include Widget Class
 */
include('class.afi-widget.php');

/**
 * Registering the Widget
 */
function register_afi_widget(){
	register_widget('AFI_Widget');
}
add_action('widgets_init', 'register_afi_widget');
