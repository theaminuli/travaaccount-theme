 <img src="https://raw.githubusercontent.com/theaminuli/travaaccount-theme/refs/heads/main/screenshot.png" alt="TravaAccount Theme Banner">
 
# TravaAccount WordPress Theme

A custom Gutenberg-based WordPress theme converted from Figma design.

## Project Structure

```
travaaccount-theme/
├── style.css                          # Theme stylesheet & metadata
├── functions.php                      # Theme functions and setup
├── index.php                          # Main template
├── header.php                         # Header template
├── footer.php                         # Footer template
├── page-full-width.php                # Full width page template
├── page-no-title.php                  # No title page template
├── theme.json                         # Theme configuration
├── webpack.config.js                  # Webpack build configuration
├── package.json                       # Node.js dependencies
├── screenshot.png                     # Theme screenshot (1200x900px)
│
├── build/                             # Compiled assets (auto-generated)
│   ├── admin/                         # Admin panel assets
│   └── frontend/                      # Frontend theme assets
│
├── src/                               # Source files
│   ├── blocks/
│   │   └── testimonial/               # Custom testimonial block
│   ├── frontend/
│   │   ├── js/                        # Frontend JavaScript
│   │   └── scss/                      # Frontend SCSS styles
│   └── admin/
│       ├── js/                        # Admin panel JavaScript
│       └── scss/                      # Admin panel SCSS styles
│
├── include/                           # PHP includes
│   ├── branding-settings.php         # Settings page HTML
│   ├── admin-menu.php                # Admin menu registration
│   ├── register-settings.php         # Settings registration
│   ├── enqueue-scripts.php           # Asset enqueuing
│   └── block-registration.php        # Block registration
│
├── DEPLOYMENT.md                      # Deployment guide
├── PROJECT_SUMMARY.md                 # Project overview
└── README.md                          # This file
```

## Installation

1. **Upload Theme**
   - Download the theme folder
   - Navigate to WordPress Admin → Appearance → Themes
   - Click "Add New" → "Upload Theme"
   - Upload the ZIP file and activate

2. **Configure Branding Settings**
   - Go to Dashboard → Appearance → TravaAccount Settings
   - Set your brand colors, fonts, and sizing
   - Save changes

3. **Build Assets (if developing)**
   - Run `npm install` to install dependencies
   - Run `npm run build` to compile assets
   - Or use pre-built files in `/build/` directory

4. **Create Homepage**
   - Create a new page called "Home"
   - Use WordPress core blocks (Cover, Columns, Group) and the custom Testimonial Block
   - Build your layout using the block editor
   - Set as homepage in Settings → Reading

## Custom Blocks

### 1. Testimonial Block
- Client testimonial with image
- Star rating display
- Quote formatting
- Customizable styling through block settings

**Note**: This theme is designed to work seamlessly with native WordPress Gutenberg blocks. Use Columns, Cover, Group, Heading, Paragraph, Buttons, and other core blocks to build complete page layouts. The Testimonial block complements these core blocks for specialized content.

## Branding Settings Panel

Located at **Dashboard → Appearance → TravaAccount Settings**

### Available Options:

**Colors:**
- Primary Color (buttons, links, accents) - Default: #C3F53C
- Secondary Color (dark sections) - Default: #0F160C
- Heading Color - Default: #222222
- Text Color - Default: #474747
- Background Color - Default: #F6F6F6

**Typography:**
- Heading Font Family - Default: Poppins (Google Fonts integrated)
- Body Font Family - Default: Instrument Sans
- Available Fonts: Instrument Sans, Poppins, Inter, Roboto, Montserrat, Nunito, Raleway, Open Sans, Lato, Playfair Display, Merriweather, Work Sans, or System Default
- Base Font Size: 16px (adjustable)
- Heading Sizes: Responsive with clamp() for fluid typography

**Spacing:**
- Section Padding
- Container Max Width

**Buttons:**
- Border Radius
- Padding
- Font Weight

All settings apply globally via CSS custom properties, no code editing required.

## Technical Details

### WordPress Best Practices Followed:
- ✅ Proper theme structure
- ✅ Enqueue scripts/styles correctly
- ✅ Sanitization and escaping
- ✅ Translation-ready
- ✅ Accessibility standards (WCAG)
- ✅ Valid HTML5 markup
- ✅ No jQuery dependency (vanilla JS)

### Code Quality:
- Clean, commented code
- Modular and reusable components
- DRY (Don't Repeat Yourself) principles
- PSR-2 coding standards for PHP
- ES6+ JavaScript
- Mobile-first CSS

### Performance:
- Minimal plugin dependencies
- Optimized asset loading
- CSS custom properties for theming
- No inline styles (except for dynamic values)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## What Could Be Improved (Given More Time)

### 1. Advanced Block Features
- Block patterns library for quick page building
- InnerBlocks support for nested layouts
- Block variations for different styles
- Live preview in customizer

### 2. Performance Optimization
- Critical CSS extraction
- Image lazy loading with placeholders
- SVG sprite system for icons
- Asset minification and concatenation

### 3. Additional Functionality
- Custom post types for Services, Testimonials
- Advanced Custom Fields integration
- Block presets/templates
- Import/export settings
- Animation on scroll effects

### 4. Developer Experience
- Build process with webpack
- SASS/SCSS preprocessing
- Automatic version bumping
- PHPUnit tests for functions
- Jest tests for blocks

## Dependencies

**Required:**
- WordPress 6.0+
- PHP 7.4+

**Included:**
- Google Fonts (loaded from CDN automatically)
- @wordpress/scripts (for development build process)

**Optional for Development:**
- Node.js 16.0.0+
- npm 8.0.0+
- Run `npm install` and `npm run build` to compile assets

## Support

For questions or issues, please refer to the inline code comments or WordPress Codex documentation.

## License

GPL v2 or later

---

**Author:** Developed as part of WordPress Gutenberg development task
**Version:** 1.0.0