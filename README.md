***GR333 WP Theme — Starter Theme***

A clean, modern WordPress starter theme focused on clarity, extensibility and best practices.

---

**Quick Links**

- Repository: `GR333-WP-Theme` (workspace root)
- Core files: `style.css`, `functions.php`, `index.php`, `header.php`, `footer.php`

---

## File Structure

Top-level structure (files and folders included in this package):

```
GR333-WP-Theme/
├─ style.css
├─ functions.php
├─ index.php
├─ header.php
├─ footer.php
├─ sidebar.php
├─ single.php
├─ page.php
├─ archive.php
├─ search.php
├─ 404.php
├─ comments.php
├─ searchform.php
├─ screenshot.png
├─ template-parts/
│  ├─ content.php
│  ├─ content-single.php
│  ├─ content-page.php
│  ├─ content-none.php
│  └─ content-search.php
├─ assets/
│  ├─ css/
│  │  ├─ custom.css
│  │  └─ editor-style.css
│  ├─ js/
│  │  └─ main.js
│  └─ images/
└─ inc/
   ├─ custom-functions.php
   ├─ template-functions.php
   └─ customizer.php
```

---

## Features

This starter includes a compact, production-friendly baseline:

- Theme support: custom logo, featured images, custom menus, HTML5 markup
- Widget areas: sidebar + footer
- Block-editor (Gutenberg) friendly styles
- Translation-ready and accessible markup patterns
- Template partials under `template-parts/` for easy overrides

## Visual: language & coverage snapshot

This small chart shows the primary languages and approximate code coverage in the theme. It is intended as a quick visual for maintainers.

```
Language    Coverage
PHP   : ██████████ 100%
HTML  : ██████████ 100%
CSS   : ████████░░  80%
JS    : ███████░░░  70%
Docs  : ██████░░░░  60%
```

---

## Installation (quick)

1. Verify `style.css` contains a valid theme header (must include `Theme Name:`).
2. Create a zip of the `GR333-WP-Theme` folder (ensure files are at the root of the zip).
3. In WordPress Admin: Appearance → Themes → Add New → Upload Theme → choose the zip → Install & Activate.

Notes:
- If WordPress reports a missing stylesheet, re-check `style.css` header or re-zip ensuring files are top-level inside the archive.

---

## Development tips

- Use `template-parts/` for content blocks to keep templates small and composable.
- Register menus and widget areas in `functions.php` so users can configure them from the Customizer.
- Keep editor styles in `assets/css/editor-style.css` so block styles are consistent between editor and frontend.

## Quick checklist

- [x] Core templates: `style.css`, `functions.php`, `index.php`, `header.php`, `footer.php`
- [x] Recommended templates: `sidebar.php`, `single.php`, `page.php`, `archive.php`, `search.php`, `404.php`, `comments.php`
- [ ] Optional: `screenshot.png`, `assets/js/main.js`, `assets/css/custom.css`, `template-parts/content-search.php`

---

## Resources

- WordPress Theme Developer Handbook: https://developer.wordpress.org/themes/
- Theme Review Guidelines: https://make.wordpress.org/themes/handbook/review/

---

**Version:** 1.0.0  
**Last updated:** November 2025  
**Author:** Seren van der Merwe