<?php
/**
 * Branding Settings Page
 * 
 * Admin settings interface with tabs for colors, typography, buttons,
 * layout, and contact info.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include admin menu
require_once get_template_directory() . '/includes/admin-menu.php';

/**
 * Renders the settings page HTML with tabbed interface.
 * 
 * Checks capabilities, uses Settings API, includes color pickers,
 * font selectors, and form fields for all theme options.
 * 
 * @since 1.0.0
 * @return void
 */
function travaaccount_settings_page() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Save settings message
    if (isset($_GET['settings-updated'])) {
        add_settings_error(
            'travaaccount_messages',
            'travaaccount_message',
            __('Settings Saved Successfully!', 'travaaccount'),
            'updated'
        );
    }
    
    settings_errors('travaaccount_messages');
    
    // Google Fonts list
    $google_fonts = array(
        'inherit' => 'System Default',
        'Poppins' => 'Poppins',
        'Inter' => 'Inter',
        'Roboto' => 'Roboto',
		'Rubik' => 'Rubik',
        'Open Sans' => 'Open Sans',
        'Lato' => 'Lato',
        'Montserrat' => 'Montserrat',
		'Instrument Sans' => 'Instrument Sans',
		'Nunito' => 'Nunito',
        'Raleway' => 'Raleway',
        'Playfair Display' => 'Playfair Display',
        'Merriweather' => 'Merriweather',
        'Work Sans' => 'Work Sans'
    );
    ?>
    
    <div class="wrap travaaccount-settings">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <form action="options.php" method="post">
            <?php settings_fields('travaaccount_branding'); ?>
            
            <!-- Tab Navigation -->
            <div class="nav-tab-wrapper">
                <a href="#colors" class="nav-tab nav-tab-active"><?php _e('Colors', 'travaaccount'); ?></a>
                <a href="#typography" class="nav-tab"><?php _e('Typography', 'travaaccount'); ?></a>
                <a href="#buttons" class="nav-tab"><?php _e('Buttons', 'travaaccount'); ?></a>
                <a href="#layout" class="nav-tab"><?php _e('Layout', 'travaaccount'); ?></a>
				<a href="#contact" class="nav-tab"><?php _e('Contact', 'travaaccount'); ?></a>
            </div>
            
            <div class="travaaccount-settings-tabs">
                
                <!-- Colors Section -->
                <div id="colors" class="settings-section tab-content active">
                    <h2><?php _e('Color Settings', 'travaaccount'); ?></h2>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_primary_color"><?php _e('Primary Color', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="color" 
                                       id="travaaccount_primary_color" 
                                       name="travaaccount_primary_color" 
                                       value="<?php echo esc_attr(get_option('travaaccount_primary_color', '#9EFF00')); ?>">
                                <p class="description"><?php _e('Used for buttons, links, and accents', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_secondary_color"><?php _e('Secondary Color', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="color" 
                                       id="travaaccount_secondary_color" 
                                       name="travaaccount_secondary_color" 
                                       value="<?php echo esc_attr(get_option('travaaccount_secondary_color', '#1A1A1A')); ?>">
                                <p class="description"><?php _e('Used for headers and dark sections', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        <tr>
							<th scope="row">
								<label for="travaaccount_heading_color"><?php _e('Heading Color', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="color" 
									   id="travaaccount_heading_color" 
									   name="travaaccount_heading_color" 
									   value="<?php echo esc_attr(get_option('travaaccount_heading_color', '#222222')); ?>">
								<p class="description"><?php _e('Color for headings (H1-H6)', 'travaaccount'); ?></p>
							</td>
						</tr>
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_text_color"><?php _e('Text Color', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="color" 
                                       id="travaaccount_text_color" 
                                       name="travaaccount_text_color" 
                                       value="<?php echo esc_attr(get_option('travaaccount_text_color', '#333333')); ?>">
                                <p class="description"><?php _e('Main body text color', 'travaaccount'); ?></p>
                            </td>
                        </tr>
						<tr>
							<th scope="row">
								<label for="travaaccount_footer_text_color"><?php _e('Footer Text Color', 'travaaccount'); ?></label>
							</th>
                            <td>
                                <input type="color" 
                                       id="travaaccount_footer_text_color" 
                                       name="travaaccount_footer_text_color" 
                                       value="<?php echo esc_attr(get_option('travaaccount_footer_text_color', '#DAE2EC')); ?>">
                                <p class="description"><?php _e('Footer text color', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_bg_color"><?php _e('Background Color', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="color" 
                                       id="travaaccount_bg_color" 
                                       name="travaaccount_bg_color" 
                                       value="<?php echo esc_attr(get_option('travaaccount_bg_color', '#FFFFFF')); ?>">
                                <p class="description"><?php _e('Main background color', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- Typography Section -->
                <div id="typography" class="settings-section tab-content">
                    <h2><?php _e('Typography Settings', 'travaaccount'); ?></h2>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_heading_font"><?php _e('Heading Font', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <select id="travaaccount_heading_font" name="travaaccount_heading_font">
                                    <?php
                                    $current_heading_font = get_option('travaaccount_heading_font', 'Instrument Sans');
                                    foreach ($google_fonts as $value => $label) {
                                        printf(
                                            '<option value="%s" %s>%s</option>',
                                            esc_attr($value),
                                            selected($current_heading_font, $value, false),
                                            esc_html($label)
                                        );
                                    }
                                    ?>
                                </select>
                                <p class="description"><?php _e('Font for headings (H1-H6)', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_body_font"><?php _e('Body Font', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <select id="travaaccount_body_font" name="travaaccount_body_font">
                                    <?php
                                    $current_body_font = get_option('travaaccount_body_font', 'Instrument Sans');
                                    foreach ($google_fonts as $value => $label) {
                                        printf(
                                            '<option value="%s" %s>%s</option>',
                                            esc_attr($value),
                                            selected($current_body_font, $value, false),
                                            esc_html($label)
                                        );
                                    }
                                    ?>
                                </select>
                                <p class="description"><?php _e('Font for body text', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_base_font_size"><?php _e('Base Font Size', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="range" 
                                       id="travaaccount_base_font_size" 
                                       name="travaaccount_base_font_size" 
                                       min="14" 
                                       max="20" 
                                       value="<?php echo esc_attr(get_option('travaaccount_base_font_size', 16)); ?>"
                                       oninput="this.nextElementSibling.value = this.value + 'px'">
                                <output><?php echo esc_html(get_option('travaaccount_base_font_size', 16)); ?>px</output>
                                <p class="description"><?php _e('Base font size (headings scale automatically)', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- Button Settings -->
                <div id="buttons" class="settings-section tab-content">
                    <h2><?php _e('Button Settings', 'travaaccount'); ?></h2>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_button_radius"><?php _e('Button Border Radius', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="range" 
                                       id="travaaccount_button_radius" 
                                       name="travaaccount_button_radius" 
                                       min="0" 
                                       max="50" 
                                       value="<?php echo esc_attr(get_option('travaaccount_button_radius', 50)); ?>"
                                       oninput="this.nextElementSibling.value = this.value + 'px'">
                                <output><?php echo esc_html(get_option('travaaccount_button_radius', 50)); ?>px</output>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_button_padding_x"><?php _e('Button Horizontal Padding', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="range" 
                                       id="travaaccount_button_padding_x" 
                                       name="travaaccount_button_padding_x" 
                                       min="16" 
                                       max="64" 
                                       value="<?php echo esc_attr(get_option('travaaccount_button_padding_x', 32)); ?>"
                                       oninput="this.nextElementSibling.value = this.value + 'px'">
                                <output><?php echo esc_html(get_option('travaaccount_button_padding_x', 32)); ?>px</output>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_button_padding_y"><?php _e('Button Vertical Padding', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="range" 
                                       id="travaaccount_button_padding_y" 
                                       name="travaaccount_button_padding_y" 
                                       min="8" 
                                       max="32" 
                                       value="<?php echo esc_attr(get_option('travaaccount_button_padding_y', 16)); ?>"
                                       oninput="this.nextElementSibling.value = this.value + 'px'">
                                <output><?php echo esc_html(get_option('travaaccount_button_padding_y', 16)); ?>px</output>
                            </td>
                        </tr>
                    </table>
					<h2><?php _e('Header CTA Button', 'travaaccount'); ?></h2>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_cta_text"><?php _e('CTA Button Text', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="text" 
                                       id="travaaccount_cta_text" 
                                       name="travaaccount_cta_text" 
                                       value="<?php echo esc_attr(get_option('travaaccount_cta_text', 'Get Started')); ?>"
                                       class="regular-text">
                                <p class="description"><?php _e('Text displayed on the header CTA button', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_cta_url"><?php _e('CTA Button URL', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="text" 
                                       id="travaaccount_cta_url" 
                                       name="travaaccount_cta_url" 
                                       value="<?php echo esc_attr(get_option('travaaccount_cta_url', '#contact')); ?>"
                                       class="regular-text"
                                       placeholder="https://example.com or #section">
                                <p class="description"><?php _e('URL for the header CTA button (can be a full URL or anchor link like #contact)', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- Layout Settings -->
                <div id="layout" class="settings-section tab-content">
                    <h2><?php _e('Layout Settings', 'travaaccount'); ?></h2>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_section_padding"><?php _e('Section Padding', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="range" 
                                       id="travaaccount_section_padding" 
                                       name="travaaccount_section_padding" 
                                       min="40" 
                                       max="120" 
                                       value="<?php echo esc_attr(get_option('travaaccount_section_padding', 80)); ?>"
                                       oninput="this.nextElementSibling.value = this.value + 'px'">
                                <output><?php echo esc_html(get_option('travaaccount_section_padding', 80)); ?>px</output>
                                <p class="description"><?php _e('Vertical padding for sections', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="travaaccount_container_width"><?php _e('Container Max Width', 'travaaccount'); ?></label>
                            </th>
                            <td>
                                <input type="range" 
                                       id="travaaccount_container_width" 
                                       name="travaaccount_container_width" 
                                       min="960" 
                                       max="1900" 
                                       step="40"
                                       value="<?php echo esc_attr(get_option('travaaccount_container_width', 1400)); ?>"
                                       oninput="this.nextElementSibling.value = this.value + 'px'">
                                <output><?php echo esc_html(get_option('travaaccount_container_width', 1400)); ?>px</output>
                                <p class="description"><?php _e('Maximum width for content containers', 'travaaccount'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                
				<!-- Contact Section -->
				<div id="contact" class="settings-section tab-content">
					<h2><?php _e('Contact Settings', 'travaaccount'); ?></h2>
					
					<table class="form-table">
						<tr>
							<th scope="row">
								<label for="travaaccount_contact_description"><?php _e('Description ', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="text" 
									style="width: 100%; height: 100px;"
									id="travaaccount_contact_description" 
									name="travaaccount_contact_description"
									placeholder="Enter description"
									value="<?php echo esc_attr(get_option('travaaccount_contact_description', '')); ?>">
							</td>
						</tr>`
						<tr>
							<th scope="row">
								<label for="travaaccount_contact_location"><?php _e('Location', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="text" 
									style="width: 100%; height: 40px;"
									id="travaaccount_contact_location" 
									name="travaaccount_contact_location" 
									placeholder="Enter location"
									value="<?php echo esc_attr(get_option('travaaccount_contact_location', '')); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="travaaccount_contact_phone"><?php _e('Phone', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="text" 
									style="width: 100%; height: 40px;"
									id="travaaccount_contact_phone" 
									name="travaaccount_contact_phone" 
									placeholder="Enter phone number"
									value="<?php echo esc_attr(get_option('travaaccount_contact_phone', '')); ?>">
							</td>
						</tr>
					</table>
					<h2 style="margin-top:40px;"><?php _e('Social Media Links', 'travaaccount'); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row">
								<label for="travaaccount_twitter_url"><?php _e('Twitter URL', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="url" 
									style="width: 100%; height: 40px;"
									id="travaaccount_twitter_url" 
									name="travaaccount_twitter_url" 
									placeholder="Enter Twitter profile URL"
									value="<?php echo esc_attr(get_option('travaaccount_twitter_url', '')); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="travaaccount_instagram_url"><?php _e('Instagram URL', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="url" 
									style="width: 100%; height: 40px;"
									id="travaaccount_instagram_url" 
									name="travaaccount_instagram_url" 
									placeholder="Enter Instagram profile URL"
									value="<?php echo esc_attr(get_option('travaaccount_instagram_url', '')); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="travaaccount_youtube_url"><?php _e('YouTube URL', 'travaaccount'); ?></label>
							</th>
							<td>
								<input type="url" 
									style="width: 100%; height: 40px;"
									id="travaaccount_youtube_url" 
									name="travaaccount_youtube_url" 
									placeholder="Enter YouTube channel URL"
									value="<?php echo esc_attr(get_option('travaaccount_youtube_url', '')); ?>">
							</td>
						</tr>
					</table>
				</div>
            
            <?php submit_button(__('Save Settings', 'travaaccount')); ?>
        </form>
    </div>
    
    <?php
}