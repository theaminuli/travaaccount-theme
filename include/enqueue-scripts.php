<?php
/**
 * Enqueue Scripts and Styles
 * 
 * Loads CSS and JavaScript for frontend and admin areas.
 * Supports RTL and dynamic branding CSS variables.
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
 * Enqueues frontend styles and scripts with RTL support.
 * 
 * @since 1.0.0
 * @return void
 */
function travaaccount_enqueue_assets() {
    // Theme stylesheet
    wp_enqueue_style(
        'travaaccount-style',
        get_stylesheet_uri(),
        array(),
        TRAVAACCOUNT_THEME_VERSION
    );

	$asset_file = include TRAVAACCOUNT_THEME_DIR . '/build/frontend/theme.asset.php';
    $editor_asset_file = include TRAVAACCOUNT_THEME_DIR . '/build/editor/block-editor.asset.php';
    // Main theme CSS
	if (is_rtl()) {
		wp_enqueue_style(
			'travaaccount-main',
			TRAVAACCOUNT_THEME_URI . '/build/frontend/theme-rtl.css',
			array(),
			$asset_file['version']
		);
		wp_enqueue_style(
			'travaaccount-block-editor',
			TRAVAACCOUNT_THEME_URI . '/build/editor/block-editor-rtl.css',
			array(),
			$editor_asset_file['version']
		);
	} else {
		wp_enqueue_style(
			'travaaccount-main',
			TRAVAACCOUNT_THEME_URI . '/build/frontend/theme.css',
			array(),
			$asset_file['version']
		);
		wp_enqueue_style(
			'travaaccount-block-editor',
			TRAVAACCOUNT_THEME_URI . '/build/editor/block-editor.css',
			array(),
			$editor_asset_file['version']
		);
	}
    
    // Main theme JS
    wp_enqueue_script(
        'travaaccount-script',
        TRAVAACCOUNT_THEME_URI . '/build/frontend/theme.js',
        array(),
        $asset_file['version'],
        true
    );
    
    // Output branding CSS variables
    travaaccount_output_branding_css();
}
add_action('wp_enqueue_scripts', 'travaaccount_enqueue_assets');


/**
 * Enqueues admin panel styles and scripts with RTL support.
 * 
 * @since 1.0.0
 * @param string $hook Current admin page
 * @return void
 */
function travaaccount_enqueue_admin_assets($hook) {
    // if ($hook !== 'appearance_page_travaaccount-settings') {
    //     return;
    // }
	$admin_asset_file = include TRAVAACCOUNT_THEME_DIR . '/build/admin/settings-tabs.asset.php';
	// Enqueue SCSS (compiled CSS)
	if (is_rtl()) {
		wp_enqueue_style(
			'travaaccount-settings-tabs',
			TRAVAACCOUNT_THEME_URI . '/build/admin/settings-tabs-rtl.css',
			array(),
			$admin_asset_file['version']
		);
	} else {
		wp_enqueue_style(
			'travaaccount-settings-tabs',
			TRAVAACCOUNT_THEME_URI . '/build/admin/settings-tabs.css',
			array(),
			$admin_asset_file['version']
		);
	}

    // Enqueue JavaScript
    wp_enqueue_script(
        'travaaccount-settings-tabs',
		TRAVAACCOUNT_THEME_URI . '/build/admin/settings-tabs.js',
        array(),
        $admin_asset_file['version'],
        true
    );
	
}
add_action('admin_enqueue_scripts', 'travaaccount_enqueue_admin_assets');


