<?php
/**
 * Plugin Name:     Anchors Only
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Ersetzt <em>Scroll to Anchor</em> und zeigt nur die Anker.
 * Author:          Bego Mario Garde
 * Author URI:      https://pixolin.de
 * Version:         0.1.0
 *
 * @package         Anchors_Only
 */

// Don't allow direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Run this plugin only if plugin Scroll-to-Anchor has been deactivated
 *
 * @return void
 */



define( 'AO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once AO_PLUGIN_PATH . 'includes/class-shortcode.php';
require_once AO_PLUGIN_PATH . 'includes/class-tinymce.php';

function check_some_other_plugin() {
	if ( ! is_plugin_active( 'scroll-to-anchor/scroll-to-anchor.php' ) ) {
		$anchors = new Shortcode();
		$editor  = new TinyMCE();
	}
}
add_action( 'admin_init', 'check_some_other_plugin' );
