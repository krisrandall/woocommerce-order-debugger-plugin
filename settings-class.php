<?
   /*
   Description: Admin "setting" config screen for woocommerce order debugger plugin
   Version: 0.0.1
   Author: Kris
   Author URI: http://cocreations.com.au
   License: MIT
   */

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

class Settings {
 
  public function __construct() {
 
    // indicates we are running the admin
    if ( is_admin() ) {

        // create custom plugin settings menu
        add_action('admin_menu', 'wc_order_debugger_plugin_create_menu');

        function wc_order_debugger_plugin_create_menu() {

            //create new top-level menu
            add_menu_page('WC_Order Debug', 'WC_Order Debug', 'administrator', __FILE__, 'wc_order_debugger_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

            //call register settings function
            add_action( 'admin_init', 'register_wc_order_debugger_plugin_settings' );
        }


        function register_wc_order_debugger_plugin_settings() {
            //register our settings
            register_setting( 'woocommerce-order-debugger-plugin-settings-group', 'order_number' );
            register_setting( 'woocommerce-order-debugger-plugin-settings-group', 'code_to_run' );

        }

        function wc_order_debugger_plugin_settings_page() {

            if (!Settings::woocommerce_enabled()) {
                echo "You must have WooCommerce installed and enabled in order to use this plugin";
            } else {

                $code_val = get_option('code_to_run');
                if ($code_val=='') {
                    $code_val = '$order = new WC_Order( get_option(\'order_number\') );'.
                                "\n\n\n\n\n\n\n".
                                'var_dump( $order );';
                }

                $order_num = esc_attr( get_option('order_number') );

            ?>
            <div class="wrap">
            <h1>WC_Order Debugger</h1>

            <form method="post" action="options.php">
                <?php settings_fields( 'woocommerce-order-debugger-plugin-settings-group' ); ?>
                <?php do_settings_sections( 'woocommerce-order-debugger-plugin-settings-group' ); ?>
                <table class="form-table">
                    <tr valign="top">
                    <th scope="row" title="Enter an existing order number">Order Number</th>
                    <td>
                        <input type="text" name="order_number" value="<?php echo $order_num; ?>" />
                        <a href="<?php echo admin_url('edit.php?post_type=shop_order'); ?>">List Orders</a>
                    </td>
                    </tr>
                    
                    <tr valign="top">
                    <th scope="row">PHP Code to Execute</th>
                    <td><textarea rows="11" cols="80" name="code_to_run"><?php echo esc_attr( $code_val ); ?></textarea></td>
                    </tr>

                </table>
                
                <?php submit_button('Run Code'); ?>

                <!-- And here we execute the code -->

                <?php

                if (!$order_num) {
                    $code_output = "Enter an Order Number and click Run Code in order to see the output";
                } else {

                    $code_output = 'TODO!!';

                }
                ?>

                <table class="form-table">
                
                    <tr valign="top">
                    <th scope="row">Output</th>
                    <td><pre><?php echo esc_attr( $code_output ); ?></pre></td>
                    </tr>

                </table>
                
            </form>
            </div>
            <?php 
            }
        } 

    }

  }

  static function woocommerce_enabled() {
    return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
  }

}
?>