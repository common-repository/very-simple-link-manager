<?php
/*
 * Plugin Name: VS Link Manager
 * Description: With this lightweight plugin you can display a set of links from the Link Manager.
 * Version: 2.5
 * Author: Guido
 * Author URI: https://www.guido.site
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Text Domain: very-simple-link-manager
 */

// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// enqueue css script
function vslm_css_script() {
	wp_enqueue_style('vslm-style', plugins_url('/css/vslm-style.min.css',__FILE__));
}
add_action( 'wp_enqueue_scripts', 'vslm_css_script' );

// activate link manager
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// add attributes link
function vslm_action_links( $links ) {
	$attributeslink = array( '<a href="https://wordpress.org/plugins/very-simple-link-manager/" target="_blank">'.__('Attributes', 'very-simple-link-manager').'</a>' );
	return array_merge( $links, $attributeslink );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'vslm_action_links' );

// add body class for default twenty themes
function vslm_body_class($classes) {
	$theme = get_option('template');
	if ( 'twentytwenty' == $theme || 'twentytwentyone' == $theme ) {
		$classes[] = 'vslm-twenty';
	}
	return $classes;
}
add_filter( 'body_class', 'vslm_body_class', 11 );

// include files
include 'vslm-block.php';
include 'vslm-shortcode.php';
