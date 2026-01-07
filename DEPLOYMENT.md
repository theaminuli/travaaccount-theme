# TravaAccount Theme - Deployment Guide

## Quick Start (5 Minutes)

### Step 1: Install the Theme or guthub way

1. Download the theme folder as ZIP
2. Go to WordPress Admin → Appearance → Themes → Add New
3. Click "Upload Theme" and select the ZIP file
4. Click "Install Now" then "Activate"
OR (for developers)
1. Clone the repository into `wp-content/themes/travaaccount-theme`
2. Run `npm install` to install dependencies
3. Run `npm run build` to compile assets

### Step 2: Configure Basic Settings

1. **Menus**: Go to Appearance → Menus
   - Create a menu called "Primary Menu"
   - Add pages: Home, About, Services, Contact
   - Assign to "Primary Menu" location
   - Assign to  "Footer Menu" location for footer links
   - Assign to "Service Menu" location for service links
2. **Branding Colors**: Go to Appearance → TravaAccount Settings
   - Set Primary Color: `#C3F53C` (lime green) - or customize to your preference
   - Set Secondary Color: `#0F160C` (dark green/black)
   - Save changes

### Step 3: Create Homepage

1. Go to Pages → Add New
2. Title: "Home"
3. Add blocks to your page: (Optional)
   - Use standard WordPress blocks (Heading, Paragraph, Columns, etc.)
   - **Testimonial Block** (custom block available in block inserter)
   - Combine blocks to create your desired layout
4. Publish the page
5. Go to Settings → Reading → Set "Home" as your homepage

### Step 4: Add Content

#### Using WordPress Blocks (Just Examples):
- Use the **Cover** block for hero sections with background images
- Use **Columns** block for service grids and multi-column layouts
- Use **Testimonial Block** (custom) for client testimonials
- Use **Group** blocks with background colors for CTA sections
- Combine **Heading**, **Paragraph**, and **Button** blocks for content
#### Hero Section:
- Copy this code
- Copy code paste in pragraph block
```
<!-- wp:group {"tagName":"section","className":"travaaccount-hero","style":{"color":{"background":"#0f160c"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group travaaccount-hero has-background" style="background-color:#0f160c"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"travaaccount-hero-content","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group travaaccount-hero-content"><!-- wp:heading {"style":{"layout":{"selfStretch":"fit","flexSize":null},"color":{"text":"#ffffff"},"elements":{"link":{"color":{"text":"#ffffff"}}}}} -->
<h2 class="wp-block-heading has-text-color has-link-color" style="color:#ffffff">Accounting<br><strong>Redefined</strong><br>For Growth</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<p class="has-white-color has-text-color has-link-color">TravAccount helps startups, freelancers, and small businesses stay compliant, make smarter financial decisions, and save valuable time.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Book a Free Consultation</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:image {"id":23,"sizeSlug":"full","linkDestination":"none","className":"travaaccount-hero-image"} -->
<figure class="wp-block-image size-full travaaccount-hero-image"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Frame-1984077666.png" alt="" class="wp-image-23"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
```
#### Services Grid:
- Copy this code
- Copy code paste in pragraph block
```<!-- wp:group {"tagName":"section","className":"travaaccount-service","layout":{"type":"constrained"}} -->
<section class="wp-block-group travaaccount-service"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
<div class="wp-block-group"><!-- wp:group {"className":"travaaccount-service-box","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group travaaccount-service-box"><!-- wp:image {"id":52,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Icon.png" alt="" class="wp-image-52"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Bookkeeping</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Accurate and timely bookkeeping services to keep your financial records organized and up-to-date.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"travaaccount-service-box","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group travaaccount-service-box"><!-- wp:image {"id":52,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Icon.png" alt="" class="wp-image-52"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Bookkeeping</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Accurate and timely bookkeeping services to keep your financial records organized and up-to-date.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"travaaccount-service-box","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group travaaccount-service-box"><!-- wp:image {"id":60,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Icon-1.png" alt="" class="wp-image-60"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Tax Planning</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Strategic tax planning to minimize your tax liabilities and maximize your savings.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"travaaccount-service-box","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group travaaccount-service-box"><!-- wp:image {"id":61,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Icon-2.png" alt="" class="wp-image-61"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Audit Services</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Thorough audit services to ensure compliance and identify areas for improvement.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"travaaccount-service-image-box","layout":{"type":"constrained","wideSize":""}} -->
<div class="wp-block-group travaaccount-service-image-box"><!-- wp:image {"id":53,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Card.png" alt="" class="wp-image-53"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Start your growth Journey</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"className":"travaaccount-button"} -->
<div class="wp-block-buttons travaaccount-button"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get in Touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
```

