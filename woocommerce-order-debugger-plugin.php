<?php
   /*
   Plugin Name: WooCommerce Order Debugger Plugin
   Plugin URI: 
   Description: Interactive Debugging of WooCommerce WC_Orders
   Version: 0.0.1
   Author: Kris
   Author URI: http://cocreations.com.au/
   License: MIT
   */

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

require_once __DIR__.'/settings-class.php';


class WooCommerce_Order_Debugger {

  public function __construct() {


    $config = new Settings();


    // called only after woocommerce has finished loading
    add_action( 'woocommerce_init', array( $this, 'woocommerce_loaded' ) );

    // indicates we are running the admin
    if ( is_admin() ) { }

    // indicates we are being served over ssl
    if ( is_ssl() ) { }

  }



  /**
   * Take care of anything that needs woocommerce to be loaded.
   * For instance, if you need access to the $woocommerce global
   */
  public function woocommerce_loaded() {
  

  }



}
 
// finally instantiate our plugin class and add it to the set of globals
$GLOBALS['woocommerce-order-debugger-plugin'] = new WooCommerce_Order_Debugger();
 

?>