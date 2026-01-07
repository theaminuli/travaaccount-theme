<?php
/**
 * Admin Menu Registration for TravaAccount Theme
 * 
 * Registers the theme settings page in the WordPress admin panel under
 * the Appearance menu. This file creates the menu entry that links to
 * the branding settings page.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adds TravaAccount settings page to the Appearance menu.
 * 
 * Creates a submenu page under Appearance with customization options
 * for theme branding, colors, typography, buttons, and layout settings.
 * 
 * @since 1.0.0
 * @uses add_theme_page() WordPress function to add theme settings page
 * @return void
 */
function travaaccount_add_admin_menu() {
    add_theme_page(
        __('TravaAccount Settings', 'travaaccount'),
        __('TravaAccount Settings', 'travaaccount'),
        'manage_options',
        'travaaccount-settings',
        'travaaccount_settings_page'
    );
}
add_action('admin_menu', 'travaaccount_add_admin_menu');
