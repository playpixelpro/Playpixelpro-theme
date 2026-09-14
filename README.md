# PlayPixelPro Theme

[![ClassicPress Compatible](https://img.shields.io/badge/ClassicPress-v4.9%2B-blue.svg)](https://www.classicpress.net/)
[![WordPress Compatible](https://img.shields.io/badge/WordPress-v5.0%2B-green.svg)](https://wordpress.org/)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://www.php.net/)
[![Version](https://img.shields.io/badge/version-2.0.0-amber.svg)](style.css)
[![License](https://img.shields.io/badge/license-Proprietary-red.svg)](LICENSE)

**PlayPixelPro** is a lightweight, responsive, Terminal Modernist theme built for **ClassicPress** and **WordPress**. Designed with a high-contrast dark aesthetic, amber gold accents, retro CRT scanline overlays, and blinking CLI cursors, PlayPixelPro offers a unique retro-futuristic interface ideal for developer portfolios, tech blogs, and digital product showcases.

---

## 🌟 Key Features

- **Terminal Modernist Aesthetic**: Built using `JetBrains Mono` typography, monospace layout structures, and high-contrast dark surfaces.
- **CRT Scanline & Terminal Effects**: Subtle retro CRT scanline overlay, glowing accent highlights, and interactive blinking CLI cursor effects.
- **ClassicPress & WordPress Customizer Integration**: Deep integration with the Native Customizer (`Appearance > Customize > PlayPixelPro Theme Options`):
  - Custom Color Palettes (Background, Surface, Amber Gold accents, and CRT intensity).
  - Hero Terminal Section with customizable command prompts and typing animation.
  - Featured Projects, Services, and Digital Products showcase sections.
  - Social Links and Custom Footer Widgets.
- **Custom Post Type (CPT) Ready**: Includes dedicated styling and template support for `downloads` CPT (`single-downloads.php`).
- **Performance First**: Zero heavy JavaScript frameworks or external bloat. Pure CSS variables, minimal JS, and Google Fonts optimization.
- **Accessibility & Focus States**: Built-in keyboard focus outlines and responsive embed support.

---

## 🛠️ Requirements

- **PHP**: 7.4 or higher
- **ClassicPress**: 4.9+ OR **WordPress**: 5.0+
- **Browser Support**: All modern evergreen browsers (Chrome, Firefox, Safari, Edge)

---

## 📥 Installation

### Method 1: Directory Upload (Recommended for Local/Server Development)
1. Download or clone this repository:
   ```bash
   git clone https://github.com/dindoquitor/Playpixelpro-theme.git playpixelpro
   ```
2. Move the `playpixelpro` folder into your site's theme directory:
   `wp-content/themes/playpixelpro`
3. Log in to your ClassicPress / WordPress Admin Dashboard.
4. Go to **Appearance > Themes**.
5. Locate **PlayPixelPro** and click **Activate**.

### Method 2: Zip Upload
1. Compress the `playpixelpro` theme folder into a `.zip` file.
2. In your Admin Dashboard, go to **Appearance > Themes > Add New > Upload Theme**.
3. Choose the `.zip` file and click **Install Now**, then click **Activate**.

---

## ⚙️ Theme Configuration

Navigate to **Appearance > Customize > PlayPixelPro Theme Options** to configure your site settings:

1. **Colors & CRT Effects**: Customize main background, surface colors, amber gold accents, and toggle the CRT scanline overlay.
2. **Hero Terminal Section**: Change the CLI prompt text, lead heading, subtext, and call-to-action buttons.
3. **Services & Projects**: Toggle and configure the homepage grid layout for tech services and portfolio items.
4. **Social & Footer Links**: Set up social platform links and edit the copyright footer text.

---

## 📁 File & Template Structure

```text
playpixelpro/
├── 404.php                 # 404 Error page template
├── archive.php             # Archive / Category index template
├── comments.php            # Terminal-styled comment list and form
├── footer.php              # Site footer & terminal status bar
├── front-page.php          # Homepage with Terminal Hero & Showcase sections
├── functions.php           # Core theme setup, enqueues, & functions
├── header.php              # Sticky site header & primary navigation
├── home.php                # Blog post index template
├── index.php               # Fallback main template
├── LICENSE                 # License file
├── page.php                # Standard page template
├── search.php              # Search results page
├── searchform.php          # Terminal search form component
├── sidebar.php             # Brutalist card widget sidebar
├── single.php              # Single blog post template
├── single-downloads.php    # Single post template for 'downloads' CPT
├── style.css               # Primary stylesheet with CSS variables & design tokens
├── assets/                 # JS & CSS assets
├── inc/
│   └── customizer.php      # Customizer options panel & dynamic CSS engine
├── plugins/
│   └── playpixelpro-content/
│       └── playpixelpro-content.php # Companion plugin providing CPTs & shortcodes
└── page-templates/
    ├── content-about.php       # Dynamic About Me layout template
    ├── template-about.php      # About Me / Us Page Template
    └── template-frontpage.php
```

---

## 🔌 Companion Plugin (PlayPixelPro Content)

This repository includes the official **PlayPixelPro Content** companion plugin inside [`plugins/playpixelpro-content/`](file:///c:/wamp64/www/ClassicPress-release/wp-content/themes/playpixelpro/plugins/playpixelpro-content/playpixelpro-content.php).

### Plugin Features:
- **Custom Post Types**: Registers `downloads`, `services`, `projects`, `streams`, and `profiles`.
- **Custom Taxonomy**: Registers `download_genre` for organizing downloads.
- **Custom Shortcodes**:
  - `[game-card id="123"]` - Terminal card view for digital downloads.
  - `[terminal-box title="TITLE"]Content[/terminal-box]` - Retro terminal window wrapper.
  - `[system-specs cpu="50" memory="40" disk="70"]` - System specs visual indicators.
  - `[social-links]` - Dynamic social link badges.

### Companion Plugin Installation:
Copy or symlink `plugins/playpixelpro-content` to your site's `wp-content/plugins/` directory:
```bash
cp -r wp-content/themes/playpixelpro/plugins/playpixelpro-content wp-content/plugins/
```
Then activate **PlayPixelPro Content** under **Plugins** in your admin dashboard.

---

## 🎨 Theme Customization & Development

### Modifying Design Tokens
All core colors and visual tokens are defined via CSS variables in [`style.css`](file:///c:/wamp64/www/ClassicPress-release/wp-content/themes/playpixelpro/style.css):

```css
:root {
	--bg: #16130b;
	--surface: #1e1b13;
	--line: #4e4637;
	--gold: #eec35e;
	--text: #e9e2d4;
	--green: #00ff9c;
}
```

---

## 📄 License & Credits

- **Author**: PlayPixelPro
- **License**: Proprietary (See [`LICENSE`](file:///c:/wamp64/www/ClassicPress-release/wp-content/themes/playpixelpro/LICENSE))
- **Fonts**: [JetBrains Mono](https://fonts.google.com/specimen/JetBrains+Mono) & [Google Material Symbols](https://fonts.google.com/icons)
