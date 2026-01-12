<?php
/**
 * Block Registration
 * 
 * Registers custom Gutenberg blocks and block categories.
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
 * Register custom blocks
 */
function travaaccount_register_blocks() {
    // Check if constant is defined
    if (!defined('TRAVAACCOUNT_THEME_TEMPLATES')) {
        return;
    }
    
    // Register custom blocks
    $blocks = array(
        'testimonial',
    );
    
    foreach ($blocks as $block) {
        $block_path = TRAVAACCOUNT_THEME_TEMPLATES . '/build/blocks/' . $block;
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path, array(
                'render_callback' => 'travaaccount_render_testimonial_block',
            ));
        }
    }
}
add_action('init', 'travaaccount_register_blocks');



/**
 * Add server-side rendering support (optional)
 * This allows for dynamic data fetching if needed
 */
function travaaccount_render_testimonial_block($attributes) {
    // Sanitize and validate all attributes
    $testimonial_text = isset($attributes['testimonialText']) ? wp_kses_post($attributes['testimonialText']) : '';
    $client_name = isset($attributes['clientName']) ? sanitize_text_field($attributes['clientName']) : '';
    $client_position = isset($attributes['clientPosition']) ? sanitize_text_field($attributes['clientPosition']) : '';
    $client_company = isset($attributes['clientCompany']) ? sanitize_text_field($attributes['clientCompany']) : '';
    $rating = isset($attributes['rating']) ? max(0, min(5, intval($attributes['rating']))) : 5;
    $show_rating = isset($attributes['showRating']) ? (bool) $attributes['showRating'] : true;
    $show_image = isset($attributes['showImage']) ? (bool) $attributes['showImage'] : true;
    $client_image = isset($attributes['clientImage']) && is_array($attributes['clientImage']) ? $attributes['clientImage'] : array();
    $alignment = isset($attributes['alignment']) ? sanitize_key($attributes['alignment']) : 'left';
    $image_position = isset($attributes['imagePosition']) ? sanitize_key($attributes['imagePosition']) : 'left';
    $background_color = isset($attributes['backgroundColor']) ? sanitize_hex_color($attributes['backgroundColor']) : '#ffffff';
    $text_color = isset($attributes['textColor']) ? sanitize_hex_color($attributes['textColor']) : '#333333';

    // Build classes
    $classes = array(
        'testimonial-block',
        'testimonial-align-' . esc_attr($alignment),
        'testimonial-image-' . esc_attr($image_position)
    );

    // Start output buffering
    ob_start();
    ?>
    
    <div class="<?php echo esc_attr(implode(' ', $classes)); ?>" style="background-color: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>;">
        <div class="testimonial-content">
            <?php if ($show_image && !empty($client_image['url'])) : ?>
                <div class="testimonial-image-wrapper">
                    <img 
                        src="<?php echo esc_url($client_image['url']); ?>" 
                        alt="<?php echo esc_attr(!empty($client_image['alt']) ? $client_image['alt'] : $client_name); ?>"
                        class="testimonial-image"
                    />
                </div>
            <?php endif; ?>

            <div class="testimonial-text-content">
                <div class="testimonial-quote-icon">❝</div>
                
                <blockquote class="testimonial-quote">
                    <?php echo $testimonial_text; ?>
                </blockquote>

                <?php if ($show_rating) : ?>
                    <div class="testimonial-rating">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <span class="star <?php echo $i <= $rating ? 'filled' : ''; ?>">★</span>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>

                <div class="testimonial-client-info">
                    <div class="client-name"><?php echo esc_html($client_name); ?></div>
                    <div class="client-details">
                        <span class="client-position"><?php echo esc_html($client_position); ?></span>
                        <span class="separator">•</span>
                        <span class="client-company"><?php echo esc_html($client_company); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

/**
 * Optional: Register block patterns for testimonials
 */
function travaaccount_register_testimonial_patterns() {
    // Register a testimonial pattern
    register_block_pattern(
        'travaaccount/testimonial-centered',
        array(
            'title'       => __('Testimonial - Centered', 'travaaccount'),
            'description' => __('A centered testimonial with image on top', 'travaaccount'),
            'categories'  => array('travaaccount'),
            'content'     => '<!-- wp:travaaccount/testimonial {"alignment":"center","imagePosition":"top"} /-->',
        )
    );

    register_block_pattern(
        'travaaccount/testimonial-left',
        array(
            'title'       => __('Testimonial - Image Left', 'travaaccount'),
            'description' => __('A testimonial with image on the left side', 'travaaccount'),
            'categories'  => array('travaaccount'),
            'content'     => '<!-- wp:travaaccount/testimonial {"alignment":"left","imagePosition":"left"} /-->',
        )
    );

    register_block_pattern(
        'travaaccount/testimonial-right',
        array(
            'title'       => __('Testimonial - Image Right', 'travaaccount'),
            'description' => __('A testimonial with image on the right side', 'travaaccount'),
            'categories'  => array('travaaccount'),
            'content'     => '<!-- wp:travaaccount/testimonial {"alignment":"right","imagePosition":"right"} /-->',
        )
    );
}
add_action('init', 'travaaccount_register_testimonial_patterns');

/**
 * Register block pattern category
 */
function travaaccount_register_block_pattern_category() {
    register_block_pattern_category(
        'travaaccount',
        array('label' => __('TravaAccount', 'travaaccount'))
    );
}
add_action('init', 'travaaccount_register_block_pattern_category');
