<?php
/**
 * The Footer Template
 * 
 * Displays footer with about, navigation, services, contact sections,
 * social icons, and copyright.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 */
?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- About Section -->
            <div class="footer-widget footer-about">
                <h2 class="footer-logo"><?php bloginfo('name'); ?></h2>
                <p class="footer-description">
                    <?php 
                    $description = get_bloginfo('description');
                    echo $description ? esc_html($description) : esc_html__('We are dedicated financial experts, providing top-notch accounting services to businesses of all sizes.', 'travaaccount');
                    ?>
                </p>
                <div class="footer-social">
                    <a href="<?php echo esc_url(get_option('travaaccount_twitter_url', '#')); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Twitter', 'travaaccount'); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(get_option('travaaccount_instagram_url', '#')); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Instagram', 'travaaccount'); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(get_option('travaaccount_youtube_url', '#')); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('YouTube', 'travaaccount'); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Navigation Section -->
            <div class="footer-widget footer-navigation">
                <h3 class="footer-title"><?php esc_html_e('Navigation', 'travaaccount'); ?></h3>
                 <?php
					wp_nav_menu(array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu-company',
						'container'      => false,
						'fallback_cb'    => '__return_false',
					));
				?>
            </div>

            <!-- Services Section -->
            <div class="footer-widget footer-services">
                <h3 class="footer-title"><?php esc_html_e('Services', 'travaaccount'); ?></h3>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'service',
						'menu_id'        => 'footer-menu-service',
						'container'      => false,
						'fallback_cb'    => '__return_false',
					));
				?>
            </div>

            <!-- Contact Us Section -->
            <div class="footer-widget footer-contact">
                <h3 class="footer-title"><?php esc_html_e('Contact Us', 'travaaccount'); ?></h3>
                <p class="footer-contact-text">
                    <?php echo esc_html(get_option('travaaccount_contact_description')) ?>
                </p>
                <ul class="footer-contact-info">
                    <li class="footer-contact-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span><?php echo esc_html(get_option('travaaccount_contact_location')); ?></span>
                    </li>
                    <li class="footer-contact-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php echo esc_html(get_option('travaaccount_contact_phone')); ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="footer-copyright">
                    <?php
                    printf(
                        /* translators: 1: Copyright year, 2: Site name */
                        esc_html__('Copyright © %1$s %2$s', 'travaaccount'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                    <span class="footer-separator">|</span>
                    <?php esc_html_e('Design by Zayd', 'travaaccount'); ?>
                </p>
                <div class="footer-bottom-links">
                    <a href="<?php echo esc_url(home_url('/terms-of-use')); ?>"><?php esc_html_e('Terms of Use', 'travaaccount'); ?></a>
                    <span class="footer-separator">|</span>
                    <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php esc_html_e('Privacy Policy', 'travaaccount'); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>