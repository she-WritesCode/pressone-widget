<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://prodeegi.com
 * @since      1.0.0
 *
 * @package    Pressone_Widget
 * @subpackage Pressone_Widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pressone_Widget
 * @subpackage Pressone_Widget/public
 * @author     Prodeegi <hello@prodeegi.com>
 */
class Pressone_Widget_Public
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

	private $api_key;
	private $show_on_all_pages;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	private function load_carbon_fields()
	{
		if (function_exists('carbon_get_theme_option')) {
			$this->api_key = carbon_get_theme_option('pressone_api_key');
			$this->show_on_all_pages = carbon_get_theme_option('pressone_show_on_all_pages');
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		$this->load_carbon_fields();
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/pressone-widget-public.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		$this->load_carbon_fields();

		if (!$this->show_on_all_pages) {
			return;
		}

		wp_enqueue_script($this->plugin_name . '-pub-widget', 'https://web.pressone.africa/pub-widget.js', [], $this->version, false);
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/pressone-widget-public.js', ['jquery', $this->plugin_name . '-pub-widget'], $this->version, false);

		wp_localize_script($this->plugin_name, 'ajax_object', [
			'ajax_url' => admin_url('admin-ajax.php'),
			'press_one_api_key' => $this->api_key,
		]);

	}

	public function add_widget_container()
	{
		$this->load_carbon_fields();
		if ($this->show_on_all_pages || has_shortcode(get_post()->post_content, 'pressone_widget')) {
			do_shortcode('[pressone_widget]');
		}
	}

	public function pressone_shortcode()
	{
		ob_start();
		?>
		<div id="pressone-call-widget"></div>
		<?php
		return ob_get_clean();
	}

}
