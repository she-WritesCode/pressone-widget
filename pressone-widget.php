<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://prodeegi.com
 * @since             1.0.0
 * @package           Pressone_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       PressOne Live Call Widget
 * Plugin URI:        https://prodeegi.com
 * Description:       Integrate Voice Conversations into your On-Demand platform such as Food delivery apps to allow customers talk to delivery personnel or Artisan or Handyman app to speak with handyman directly, in app etc. Website Live Call Feature, Enable in-app support calls in minutes, Great for e-commerce apps, hotel and travel platforms.
 * Version:           1.0.0
 * Author:            Prodeegi
 * Author URI:        https://prodeegi.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pressone-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PRESSONE_WIDGET_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pressone-widget-activator.php
 */
function activate_pressone_widget()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-pressone-widget-activator.php';
	Pressone_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pressone-widget-deactivator.php
 */
function deactivate_pressone_widget()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-pressone-widget-deactivator.php';
	Pressone_Widget_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_pressone_widget');
register_deactivation_hook(__FILE__, 'deactivate_pressone_widget');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-pressone-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pressone_widget()
{

	$plugin = new Pressone_Widget();
	$plugin->run();

}
run_pressone_widget();
