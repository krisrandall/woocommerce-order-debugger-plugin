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

                $default_code_val = '$order = new WC_Order( get_option(\'order_number\') );'.
                                    "\n\n\n\n\n\n\n".
                                    'var_dump( $order );';
                $code_val = get_option('code_to_run');
                if ($code_val=='') {
                    $code_val = $default_code_val;
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
                        <a target="_blank" href="<?php echo admin_url('edit.php?post_type=shop_order'); ?>">List Orders</a>
                    </td>
                    </tr>
                    
                    <tr valign="top">
                    <th scope="row">
                        PHP Code to Execute
                        <p><a target="_blank" href="https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html">Class WC_Order</a></p>
                    </th>
                    <td><textarea rows="11" cols="80" name="code_to_run" id="wc_d_code_to_run"><?php echo esc_attr( $code_val ); ?></textarea></td>
                    </tr>

                </table>
                
                <?php /* not using this because I want both buttons inside the same <p> tag : submit_button('Run Code'); */?>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Run Code">
                    <input type="button" name="clear" id="clear" class="button" value="Reset Code" onclick="document.getElementById('wc_d_code_to_run').value='<?php echo preg_replace("/\n/m", '\n', addslashes($default_code_val)); ?>';">
                </p>

                <!-- And here we execute the code -->

                <?php

                if ( (!$_GET['settings-updated']) || (!$order_num) ) {
                    $code_output = "Enter an Order Number and click Run Code in order to see the output";
                    $output_label = "Output";
                } else {

                    ob_start();
                    eval($code_val);
                    $code_output = ob_get_contents();
                    ob_end_clean();

                    $output_label = "Output". 
                                    '<p><a target="_blank" href="'.admin_url('post.php?post='.$order_num.'&action=edit').'">Order '.$order_num.'</a></p>';
                }
                ?>

                <table class="form-table">
                
                    <tr valign="top">
                    <th scope="row"><?php echo $output_label; ?></th>
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