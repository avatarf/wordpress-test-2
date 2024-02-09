<?php
/**
 * Plugin Name: Laci2000
 * Plugin URI: https://example.com/laci2000
 * Description: Adds a custom message to the WordPress admin pages.
 * Version: 1.0.0
 * Author: Laci 2000
 * Author URI: https://example.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Add custom message to the WordPress admin pages
function laci2000_add_custom_message() {
    echo ' -- Laci2000 was here';
}
add_action('admin_footer_text', 'laci2000_add_custom_message');
