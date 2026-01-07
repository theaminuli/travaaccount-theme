/**
 * TravaAccount Settings Page - Tab Navigation
 * 
 * Handles tab switching for the admin settings page.
 * 
 * @package TravaAccount
 * @version 1.0.0
 * @since 1.0.0
 */

import '../scss/settings-page.scss';

/**
 * Sets up tab click listeners on DOM ready.
 * 
 * @since 1.0.0
 * @listens DOMContentLoaded
 */
document.addEventListener('DOMContentLoaded', function () {
	const navTabs = document.querySelectorAll('.nav-tab');

	/**
	 * Handles tab clicks to show/hide content sections.
	 * 
	 * @param {Event} e - Click event
	 * @listens click
	 */
	navTabs.forEach(function (tab) {
		tab.addEventListener('click', function (e) {
			e.preventDefault();

			// Remove active class from all tabs
			document.querySelectorAll('.nav-tab').forEach(function (navTab) {
				navTab.classList.remove('nav-tab-active');
			});

			document.querySelectorAll('.tab-content').forEach(function (content) {
				content.classList.remove('active');
			});

			// Add active class to clicked tab
			tab.classList.add('nav-tab-active');

			// Show corresponding content
			const target = tab.getAttribute('href');
			const targetContent = document.querySelector(target);
			if (targetContent) {
				targetContent.classList.add('active');
			}
		});
	});
});
