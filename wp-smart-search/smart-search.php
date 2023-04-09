<?php
/**
 * Plugin Name: Smart Search
 * Plugin URI: https://infinitysolutionz.com/
 * Description: Smart Search is a powerful and user-friendly WordPress plugin that allows you to add advanced search functionality to your website. With Smart Search, your users can quickly and easily find the content they are looking for using natural language queries. Try it today and take your search experience to the next level!.
 * Version: 1.0
 * Author: Haseeb Abbas
 * Author URI: https://infinitysolutionz.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Define constants

define( 'SMART_SEARCH_DIR', plugin_dir_path( __FILE__ ) );
define( 'SMART_SEARCH_URL', plugin_dir_path(__DIR__) );

// Include necessary files

require_once( SMART_SEARCH_DIR . 'includes/smart-search-ajax.php' );
require_once( SMART_SEARCH_DIR . 'includes/smart-search-functions.php' );