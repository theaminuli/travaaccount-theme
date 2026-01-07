<?php
/**
 * Template Name: Page (Full Width)
 * Template Post Type: page
 * 
 * Full width page template without container constraints.
 * Ideal for landing pages and full-width layouts.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('full-width-template'); ?>>
                <div class="site-container" style="max-width: 100%; padding: 0;">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