/**
 * Enqueues custom styles for the Gutenberg block editor.
 *
 * This function registers and enqueues a custom CSS stylesheet specifically
 * for the WordPress block editor (Gutenberg). The stylesheet is loaded only
 * in the admin editor interface, not on the front-end of the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function travaaccount_enqueue_block_editor_assets() {
	$editor_asset_file = include TRAVAACCOUNT_THEME_DIR . '/build/editor/block-editor.asset.php';
    if (is_rtl()) {
		wp_enqueue_style(
			'travaaccount-block-editor',
			TRAVAACCOUNT_THEME_URI . '/build/editor/block-editor-rtl.css',
			array(),
			$editor_asset_file['version']
		);
	} else {
		wp_enqueue_style(
			'travaaccount-block-editor',
			TRAVAACCOUNT_THEME_URI . '/build/editor/block-editor.css',
			array(),
			$editor_asset_file['version']
		);
	}
	
	// Get branding CSS and fonts
	$branding = travaaccount_get_branding_css();
	
	// Add inline CSS variables
	wp_add_inline_style('travaaccount-block-editor', $branding['css']);
	
	// Load Google Fonts for editor
	if (!empty($branding['fonts'])) {
		$fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', $branding['fonts']) . '&display=swap';
		wp_enqueue_style('travaaccount-editor-fonts', $fonts_url, array(), null);
	}
}
add_action('enqueue_block_editor_assets', 'travaaccount_enqueue_block_editor_assets');

/**
 * Gets branding options and generates CSS variables.
 * 
 * @since 1.0.0
 * @return array Associative array with 'css' and 'fonts' keys
 */
function travaaccount_get_branding_css() {
	// Get branding options
	$primary_color = get_option('travaaccount_primary_color', '#C3F53C');
	$secondary_color = get_option('travaaccount_secondary_color', '#0F160C');
	$heading_color = get_option('travaaccount_heading_color', '#222222');
	$text_color = get_option('travaaccount_text_color', '#474747');
	$footer_text_color = get_option('travaaccount_footer_text_color', '#C0BFBF');
	$bg_color = get_option('travaaccount_bg_color', '#F6F6F6');
	
	$heading_font = get_option('travaaccount_heading_font', 'Instrument Sans');
	$body_font = get_option('travaaccount_body_font', 'Instrument Sans');
	$base_font_size = get_option('travaaccount_base_font_size', '16');
	
	$button_radius = get_option('travaaccount_button_radius', '50');
	$button_padding_x = get_option('travaaccount_button_padding_x', '32');
	$button_padding_y = get_option('travaaccount_button_padding_y', '16');
	
	$section_padding = get_option('travaaccount_section_padding', '80');
	$container_width = get_option('travaaccount_container_width', '1400');
	
	// Generate CSS
	$css = "
		:root {
			--color-primary: {$primary_color};
			--color-secondary: {$secondary_color};
			--color-heading: {$heading_color};
			--color-text: {$text_color};
			--color-footer-text: {$footer_text_color};
			--color-bg: {$bg_color};
			
			--font-heading: '{$heading_font}', sans-serif;
			--font-body: '{$body_font}', sans-serif;
			--font-size-base: {$base_font_size}px;
			--font-size-h1: calc({$base_font_size}px * 3);
			--font-size-h2: calc({$base_font_size}px * 2.5);
			--font-size-h3: calc({$base_font_size}px * 2);
			--font-size-h4: calc({$base_font_size}px * 1.5);
			--font-size-h5: calc({$base_font_size}px * 1.25);
			--font-size-h6: {$base_font_size}px;
			
			--button-radius: {$button_radius}px;
			--button-padding-x: {$button_padding_x}px;
			--button-padding-y: {$button_padding_y}px;
			
			--section-padding: {$section_padding}px;
			--container-width: {$container_width}px;
		}
	";
	
	// Generate fonts array
	$fonts = array();
	if (!empty($heading_font) && $heading_font !== 'inherit') {
		$fonts[] = str_replace(' ', '+', $heading_font) . ':ital,wght@0,400..700;1,400..700';
	}
	if (!empty($body_font) && $body_font !== 'inherit' && $body_font !== $heading_font) {
		$fonts[] = str_replace(' ', '+', $body_font) . ':ital,wght@0,400..700;1,400..700';
	}
	
	return array(
		'css' => $css,
		'fonts' => $fonts
	);
}

/**
 * Outputs CSS variables and loads Google Fonts.
 * 
 * Generates inline CSS with custom properties for colors, typography,
 * buttons, and layout. Loads Google Fonts with preconnect optimization.
 * 
 * @since 1.0.0
 * @return void
 */
function travaaccount_output_branding_css() {
	$branding = travaaccount_get_branding_css();
	
	// Output CSS
	echo '<style id="travaaccount-branding">' . $branding['css'] . '</style>';
	
	// Load Google Fonts if needed
	if (!empty($branding['fonts'])) {
		$fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', $branding['fonts']) . '&display=swap';
		echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
		echo '<link href="' . esc_url($fonts_url) . '" rel="stylesheet">';
	}
}
