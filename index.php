<?php
/**
 * The Main Template File
 * 
 * Fallback template for all content types. Displays page content
 * built with Gutenberg blocks.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="site-container">
                    <?php
                    // Display the page content (Gutenberg blocks)
                    the_content();
                    ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        ?>
        <div class="container">
            <div class="no-content">
                <h1><?php esc_html_e('Nothing Found', 'travaaccount'); ?></h1>
                <p><?php esc_html_e('It seems we can\'t find what you\'re looking for.', 'travaaccount'); ?></p>
            </div>
        </div>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();