<?php
/**
 * Plugin Name:     Anchors Only
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Ersetzt <em>Scroll to Anchor</em> und zeigt nur die Anker.
 * Author:          Bego Mario Garde
 * Author URI:      https://pixolin.de
 * Version:         0.1.1
 *
 * @package         Anchors_Only
 */

// Don't allow direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once AO_PLUGIN_PATH . 'includes/class-adminnotice.php';
require_once AO_PLUGIN_PATH . 'includes/class-shortcode.php';
require_once AO_PLUGIN_PATH . 'includes/class-tinymce.php';

$anchors = new Shortcode();
$editor  = new TinyMCE();

require_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'scroll-to-anchor/scroll-to-anchor.php' ) ) {
	$warning = new Adminnotice();
}
