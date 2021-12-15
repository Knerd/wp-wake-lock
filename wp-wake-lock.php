<?php
  /**
   * @package WP Wake Lock
   * @version 0.0.1
   */
  /*
    Plugin Name: WP Wake Lock
    Plugin URI: http://github.com/knerd/wp-wake-lock
    Description: Adds a wake lock to the front end of your site
    Author: Xopher Pollard
    Version: 0.0.1
    Author URI: http://github.com/xopherdeep/
  */

class XWakeLock{
  public function __construct() {
      $this->register_hooks();
  }

  private function register_hooks() {
      // Register hook to add a menu to the admin page
      add_action('wp_enqueue_scripts', [ $this, 'load_scripts' ]);

      // add_action('admin_menu', [ $this, 'add_admin_menu' ]);
  }

  public function add_admin_menu() {
      // add_menu_page(
      //     'Wake Lock',
      //     'Wake Lock',
      //     'manage_options',
      //     'x-wake-lock',
      //     [ $this, 'load_plugin_admin_page' ],
      //     'dashicons-smiley',
      //     4
      // );
  }

  public function load_plugin_admin_page() {
      // wp_enqueue_style( 'backend-style' );
      // wp_enqueue_script( 'backend-script' );

      // require_once 'templates/plugin-admin.php';
  }

  public function url_exists($url) {
      $file_headers = @get_headers($url);
      if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
          $exists = false;
      }
      else {
          $exists = true;
      }
      return $exists;
  }

  public function load_scripts() {
    wp_register_script( 'x-wake-lock', plugins_url( 'assets/js/script.js', __FILE__ ) );

    wp_enqueue_script('x-wake-lock');
  }
}
new XWakeLock();