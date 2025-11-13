# GR333 WP Theme - Complete Starter Template

A clean, modern WordPress starter theme with essential features and best practices.

## 📁 File Structure

```
GR333-WP-Theme/
├── style.css                          # Main stylesheet with theme header
├── functions.php                      # Theme setup and functionality
├── index.php                          # Main template file
├── header.php                         # Header template
├── footer.php                         # Footer template
├── sidebar.php                        # Sidebar template
├── single.php                         # Single post template
├── page.php                          # Page template
├── archive.php                        # Archive template
├── search.php                         # Search results template
├── 404.php                           # 404 error page template
├── comments.php                       # Comments template
├── searchform.php                     # Search form template
├── screenshot.png                     # Theme screenshot (1200x900px)
├── template-parts/
│   ├── content.php                   # Default post content template
│   ├── content-single.php            # Single post content
│   ├── content-page.php              # Page content
│   ├── content-none.php              # No content found
│   └── content-search.php            # Search results content (optional)
├── assets/
│   ├── css/
│   │   ├── custom.css                # Custom CSS (optional)
│   │   └── editor-style.css          # Block editor styles (optional)
│   ├── js/
│   │   └── main.js                   # Main JavaScript file
│   └── images/
│       └── (your images here)
└── inc/
    ├── custom-functions.php           # Custom helper functions (optional)
    ├── template-functions.php         # Template helper functions (optional)
    └── customizer.php                 # Theme customizer settings (optional)
```

## 🚀 Installation

1. **Upload the theme:**
   - Download all files
   - Create a folder named `GR333-WP-Theme` in `/wp-content/themes/`
   - Upload all files maintaining the structure above

2. **Activate the theme:**
   - Go to WordPress Admin → Appearance → Themes
   - Find "GR333 WP Theme" and click "Activate"

3. **Setup menus:**
   - Go to Appearance → Menus
   - Create a new menu and assign it to "Primary Menu"

4. **Configure widgets:**
   - Go to Appearance → Widgets
   - Add widgets to "Main Sidebar" and "Footer Widget Area"

## ✨ Features

### Built-in Support
- ✅ Custom logo
- ✅ Featured images
- ✅ Custom menus (Primary & Footer)
- ✅ Widget areas (Sidebar & Footer)
- ✅ HTML5 markup
- ✅ Responsive design
- ✅ Custom header
- ✅ Custom background
- ✅ Editor styles
- ✅ Gutenberg blocks support
- ✅ Translation ready
- ✅ Threaded comments

### Template Files
- ✅ Home/Blog listing (index.php)
- ✅ Single post (single.php)
- ✅ Pages (page.php)
- ✅ Archives (archive.php)
- ✅ Search results (search.php)
- ✅ 404 error page (404.php)
- ✅ Comments (comments.php)

### Custom Functions
- Post metadata (date, author)
- Entry footer (categories, tags)
- Custom pagination
- Excerpt customization
- Body classes
- Theme customizer support

## 📝 Creating Additional Files

### 1. Create screenshot.png
Create a 1200x900px image showing your theme design and save it as `screenshot.png` in the root theme folder.

### 2. Create assets/js/main.js
```javascript
// Main JavaScript file
(function($) {
    'use strict';
    
    // Mobile menu toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('toggled');
    });
    
    // Smooth scroll
    $('a[href*="#"]').on('click', function(e) {
        // Your smooth scroll code here
    });
    
})(jQuery);
```

### 3. Create assets/css/custom.css
```css
/* Additional custom styles */
/* Add your custom CSS here */
```

### 4. Optional: Create content-search.php
Copy `template-parts/content.php` and modify it for search results display.

## 🎨 Customization

### Changing Colors
1. Go to Appearance → Customize → Colors
2. Set your primary color (default: #0073aa)

### Adding Custom CSS
- Use Appearance → Customize → Additional CSS, or
- Edit `assets/css/custom.css` for persistent changes

### Modifying Layout
- Edit `style.css` for styling changes
- Modify template files for structural changes

## 📋 Required Files Checklist

**Core Files (Required):**
- [x] style.css
- [x] functions.php
- [x] index.php
- [x] header.php
- [x] footer.php

**Recommended Files:**
- [x] sidebar.php
- [x] single.php
- [x] page.php
- [x] archive.php
- [x] search.php
- [x] 404.php
- [x] comments.php
- [x] searchform.php

**Optional Files:**
- [ ] screenshot.png (highly recommended)
- [ ] assets/js/main.js
- [ ] assets/css/custom.css
- [ ] template-parts/content-search.php

## 🔧 Development Tips

### Testing Your Theme
1. Test with dummy content
2. Check all template files
3. Test responsive design
4. Verify menu functionality
5. Test comments system
6. Check widget areas
7. Validate HTML/CSS
8. Test in different browsers

### Adding Custom Post Types
Add custom post type support in `functions.php`:
```php
function gr333_custom_post_types() {
    register_post_type('portfolio', array(
        'public' => true,
        'label'  => 'Portfolio',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'gr333_custom_post_types');
```

## 📚 Resources

- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [Theme Review Guidelines](https://make.wordpress.org/themes/handbook/review/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

## 🐛 Troubleshooting

**Theme doesn't appear:**
- Check that style.css has the proper header
- Ensure all required files are present

**Menu not showing:**
- Create a menu in Appearance → Menus
- Assign it to "Primary Menu" location

**Widgets not appearing:**
- Go to Appearance → Widgets
- Add widgets to the sidebar

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

## 🤝 Support

For issues and questions:
- Check WordPress documentation
- Visit WordPress support forums
- Review the code comments in each file

---

**Version:** 1.0.0  
**Last Updated:** November 2025  
**Author:** Seren van der Merwe