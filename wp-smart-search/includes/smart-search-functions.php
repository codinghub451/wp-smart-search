<?php

// Create Menu on Dashboard

function custom_menu() { 
  add_menu_page( 
      'Settings', 
      'Smart Search', 
      'edit_posts', 
      'smart_search', 
      'page_callback_function', 
      'dashicons-welcome-view-site',
      30,
     );
}

add_action('admin_menu', 'custom_menu');

// Callback Function for Menu

function page_callback_function() {
  $html = '<div id="smart-search-form">
    <form>
      <input type="text" name="query" id="query" placeholder="Enter your query...">
      <button type="submit" id="search-btn">Search</button>
    </form>
    <div id="search-results"></div>
  </div>';
  echo $html;
}

// Load Scripts and Stylings

function smart_search_scripts() {
  wp_enqueue_style('smart-styling', plugins_url( '/assets/css/smart-style.css' , __DIR__ ));
  wp_register_script( 'custom-script', plugins_url( '/assets/js/smart-script.js' , __DIR__ ), array('jquery'), '1.0', true );
  // Localize script
  wp_localize_script('custom-script', 'ajax_object', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce'    => wp_create_nonce('ajax-nonce')
));
  wp_enqueue_script( 'custom-script' );
}
add_action('wp_enqueue_scripts', 'smart_search_scripts');

// Create Template for AI Chat

function create_template_array() {
  $templates = [];
  $templates['smart-search-functions.php'] = "Smart Search Template";
  return $templates;
}

// Register Template for AI Chat

function template_register($page_templates, $theme, $_post) {
  $get_templates = create_template_array();
  foreach($get_templates as $tk=>$tv) {
    $page_templates[$tk] = $tv;
  }
  return $page_templates;
}

add_filter('theme_page_templates', 'template_register', 10,3);

function template_selection($template) {
  require_once( plugin_dir_path(__DIR__) . 'templates/smart-search-template.php' );
}

add_filter('template_include', 'template_selection', 99);