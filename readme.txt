=== ParcelForMe for WooCommerce ===    
Contributors: Kris Randall     
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2D3BHNFCW8G6G
Tags: woocommerce, debugging, interactive, php, wc_order    
Requires at least: 4.6    
Tested up to: 4.7    
Stable tag: 4.3    
License: MIT    
License URI: https://github.com/ParcelForMe/parcel4me-php-woocommerce/blob/master/LICENSE    
    
This plugin allows interactive debugging of WooCommerce WC_Orders.

== Description ==

I made this plugin because I was having such difficulty getting my head around WooCommerce Orders
and I needed a way to easily do some interactive debugging.

This plugin lets you enter an order number and then enter any arbitrary PHP code to apply to the order.

NOTE: This plugin is only intended as a deubgging aid for competent developers - do not use it if you don't know what you are doing, and do not leave it on a live site.

WARNING: This plugin uses *eval*
Caution
The eval() language construct is very dangerous because it allows execution of arbitrary PHP code. Its use thus is discouraged. If you have carefully verified that there is no other option than to use this construct, pay special attention not to pass any user provided data into it without properly validating it beforehand.

![](https://woocommerce.com/wp-content/themes/woomattic/images/logo-woocommerce@2x.png)


== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/woocommerce-order-debugger-plugin` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress


== More Information ==

You can email woocommerce_order_debugger@cocreations.com.au with any questions about this plugin.
I don't promise to reply, but I probably will.


== Changelog ==

= 0.0.1 =    
* First version.


