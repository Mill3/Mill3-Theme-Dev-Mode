<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://mill3.studio/
 * @since             1.0.0
 * @package           Mill3_Theme_Dev_Mode
 *
 * @wordpress-plugin
 * Plugin Name:       Mill3 Theme Dev Mode 🔒
 * Plugin URI:        https://https://mill3.studio/
 * Description:       This plugin prevent non-connected admin users to visit the public site.
 * Version:           1.0.0
 * Author:            Mill3 Studio
 * Author URI:        https://https://mill3.studio//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mill3-theme-dev-mode
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MILL3_THEME_DEV_MODE_VERSION', '1.0.0' );

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 *
 */
function run_mill3_theme_dev_mode() {
  // if user is logged in or at login page, do nothing
  if( is_admin() || $GLOBALS['pagenow'] == 'wp-login.php' ) return;

  // get current user
  $user = get_current_user_id();;

  // if user is not logged in, display a message and die
  if( !$user ) {
    echo "<style>body { font-size: 3em; font-family: Helvetica; sans-serif; background-color: #000; color: #fff; }</style>";
    echo "<h1>MILL3 🔒</h1>";
    die();
  }
}

// run_mill3_theme_dev_mode();

add_action( 'set_current_user', 'run_mill3_theme_dev_mode', 1);
