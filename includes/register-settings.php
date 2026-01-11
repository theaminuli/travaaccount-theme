<?php
/**
 * Register Settings for TravaAccount Theme
 * 
 * Registers theme settings for colors, typography, buttons, layout,
 * header CTA, contact info, and social media URLs.
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
 * Registers theme settings with WordPress Settings API.
 * 
 * Includes colors, typography, buttons, layout, CTA, contact, and social URLs.
 * All settings have defaults and sanitization callbacks.
 * 
 * @since 1.0.0
 * @uses register_setting() WordPress function to register settings
 * @return void
 */
function travaaccount_register_settings() {
    // Color Settings
    register_setting('travaaccount_branding', 'travaaccount_primary_color', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#C3F53C'
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_secondary_color', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#0F160C'
    ));

	register_setting('travaaccount_branding', 'travaaccount_heading_color', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#222222'
	));
    
    register_setting('travaaccount_branding', 'travaaccount_text_color', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#474747'
    ));
	register_setting('travaaccount_branding', 'travaaccount_footer_text_color', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#C0BFBF'
	));
    
    register_setting('travaaccount_branding', 'travaaccount_bg_color', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#F6F6F6'
    ));
    
    // Typography Settings
    register_setting('travaaccount_branding', 'travaaccount_heading_font', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Instrument Sans'
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_body_font', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Instrument Sans'
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_base_font_size', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 16
    ));
    
    // Button Settings
    register_setting('travaaccount_branding', 'travaaccount_button_radius', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 50
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_button_padding_x', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 32
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_button_padding_y', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 16
    ));

	// Header CTA Settings
    register_setting('travaaccount_branding', 'travaaccount_cta_text', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Let\'s Talk'
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_cta_url', array(
        'type' => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#contact'
    ));
    
    // Layout Settings
    register_setting('travaaccount_branding', 'travaaccount_section_padding', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 80
    ));
    
    register_setting('travaaccount_branding', 'travaaccount_container_width', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 1400
    ));
	// Contact Settings
	register_setting('travaaccount_branding', 'travaaccount_contact_description', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_textarea_field',
		'default' => 'Our Support and Sales team is available 24 /7 to answer your queries.',
	));
	register_setting('travaaccount_branding', 'travaaccount_contact_location', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '123 Main St, Suite 500, London, UK',
	));
	register_setting('travaaccount_branding', 'travaaccount_contact_phone', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '01571273741',
	));

	// Social info
	register_setting('travaaccount_branding', 'travaaccount_twitter_url', array(
		'type' => 'string',
		'sanitize_callback' => 'esc_url_raw',
		'default' => '',
	));
	register_setting('travaaccount_branding', 'travaaccount_instagram_url', array(
		'type' => 'string',
		'sanitize_callback' => 'esc_url_raw',
		'default' => '',
	));
	register_setting('travaaccount_branding', 'travaaccount_youtube_url', array(
		'type' => 'string',
		'sanitize_callback' => 'esc_url_raw',
		'default' => '',
	));
}
add_action('admin_init', 'travaaccount_register_settings');
