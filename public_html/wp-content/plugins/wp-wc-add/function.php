<?php
if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}

add_action('woocommerce_before_shop_loop_item', 'wp_nav_menu')