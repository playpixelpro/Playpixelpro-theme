# PlayPixelPro Content

[![ClassicPress Compatible](https://img.shields.io/badge/ClassicPress-v4.9%2B-blue.svg)](https://www.classicpress.net/)
[![WordPress Compatible](https://img.shields.io/badge/WordPress-v5.0%2B-green.svg)](https://wordpress.org/)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://www.php.net/)
[![Version](https://img.shields.io/badge/version-3.0.0-amber.svg)](playpixelpro-content.php)
[![License](https://img.shields.io/badge/license-Proprietary-red.svg)](LICENSE)

**PlayPixelPro Content** is the official companion plugin for the **PlayPixelPro** Terminal Modernist theme. It powers custom content architectures (CPTs), terminal contact communications, custom SMTP delivery, bot fight spam protection, newsletter subscriptions, and automated confirmation transmissions.

---

## 🌟 Features Overview

### 1. Custom Post Types (CPTs)
The plugin registers 5 dedicated content post types integrated with the PlayPixelPro theme:
* **Downloads (`downloads`)**: Digital products, software, templates, and downloadable assets with versioning and licensing meta.
* **Services (`services`)**: Terminal service cards, consulting packages, and client offerings.
* **Projects (`projects`)**: Developer showcase, tech stacks, live demo links, and GitHub repository links.
* **Streams (`streams`)**: Gaming and developer live streams with automated "● LIVE NOW" badge and glowing CRT border triggers.
* **Profiles (`profiles`)**: Social & developer links rendered dynamically in the front-page **03_Support** section with a built-in Material Symbols icon picker.

---

### 2. Contact & Transmission Terminal (`/connect/`)
* Handles secure AJAX message transmissions (`ppp_send_contact_packet`).
* **Custom Destination Email**: Direct visitor messages to any dedicated inbox (`ppp_contact_destination_email`), defaulting to the site administrator email.
* **Automated Thank-You Auto-Reply**: Sends an instant confirmation packet back to visitors when they submit a message.
* **Customizable Auto-Reply Templates**: Supports dynamic template tags:
  * `{username}` — Visitor's name entered on the form.
  * `{email}` — Visitor's return email address.
  * `{site_name}` — Website title.
  * `{site_url}` — Website home URL.

---

### 3. Custom SMTP Mail Server Integration
* Routes all outgoing `wp_mail()` transmissions through your authenticated SMTP server.
* Supports **TLS (Port 587)**, **SSL (Port 465)**, and unencrypted connections.
* Compatible with Gmail, Google Workspace, Mailgun, SendGrid, Amazon SES, Office 365, and private mail servers.
* **One-Click Test Transmission**: Verify SMTP connectivity directly from the admin panel.

---

### 4. Bot Fight & Spam Protection
* Seamless protection for the interactive `/connect/` terminal without distracting visual CAPTCHAs:
  * **Cloudflare Turnstile** (Recommended: zero friction, privacy-focused).
  * **Google reCAPTCHA v2** (Checkbox "I'm not a robot").
  * **Google reCAPTCHA v3** (Invisible background scoring).

---

### 5. Newsletter & Subscriber Database
* Opt-in checkbox integrated directly into the contact terminal.
* Dedicated database table (`{$wpdb->prefix}ppp_subscribers`) tracking names, emails, timestamps, and status.
* **CSV Export**: Export active subscribers with one click.
* **Mass Broadcast Dispatcher**: Compose rich-text email announcements directly from the WordPress/ClassicPress admin.

---

## ⚙️ Settings & Configuration Guide

Access the plugin configuration panel via:  
**WordPress / ClassicPress Admin &rarr; PlayPixelPro &rarr; Contact & Mail Settings** (or via the **Downloads** menu).

### Tab 1: SMTP Mailer Config
| Setting | Description | Default / Example |
| :--- | :--- | :--- |
| **Enable Custom SMTP** | Check to route all site emails via SMTP | `Disabled` |
| **SMTP Host** | Outgoing mail server hostname | `smtp.gmail.com` / `smtp.mailgun.org` |
| **SMTP Port** | Port used by your mail provider | `587` (TLS) or `465` (SSL) |
| **Encryption** | Encryption protocol | `TLS (Recommended)` |
| **SMTP Username** | Authenticated email address or API username | `you@domain.com` |
| **SMTP Password** | Mail account password or app password | `••••••••••••` |
| **From Email Address** | Outgoing sender address | `noreply@playpixelpro.com` |
| **From Sender Name** | Outgoing display name | `PlayPixelPro Terminal` |
| **Contact Notification Destination Email** | The inbox receiving `/connect/` submissions | Defaults to Site Admin Email (e.g. `juan@email.com`) |

#### Auto-Reply / Thank-You Confirmation Settings:
* **Enable Auto-Reply**: Check to send automated confirmations back to visitors.
* **Auto-Reply Subject**: e.g. `[{site_name}] Transmission Received - Thank You!`
* **Auto-Reply Message Body**: Customize your confirmation message using `{username}`, `{email}`, `{site_name}`, and `{site_url}`.

---

### Tab 2: Bot Fight & Protection
1. Select your preferred provider: **Cloudflare Turnstile**, **reCAPTCHA v2**, or **reCAPTCHA v3**.
2. Paste your **Site Key (Public)** and **Secret Key (Private)** obtained from Cloudflare or Google.
3. Click **Save Bot Protection Settings**.

---

### Tab 3: Newsletter & Subscribers
* **Subscribers Table**: View the latest 50 subscribers, their signup dates, and statuses.
* **Export Subscribers CSV**: Download the full subscriber list in standard `.csv` format.
* **Broadcast Newsletter**: Enter a subject line, write your message in the rich text editor, and click **Broadcast Newsletter to All Active Subscribers**.

---

## ☕ Front Page Support Section (`03_Support`)

The front-page **03_Support** section connects both the **Theme** and this **Plugin**:

1. **Section Title & Description (Theme Customizer)**:
   * Go to **Appearance &rarr; Customize &rarr; Front Page Sections**.
   * **Section 03 Title**: Set the section heading (default: `03_Support`).
   * **Section 03 Description**: Customize the text inside the support card (e.g., *"Support the channel and get exclusive access to content, early releases, and more."*).

2. **Support & Social Buttons (Plugin CPT)**:
   * Go to **PlayPixelPro &rarr; Profiles &rarr; Add New Profile**.
   * Enter the title (e.g. `KO-FI`, `BUY ME A COFFEE`, `GITHUB`).
   * Enter the **Profile Destination URL**.
   * Choose an icon from the **Material Symbols Icon Picker** (`favorite`, `code`, `sports_esports`, `forum`, `mail`, etc.).
   * Optionally check **Use Heavy Accent Button Style** for a highlighted gold border.
   * Publish the profile. It will immediately appear as a button on your front-page support card.

---

## 📋 Requirements
* **ClassicPress**: 4.9+ OR **WordPress**: 5.0+
* **PHP**: 7.4 or higher
* **Active Theme**: PlayPixelPro (recommended for terminal styling integration)

---

## 📄 License
Proprietary &copy; PlayPixelPro. All rights reserved.
