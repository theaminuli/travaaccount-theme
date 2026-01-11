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
 * Registers custom blocks and adds TravaAccount block category.
 * 
 * Adds 'TravaAccount Blocks' category and registers blocks from
 * /blocks/ directory using block.json files.
 * 
 * @since 1.0.0
 * @return void
 */
function travaaccount_register_blocks() {
    // Register block categories
    add_filter('block_categories_all', function($categories) {
        return array_merge(
            array(
                array(
                    'slug' => 'travaaccount',
                    'title' => esc_html__('TravaAccount Blocks', 'travaaccount'),
                    'icon' => 'admin-site'
                )
            ),
            $categories
        );
    });
    
    // Register custom blocks
    $blocks = array(
        'testimonial',
    );
    
    foreach ($blocks as $block) {
        $block_path = TRAVAACCOUNT_THEME_TEMPLATES . '/blocks/' . $block;
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
}
// add_action('init', 'travaaccount_register_blocks');
