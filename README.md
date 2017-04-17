# WooCommerce Order Debugger Plugin

I made this plugin because I was having such difficulty getting my head around WooCommerce Orders
and I needed a way to easily do some interactive debugging.

This plugin lets you enter an order number and then enter any arbitrary PHP code to apply to the order.

NOTE: This plugin is only intended as a deubgging aid for competent developers - do not use it if you don't know what you are doing, and do not leave it on a live site.

**WARNING:** This plugin uses *eval*
Caution
The eval() language construct is very dangerous because it allows execution of arbitrary PHP code. Its use thus is discouraged. If you have carefully verified that there is no other option than to use this construct, pay special attention not to pass any user provided data into it without properly validating it beforehand.


### Based upon : https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html


![](https://woocommerce.com/wp-content/themes/woomattic/images/logo-woocommerce@2x.png)


------

**Note:** For auto-plugin-install *while developing* use : 
`mkdir ../wordpress/wp-content/plugins/woocommerce-order-debugger-plugin` (once only)     
`fsmonitor -s -p -d . cp -r ./* ../wordpress/wp-content/plugins/woocommerce-order-debugger-plugin/` (every time developing)

**Note 2:** To make an uploadable Wordpress plugin simply zip this folder and call it `woocommerce-order-debugger-plugin.zip`.


------
