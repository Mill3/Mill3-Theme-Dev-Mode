<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/Mill3/Mill3-Theme-Dev-Mode/
 * @since             1.0.1
 * @package           Mill3_Theme_Dev_Mode
 *
 * @wordpress-plugin
 * Plugin Name:       Mill3 Theme Dev Mode 🔒
 * Plugin URI:        https://github.com/Mill3/Mill3-Theme-Dev-Mode/
 * Description:       This plugin prevent non-connected admin users to visit the public site, also prevents robots indexing.
 * Version:           1.0.1
 * Author:            Mill3 Studio
 * Author URI:        https://mill3.studio//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mill3-theme-dev-mode
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
define( 'MILL3_THEME_DEV_MODE_VERSION', '1.0.1' );

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 *
 */
function run_mill3_theme_dev_mode() {
  // if is a CLI command, do nothing
  if( defined('WP_CLI') && WP_CLI ) return;

  // if user is logged in or at login page, do nothing
  if( is_admin() || $GLOBALS['pagenow'] == 'wp-login.php' ) return;

  // if function does not exist, do nothing, prevent error if called using an early hook
  if( !function_exists("get_current_user_id") ) return;

  // get current user
  $user = get_current_user_id();

  // if user is not logged in, display a message and die
  if( !$user ) {
    $body = <<<HEREDOC_BODY
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MILL3</title>
        <style>
        body {
          padding: 0.25em;
          font-size: 2.5em;
          text-align: center;
          font-family: Helvetica; sans-serif;
          background-color: #000;
          color: #fff;
        }
        h1 {
          margin: 0;
        }
        </style>
      </head>
      <body>
        <h1>MILL3 🔒</h1>
      </body>
      </html>
    HEREDOC_BODY;
    exit($body);
  }
}

// run the function when the user is set
add_action( 'set_current_user', 'run_mill3_theme_dev_mode');
