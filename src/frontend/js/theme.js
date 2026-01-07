import '../scss/theme.scss';

/**
 * TravaAccount Theme JavaScript
 * 
 * Main frontend functionality for the TravaAccount WordPress theme.
 * Handles mobile menu, header scroll effects, smooth scrolling, animations,
 * and lazy loading of images.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 */

(function () {
	'use strict';

	/**
	 * Initializes mobile menu functionality.
	 * 
	 * Handles mobile menu toggle, moves CTAs into navigation on mobile devices,
	 * and manages menu state changes based on viewport width. Also handles
	 * click outside, escape key, and window resize events.
	 * 
	 * @since 1.0.0
	 * @return {void}
	 */
	const initMobileMenu = () => {
		const menuToggle = document.querySelector('.mobile-menu-toggle');
		const navigation = document.querySelector('.main-navigation');

		if (!menuToggle || !navigation) return;

		/**
		 * Moves CTA buttons into the mobile navigation menu.
		 * 
		 * On mobile devices (≤768px), moves the header CTA buttons into the
		 * navigation menu. On larger screens, moves them back to their original
		 * position in the header.
		 * 
		 * @since 1.0.0
		 * @return {void}
		 */
		const moveMobileCTAs = () => {
			const mobileActions = document.querySelector('.header-mobile-actions');
			const navMenu = document.querySelector('.nav-menu');

			if (mobileActions && navMenu && window.innerWidth <= 768) {
				// Check if already moved
				if (!navMenu.contains(mobileActions)) {
					const liWrapper = document.createElement('li');
					liWrapper.className = 'menu-item-mobile-cta';
					liWrapper.appendChild(mobileActions);
					navMenu.appendChild(liWrapper);
					mobileActions.style.display = 'flex';
				}
			} else if (mobileActions && window.innerWidth > 768) {
				// Move back to original position on desktop
				const liWrapper = document.querySelector('.menu-item-mobile-cta');
				if (liWrapper) {
					const headerInner = document.querySelector('.header-inner');
					if (headerInner) {
						headerInner.appendChild(mobileActions);
						liWrapper.remove();
						mobileActions.style.display = 'none';
					}
				}
			}
		};

		// Initial move
		moveMobileCTAs();

		// Handle window resize
		let resizeTimer;
		window.addEventListener('resize', () => {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(moveMobileCTAs, 150);
		});

		menuToggle.addEventListener('click', () => {
			const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

			menuToggle.setAttribute('aria-expanded', !isExpanded);
			navigation.classList.toggle('active');
			document.body.classList.toggle('menu-open');
		});

		// Close menu when clicking outside
		document.addEventListener('click', (e) => {
			if (!navigation.contains(e.target) && !menuToggle.contains(e.target)) {
				menuToggle.setAttribute('aria-expanded', 'false');
				navigation.classList.remove('active');
				document.body.classList.remove('menu-open');
			}
		});

		// Close menu on escape key
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape' && navigation.classList.contains('active')) {
				menuToggle.setAttribute('aria-expanded', 'false');
				navigation.classList.remove('active');
				document.body.classList.remove('menu-open');
				menuToggle.focus();
			}
		});
	};

	/**
	 * Initializes header scroll effect.
	 * 
	 * Adds a 'scrolled' class to the site header when the user scrolls
	 * past 100 pixels from the top of the page. This allows for styling
	 * changes such as background color or shadow on scroll.
	 * 
	 * @since 1.0.0
	 * @return {void}
	 */
	const initHeaderScroll = () => {
		const header = document.querySelector('.site-header');
		if (!header) return;

		let lastScroll = 0;

		window.addEventListener('scroll', () => {
			const currentScroll = window.pageYOffset;

			if (currentScroll > 100) {
				header.classList.add('scrolled');
			} else {
				header.classList.remove('scrolled');
			}

			lastScroll = currentScroll;
		});
	};

	/**
	 * Initializes smooth scrolling for anchor links.
	 * 
	 * Enables smooth scrolling behavior for all anchor links that point to
	 * page sections (href starting with #). Accounts for header height offset
	 * and closes the mobile menu if it's open.
	 * 
	 * @since 1.0.0
	 * @return {void}
	 */
	const initSmoothScroll = () => {
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function (e) {
				const href = this.getAttribute('href');

				// Skip if it's just "#"
				if (href === '#') {
					e.preventDefault();
					return;
				}

				const target = document.querySelector(href);
				if (target) {
					e.preventDefault();

					const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
					const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

					window.scrollTo({
						top: targetPosition,
						behavior: 'smooth'
					});

					// Close mobile menu if open
					const navigation = document.querySelector('.main-navigation');
					const menuToggle = document.querySelector('.mobile-menu-toggle');
					if (navigation?.classList.contains('active')) {
						navigation.classList.remove('active');
						menuToggle?.setAttribute('aria-expanded', 'false');
						document.body.classList.remove('menu-open');
					}
				}
			});
		});
	};

	/**
	 * Initializes fade-in animations using Intersection Observer.
	 * 
	 * Uses the Intersection Observer API to detect when elements enter the
	 * viewport and adds a 'fade-in' class to trigger CSS animations. Observes
	 * service cards, testimonials, and CTA sections.
	 * 
	 * @since 1.0.0
	 * @return {void}
	 */
	const initAnimations = () => {
		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('fade-in');
					observer.unobserve(entry.target);
				}
			});
		}, {
			threshold: 0.1,
			rootMargin: '0px 0px -50px 0px'
		});

		// Observe service cards, testimonials, etc.
		document.querySelectorAll('.service-card, .testimonial-content, .cta-section').forEach(el => {
			observer.observe(el);
		});
	};

	/**
	 * Initializes lazy loading for images.
	 * 
	 * Uses the Intersection Observer API to load images only when they enter
	 * the viewport. Images should have a 'data-src' attribute containing the
	 * actual image URL.
	 * 
	 * @since 1.0.0
	 * @return {void}
	 */
	const initLazyLoad = () => {
		const images = document.querySelectorAll('img[data-src]');

		const imageObserver = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					const img = entry.target;
					img.src = img.dataset.src;
					img.removeAttribute('data-src');
					imageObserver.unobserve(img);
				}
			});
		});

		images.forEach(img => imageObserver.observe(img));
	};

	/**
	 * Main initialization function.
	 * 
	 * Called when the DOM is ready. Initializes all theme functionality
	 * including mobile menu, header scroll, smooth scrolling, animations,
	 * and lazy loading.
	 * 
	 * @since 1.0.0
	 * @return {void}
	 */
	const init = () => {
		initMobileMenu();
		initHeaderScroll();
		initSmoothScroll();
		initAnimations();
		initLazyLoad();
	};

	// Run on DOM ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

})();