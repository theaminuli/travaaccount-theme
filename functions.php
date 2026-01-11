<?php
/**
 * TravaAccount Theme Functions
 * 
 * Main theme setup: features, menus, includes, and core functionality.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

define('TRAVAACCOUNT_THEME_VERSION', wp_get_theme()->get('Version'));
define('TRAVAACCOUNT_THEME_DIR', __DIR__);
define('TRAVAACCOUNT_THEME_URI', get_template_directory_uri());
define('TRAVAACCOUNT_THEME_TEMPLATES', get_template_directory());
define('TRAVAACCOUNT_BUILD_URI', TRAVAACCOUNT_THEME_URI . '/build');



/**
 * Sets up theme features and support.
 * 
 * Registers title-tag, thumbnails, responsive embeds, block styles,
 * navigation menus (primary, footer, service), and custom logo.
 * 
 * @since 1.0.0
 * @uses add_theme_support() To enable theme features
 * @uses register_nav_menus() To register navigation menu locations
 * @hook after_setup_theme Fires during theme initialization
 * @return void
 */
function travaaccount_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style('build/editor/block-editor.css');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'travaaccount'),
        'footer' => esc_html__('Footer Menu', 'travaaccount'),
		'service' => esc_html__('Service Menu', 'travaaccount'),
    ));
    
    // Add custom logo support
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true
    ));
}
add_action('after_setup_theme', 'travaaccount_setup');

/**
 * Include Required Files
 */
require_once TRAVAACCOUNT_THEME_TEMPLATES . '/includes/enqueue-scripts.php';
require_once TRAVAACCOUNT_THEME_TEMPLATES . '/includes/block-registration.php';
require_once TRAVAACCOUNT_THEME_TEMPLATES . '/includes/register-settings.php';
require_once TRAVAACCOUNT_THEME_TEMPLATES . '/includes/branding-settings.php';

/**
 * Set Content Width
 */
if (!isset($content_width)) {
    $content_width = 1200;
}

/**
 * Adds 'hfeed' class to body on archive pages for hAtom microformat.
 * 
 * @since 1.0.0
 * @param array $classes An array of existing body classes
 * @uses is_singular() To check if page displays a single post/page
 * @hook body_class Filters the list of CSS body classes
 * @return array Modified array of body classes with 'hfeed' added on archives
 */
function travaaccount_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    return $classes;
}
add_filter('body_class', 'travaaccount_body_classes');