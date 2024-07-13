<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://prodeegi.com
 * @since      1.0.0
 *
 * @package    Pressone_Widget
 * @subpackage Pressone_Widget/admin
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pressone_Widget
 * @subpackage Pressone_Widget/admin
 * @author     Prodeegi <hello@prodeegi.com>
 */
class Pressone_Widget_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	// private $api_key;
	// private $show_on_all_pages;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// $this->api_key = carbon_get_theme_option('pressone_api_key');
		// $this->show_on_all_pages = carbon_get_theme_option('pressone_show_on_all_pages');

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pressone_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressone_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/pressone-widget-admin.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pressone_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pressone_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/pressone-widget-admin.js', array('jquery'), $this->version, false);

	}

	public function create_settings_page()
	{
		Container::make('theme_options', __('PressOne Widget Settings'))
			->set_icon('dashicons-admin-generic')
			->add_fields(
				array(
					Field::make('text', 'pressone_api_key', __('API Key'))
						->set_help_text('Enter your PressOne API key here'),
					Field::make('checkbox', 'pressone_show_on_all_pages', __('Show on All Pages'))
						->set_help_text('Check this box to display the widget on all pages'),
					Field::make('html', 'pressone_shortcode_doc', __('Shortcode Usage'))
						->set_html('<p>To display the PressOne widget on specific pages, use the following shortcode:</p>
                                <code>[pressone_widget]</code>')
				)
			);
	}

}