#### Testimonial Block Section:
The testimonial block has been intentionally skipped, as it requires the development of a custom Gutenberg block. If time is allocated next week, I will be able to develop and integrate this custom block. Apart from this, all other aspects of the work have been completed, as you can see.
#### CTA Section:
- Copy this code
- Copy code paste in pragraph block
```<!-- wp:group {"tagName":"section","className":"travaaccount-cta","style":{"color":{"background":"#f4f4f5"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group travaaccount-cta has-background" style="background-color:#f4f4f5"><!-- wp:group {"className":"travaaccount-cta-image-box","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group travaaccount-cta-image-box"><!-- wp:image {"id":67,"sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wp-plugin/gutenberg/wp-content/uploads/2026/01/Image.png" alt="" class="wp-image-67"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Start your growth Journey</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Let TravAccount handle your finances while you focus on growing your business with confidence.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"travaaccount-button"} -->
<div class="wp-block-buttons travaaccount-button"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get in Touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
```
## Advanced Configuration
### Custom Fonts

The theme uses **Instrument Sans** as the default body font and **Poppins** for headings. To change:

1. Go to Appearance → TravaAccount Settings
2. Under Typography Settings:
   - Choose from: Instrument Sans (default), Poppins, Inter, Roboto, Montserrat, Nunito, Raleway, etc.
   - Or use System Default for maximum performance
   - Fonts are loaded from Google Fonts CDN automatically

### Button Styling

Customize button appearance:
- Border Radius: 0px (square) to 50px (pill shape)
- Padding: Adjust size
- Colors: Automatically use your primary color

### Layout Settings

- **Section Padding**: Space above/below sections (40-120px)
- **Container Width**: Maximum content width (960-1400px)

## (Optional) Down Here for Advanced Users
## Mobile Optimization

The theme is mobile-first and responsive by default. Test on:
- iPhone (375px)
- iPad (768px)
- Desktop (1200px+)

Mobile menu automatically activates below 768px width.

## Performance Tips

1. **Optimize Images**:
   - Use WebP format when possible
   - Recommended sizes:
     - Hero images: 1920x1080px
     - Service icons: 64x64px
     - Testimonial photos: 300x300px
   - Compress before uploading

2. **Caching**:
   - Install a caching plugin (WP Super Cache or W3 Total Cache)
   - Enable browser caching
   - Enable GZIP compression

3. **CDN**:
   - Consider using Cloudflare or similar CDN
   - Theme already loads Google Fonts from CDN

## Troubleshooting

### Blocks Not Appearing

1. Make sure theme is activated
2. Check that WordPress is 6.0 or higher
3. Clear browser cache and WordPress cache
4. Regenerate permalink structure (Settings → Permalinks → Save)

### Styling Issues

1. Clear all caches (browser, WordPress, CDN)
2. Check that custom CSS isn't conflicting
3. Verify branding settings are saved
4. Try disabling other plugins temporarily

### Mobile Menu Not Working

1. Check browser console for JavaScript errors
2. Ensure no other plugin is conflicting
3. Clear browser cache
4. Try in incognito/private mode

## Security Best Practices

1. Keep WordPress, theme, and plugins updated
2. Use strong passwords
3. Install Wordfence or similar security plugin
4. Regular backups (UpdraftPlus recommended)
5. Enable SSL certificate (HTTPS)

## SEO Setup

1. **Install Yoast SEO or Rank Math**
2. **Set up**:
   - Site title and tagline
   - Meta descriptions
   - Social media profiles
   - XML sitemap
3. **Optimize content**:
   - Use heading hierarchy (H1 → H6)
   - Add alt text to all images
   - Internal linking between pages
   - Create keyword-rich content

## Maintenance Checklist

### Weekly
- [ ] Check for broken links
- [ ] Monitor site speed
- [ ] Review security logs

### Monthly
- [ ] Update theme (if updates available)
- [ ] Backup site
- [ ] Test all forms
- [ ] Check mobile responsiveness

### Quarterly
- [ ] Review and update content
- [ ] Analyze performance metrics
- [ ] Update SEO strategy
- [ ] Review branding consistency

## Support Resources

- **WordPress Codex**: https://codex.wordpress.org/
- **Gutenberg Handbook**: https://developer.wordpress.org/block-editor/
- **Theme Documentation**: See README.md
- **Community Forums**: WordPress.org forums

## Going Live Checklist

Before launching your site:

- [ ] Set up domain and hosting
- [ ] Install SSL certificate
- [ ] Test all pages and links
- [ ] Verify forms work correctly
- [ ] Test on multiple devices
- [ ] Set up Google Analytics
- [ ] Submit sitemap to Google Search Console
- [ ] Set up email notifications
- [ ] Create 404 error page
- [ ] Test site speed (aim for < 3 seconds)
- [ ] Review and optimize images
- [ ] Set up automated backups
- [ ] Configure security settings
- [ ] Remove "Under Construction" mode
- [ ] Announce launch on social media

## Need Help?

If you encounter issues:
1. Check this guide first
2. Review the README.md file
3. Search WordPress.org forums
4. Contact your hosting provider for server issues
5. Consider hiring a WordPress developer for custom modifications

---

**Version:** 1.0.0  
**Last Updated:** January 2026  
**Theme Author:** Aminul Islam