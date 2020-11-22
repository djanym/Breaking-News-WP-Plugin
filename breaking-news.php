<?php
/*
Plugin Name:  Breaking News
Description:  Adds ability to mark a post with "Breaking news" tag to display it on all website pages.
Version:      1.0
Author:       Nael Concescu
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  breaking-news
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or die();

// Wrap plugin absolute path into a constant
define('BN_PATH', plugin_dir_path( __FILE__ ) );
// Wrap plugin absolute path into a constant
define('BN_URL', plugin_dir_url( __FILE__ ) );

if ( is_admin() ) {
	include BN_PATH.'/admin/class-metabox.php';
	include BN_PATH.'/admin/class-options-page.php';
}
include BN_PATH.'/frontend/class-frontend.php';
include BN_PATH.'/admin/class-cron-actions.php';

register_activation_hook( __FILE__, [ 'BreakingNewsOptionsPage', 'activate_plugin' ] );
register_deactivation_hook( __FILE__, [ 'BreakingNewsCron', 'deactivate_plugin' ] );

/**
 * Activates internationalization feature for the plugin
 */
function breakingnews_plugin_textdomain(){
	load_plugin_textdomain('breaking-news', false, BN_PATH.'/languages/');
}
add_action('plugins_loaded', 'breakingnews_plugin_textdomain');