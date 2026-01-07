<?php
/**
 * The Header Template
 * 
 * Displays site header with logo, navigation, CTA buttons, and mobile menu.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-to-content" href="#main-content">
    <?php esc_html_e('Skip to content', 'travaaccount'); ?>
</a>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo Section -->
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link" rel="home">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 40 40" fill="none">
							<g clip-path="url(#clip0_15_4618)"> <path d="M20 0C8.95437 0 0 8.95437 0 20C0 31.0456 8.95437 40 20 40C31.0456 40 40 31.0456 40 20H35C35 28.2842 28.2842 35 20 35C11.7156 35 5 28.2842 5 20C5 11.7156 11.7156 5 20 5V0ZM20 8.75C13.7869 8.75 8.75 13.7869 8.75 20C8.75 26.2131 13.7869 31.25 20 31.25C26.2131 31.25 31.25 26.2131 31.25 20H26.25C26.25 23.4517 23.4517 26.25 20 26.25C16.5483 26.25 13.75 23.4517 13.75 20C13.75 16.5483 16.5483 13.75 20 13.75V8.75Z" fill="#BBF451"/></g>
							<defs>
								<clipPath id="clip0_15_4618">
									<rect width="40" height="40" fill="white"/>
								</clipPath>
							</defs>
						</svg>
                        <span class="logo-text"><?php bloginfo('name'); ?></span>
                    </a>
                    <?php
                }
                ?>
            </div>

            <!-- Center Navigation -->
            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'travaaccount'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <!-- Right Side CTAs -->
            <div class="header-actions">
                <a href="<?php echo esc_url(get_option('travaaccount_cta_url', '#contact')); ?>" class="btn-lets-talk">
                    <span><?php echo esc_html(get_option('travaaccount_cta_text', __("Let's Talk", 'travaaccount'))); ?></span>
                </a>
                <a href="<?php echo esc_url(get_option('travaaccount_cta_url', '#contact')); ?>" class="btn-icon-circle" aria-label="<?php esc_attr_e('Contact Us', 'travaaccount'); ?>">
                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="20px" xmlns="http://www.w3.org/2000/svg"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                </a>
            </div>

			<!--Mobile Menu  CTAs  -->
			 <div class="header-mobile-actions">
				<a href="<?php echo esc_url(get_option('travaaccount_cta_url', '#contact')); ?>" class="btn-lets-talk">
                    <span><?php echo esc_html(get_option('travaaccount_cta_text', __("Let's Talk", 'travaaccount'))); ?></span>
					<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                </a>
			 </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle Menu', 'travaaccount'); ?>" aria-expanded="false">
                <span class="menu-bar"></span>
                <span class="menu-bar"></span>
                <span class="menu-bar"></span>
            </button>
        </div>
    </div>
</header>