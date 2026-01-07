<?php
/**
 * Template Name: Page (No Title)
 * Template Post Type: page
 * 
 * Page template without title display.
 * Perfect for landing pages with custom headers.
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
            <article id="post-<?php the_ID(); ?>" <?php post_class('no-title-template'); ?>>
                <div class="site-container">
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
