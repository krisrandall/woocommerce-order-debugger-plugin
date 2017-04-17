# WooCommerce Order Debugger Plugin

I made this plugin because I was having such difficulty getting my head around WooCommerce Orders
and I needed a way to easily do some interactive debugging.

This plugin lets you enter an order number and then enter any arbitrary PHP code to apply to the order.

### Based upon : https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html


![](https://woocommerce.com/wp-content/themes/woomattic/images/logo-woocommerce@2x.png)


------

**Note:** For auto-plugin-install *while developing* use : 
`mkdir ../wordpress/wp-content/plugins/woocommerce-order-debugger-plugin` (once only)     
`fsmonitor -s -p -d . cp -r ./* ../wordpress/wp-content/plugins/woocommerce-order-debugger-plugin/` (every time developing)

**Note 2:** To make an uploadable Wordpress plugin simply zip this folder and call it `woocommerce-order-debugger-plugin.zip`.


------
