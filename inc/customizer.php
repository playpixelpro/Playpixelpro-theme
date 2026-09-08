<?php
/**
 * PlayPixelPro ClassicPress Customizer settings & dynamic CSS.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer Settings and Controls under Appearance > Customize.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager object.
 */
function playpixelpro_customize_register( $wp_customize ) {

	// Panel: PlayPixelPro Terminal Options
	$wp_customize->add_panel(
		'playpixelpro_panel',
		array(
			'title'       => __( 'PlayPixelPro Theme Options', 'playpixelpro' ),
			'description' => __( 'Customize colors, terminal prompts, hero animation, services, projects, and social links.', 'playpixelpro' ),
			'priority'    => 30,
		)
	);

	// Section 1: Colors & Aesthetics
	$wp_customize->add_section(
		'playpixelpro_colors_section',
		array(
			'title'    => __( 'Colors & CRT Effects', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 10,
		)
	);

	// Accent Gold Color
	$wp_customize->add_setting(
		'playpixelpro_accent_color',
		array(
			'default'           => '#eec35e',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'playpixelpro_accent_color',
			array(
				'label'    => __( 'Primary Accent Color (Amber Gold)', 'playpixelpro' ),
				'section'  => 'playpixelpro_colors_section',
				'settings' => 'playpixelpro_accent_color',
			)
		)
	);

	// Background Color
	$wp_customize->add_setting(
		'playpixelpro_bg_color',
		array(
			'default'           => '#16130b',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'playpixelpro_bg_color',
			array(
				'label'    => __( 'Background Color (Obsidian Dark)', 'playpixelpro' ),
				'section'  => 'playpixelpro_colors_section',
				'settings' => 'playpixelpro_bg_color',
			)
		)
	);

	// Surface Container Color
	$wp_customize->add_setting(
		'playpixelpro_surface_color',
		array(
			'default'           => '#1e1b13',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'playpixelpro_surface_color',
			array(
				'label'    => __( 'Terminal Surface Color', 'playpixelpro' ),
				'section'  => 'playpixelpro_colors_section',
				'settings' => 'playpixelpro_surface_color',
			)
		)
	);

	// CRT Scanline Overlay Toggle
	$wp_customize->add_setting(
		'playpixelpro_enable_scanline',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_enable_scanline',
		array(
			'label'    => __( 'Enable CRT Scanline Overlay', 'playpixelpro' ),
			'section'  => 'playpixelpro_colors_section',
			'type'     => 'checkbox',
		)
	);

	// Blinking CLI Cursor Toggle
	$wp_customize->add_setting(
		'playpixelpro_enable_cursor',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_enable_cursor',
		array(
			'label'    => __( 'Enable Blinking Terminal Cursor', 'playpixelpro' ),
			'section'  => 'playpixelpro_colors_section',
			'type'     => 'checkbox',
		)
	);

	// Section 2: Header & Terminal Branding
	$wp_customize->add_section(
		'playpixelpro_header_section',
		array(
			'title'    => __( 'Header & Navigation', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 20,
		)
	);

	// Terminal Logo / Brand Title
	$wp_customize->add_setting(
		'playpixelpro_logo_text',
		array(
			'default'           => 'DEV_ROOT',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_logo_text',
		array(
			'label'    => __( 'Terminal Brand Logo Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Prompt Prefix
	$wp_customize->add_setting(
		'playpixelpro_prompt_prefix',
		array(
			'default'           => 'user@dev-root:~$',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_prompt_prefix',
		array(
			'label'    => __( 'Terminal Prompt Prefix', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Header CTA Action Button Label
	$wp_customize->add_setting(
		'playpixelpro_cta_text',
		array(
			'default'           => 'ssh_connect',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_cta_text',
		array(
			'label'    => __( 'Header Action Button Label', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Header CTA Action Button URL
	$wp_customize->add_setting(
		'playpixelpro_cta_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_cta_url',
		array(
			'label'       => __( 'Header Action Button Link URL', 'playpixelpro' ),
			'description' => __( 'Leave empty to link to Downloads archive.', 'playpixelpro' ),
			'section'     => 'playpixelpro_header_section',
			'type'        => 'url',
		)
	);

	// Hero Terminal Window Title
	$wp_customize->add_setting(
		'playpixelpro_hero_window_title',
		array(
			'default'           => 'bash — 120x40',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_window_title',
		array(
			'label'    => __( 'Hero Terminal Window Title Bar', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Enable Hero Terminal Typing Animation Toggle
	$wp_customize->add_setting(
		'playpixelpro_enable_hero_typing',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_enable_hero_typing',
		array(
			'label'       => __( 'Enable Hero Terminal Typing Animation', 'playpixelpro' ),
			'description' => __( 'Simulate live terminal letter-by-letter typing animation on homepage visit.', 'playpixelpro' ),
			'section'     => 'playpixelpro_header_section',
			'type'        => 'checkbox',
		)
	);

	// Hero Line 1 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line1',
		array(
			'default'           => 'System initialized. Fetching profile...',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line1',
		array(
			'label'    => __( 'Hero Terminal Line 01 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 2 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line2',
		array(
			'default'           => 'Specialization: [Android_SDK, Kotlin, WebGL, NextJS, Game_Streaming]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line2',
		array(
			'label'    => __( 'Hero Terminal Line 02 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 3 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line3',
		array(
			'default'           => 'Status: All systems operational. Ready for deployment.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line3',
		array(
			'label'    => __( 'Hero Terminal Line 03 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 4 Text
	$wp_customize->add_setting(
		'playpixelpro_hero_line4',
		array(
			'default'           => 'Environment: Production // Node_01',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_line4',
		array(
			'label'    => __( 'Hero Terminal Line 04 Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero Line 5 Command Text
	$wp_customize->add_setting(
		'playpixelpro_hero_command',
		array(
			'default'           => 'deploy --android --web',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_hero_command',
		array(
			'label'    => __( 'Hero Terminal Line 05 Command Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// GitHub Action Button Text
	$wp_customize->add_setting(
		'playpixelpro_github_btn_text',
		array(
			'default'           => 'VIEW_GITHUB',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_github_btn_text',
		array(
			'label'    => __( 'Hero GitHub Button Text', 'playpixelpro' ),
			'section'  => 'playpixelpro_header_section',
			'type'     => 'text',
		)
	);

	// Hero GitHub Repository URL
	$wp_customize->add_setting(
		'playpixelpro_github_url',
		array(
			'default'           => 'https://github.com/dindoquitor',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_github_url',
		array(
			'label'       => __( 'Hero GitHub Repository URL', 'playpixelpro' ),
			'description' => __( 'Link URL for the hero button under the terminal section.', 'playpixelpro' ),
			'section'     => 'playpixelpro_header_section',
			'type'        => 'url',
		)
	);

	// Section 5: Homepage Sections Toggles
	$wp_customize->add_section(
		'playpixelpro_frontpage_sections',
		array(
			'title'    => __( 'Front Page Section Controls', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_services',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_services',
		array(
			'label'    => __( 'Show 01_Services Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_projects',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_projects',
		array(
			'label'    => __( 'Show 02_Projects Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_support',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_support',
		array(
			'label'    => __( 'Show 03_Support Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_show_gaming',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_gaming',
		array(
			'label'    => __( 'Show 04_Gaming Section', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'checkbox',
		)
	);

	// Section Titles Controls
	$wp_customize->add_setting(
		'playpixelpro_services_title',
		array(
			'default'           => '01_Services',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_services_title',
		array(
			'label'    => __( 'Section 01 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_projects_title',
		array(
			'default'           => '02_Projects',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_projects_title',
		array(
			'label'    => __( 'Section 02 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_support_title',
		array(
			'default'           => '03_Support',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_support_title',
		array(
			'label'    => __( 'Section 03 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_gaming_title',
		array(
			'default'           => '04_Gaming & Streams',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_gaming_title',
		array(
			'label'    => __( 'Section 04 Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_latest_entries_title',
		array(
			'default'           => 'latest_entries',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_latest_entries_title',
		array(
			'label'    => __( 'Latest Entries Section Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_frontpage_sections',
			'type'     => 'text',
		)
	);

	// Latest Entries Count Control (3 to 9 posts)
	$wp_customize->add_setting(
		'playpixelpro_latest_entries_count',
		array(
			'default'           => 6,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_latest_entries_count',
		array(
			'label'       => __( 'Number of Latest Entries (3 to 9)', 'playpixelpro' ),
			'description' => __( 'Select how many recent blog post cards to display on the front page (up to 9).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 3,
				'max'  => 9,
				'step' => 1,
			),
		)
	);

	// Card Limits for Services
	$wp_customize->add_setting(
		'playpixelpro_services_count',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_services_count',
		array(
			'label'       => __( 'Services Card Limit (0 = All)', 'playpixelpro' ),
			'description' => __( 'Set how many service cards to display on the front page (0 displays all published services).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 12,
				'step' => 1,
			),
		)
	);

	// Card Limits for Projects
	$wp_customize->add_setting(
		'playpixelpro_projects_count',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_projects_count',
		array(
			'label'       => __( 'Projects Card Limit (0 = All)', 'playpixelpro' ),
			'description' => __( 'Set how many project cards to display on the front page (0 displays all published projects).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 12,
				'step' => 1,
			),
		)
	);

	// Card Limits for Streams
	$wp_customize->add_setting(
		'playpixelpro_streams_count',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_streams_count',
		array(
			'label'       => __( 'Stream Channels Limit (0 = All)', 'playpixelpro' ),
			'description' => __( 'Set how many stream channels to display on the front page (0 displays all published streams).', 'playpixelpro' ),
			'section'     => 'playpixelpro_frontpage_sections',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 12,
				'step' => 1,
			),
		)
	);

	// Section 6: Dynamic Custom Sections Builder
	$wp_customize->add_section(
		'playpixelpro_custom_builder_section',
		array(
			'title'       => __( 'Dynamic Custom Sections Builder', 'playpixelpro' ),
			'description' => __( 'Add and customize new custom sections to display on your front page.', 'playpixelpro' ),
			'panel'       => 'playpixelpro_panel',
			'priority'    => 45,
		)
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		// Toggle
		$wp_customize->add_setting(
			"playpixelpro_show_custom_sec{$i}",
			array(
				'default'           => false,
				'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			"playpixelpro_show_custom_sec{$i}",
			array(
				'label'    => sprintf( __( 'Enable Custom Section %d', 'playpixelpro' ), $i ),
				'section'  => 'playpixelpro_custom_builder_section',
				'type'     => 'checkbox',
			)
		);

		// Title
		$wp_customize->add_setting(
			"playpixelpro_custom_sec{$i}_title",
			array(
				'default'           => sprintf( '0%d_CustomSection', $i + 4 ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"playpixelpro_custom_sec{$i}_title",
			array(
				'label'    => sprintf( __( 'Section %d Heading Title', 'playpixelpro' ), $i ),
				'section'  => 'playpixelpro_custom_builder_section',
				'type'     => 'text',
			)
		);

		// Content
		$wp_customize->add_setting(
			"playpixelpro_custom_sec{$i}_content",
			array(
				'default'           => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			"playpixelpro_custom_sec{$i}_content",
			array(
				'label'       => sprintf( __( 'Section %d Content / Shortcode', 'playpixelpro' ), $i ),
				'description' => __( 'Enter HTML text or shortcodes (e.g. [terminal-box title="SYSTEM_LOGS"]...[/terminal-box] or [system-specs]).', 'playpixelpro' ),
				'section'     => 'playpixelpro_custom_builder_section',
				'type'        => 'textarea',
			)
		);
	}

	// Section: Single Post Social Share Options
	$wp_customize->add_section(
		'playpixelpro_share_section',
		array(
			'title'    => __( 'Single Post Social Share Buttons', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 50,
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_x',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_x',
		array(
			'label'    => __( 'Enable X (Twitter) Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_facebook',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_facebook',
		array(
			'label'    => __( 'Enable Facebook Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_linkedin',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_linkedin',
		array(
			'label'    => __( 'Enable LinkedIn Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_reddit',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_reddit',
		array(
			'label'    => __( 'Enable Reddit Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'playpixelpro_share_email',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_share_email',
		array(
			'label'    => __( 'Enable Email Share Button', 'playpixelpro' ),
			'section'  => 'playpixelpro_share_section',
			'type'     => 'checkbox',
		)
	);

	// ==========================================================================
	// Section: About Me / Us Page Options
	// ==========================================================================
	$wp_customize->add_section(
		'playpixelpro_about_section',
		array(
			'title'    => __( 'About Page Options', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 45,
		)
	);

	// Static About Page Assignment
	$wp_customize->add_setting(
		'playpixelpro_about_page',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	// ==========================================================================
	// Section: Contact Terminal Page Options
	// ==========================================================================
	$wp_customize->add_section(
		'playpixelpro_contact_section',
		array(
			'title'    => __( 'Contact Page Options', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 46,
		)
	);

	// Static Contact Page Assignment
	$wp_customize->add_setting(
		'playpixelpro_contact_page',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_contact_page',
		array(
			'label'       => __( 'Select Static Contact Page', 'playpixelpro' ),
			'description' => __( 'Assign a static page to render the Contact Terminal Page layout.', 'playpixelpro' ),
			'section'     => 'playpixelpro_contact_section',
			'type'        => 'dropdown-pages',
		)
	);

	// Contact Terminal Uplink Tag
	$wp_customize->add_setting( 'playpixelpro_contact_uplink_tag', array( 'default' => 'ESTABLISHING_UPLINK', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_uplink_tag', array( 'label' => __( 'Uplink Badge Tag', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	// Contact Title & Description
	$wp_customize->add_setting( 'playpixelpro_contact_title', array( 'default' => '> CONNECT.SH', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_title', array( 'label' => __( 'Contact Terminal Title', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_desc', array( 'default' => 'Direct transmission interface. Send secure packets to the administrator. Response times vary based on server load and local latency.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_desc', array( 'label' => __( 'Contact Terminal Description', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'textarea' ) );

	// Nano Editor Title
	$wp_customize->add_setting( 'playpixelpro_contact_nano_title', array( 'default' => 'NANO 8.0 // protocol_message.md', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_nano_title', array( 'label' => __( 'Nano Editor Window Legend Title', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	// Form Labels
	$wp_customize->add_setting( 'playpixelpro_contact_label_user', array( 'default' => '[01] USERNAME_STR', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_label_user', array( 'label' => __( 'Field 1 Label (Username)', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_label_email', array( 'default' => '[02] RETURN_ADDR', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_label_email', array( 'label' => __( 'Field 2 Label (Email)', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_label_msg', array( 'default' => '[03] DATA_PAYLOAD', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_label_msg', array( 'label' => __( 'Field 3 Label (Message)', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_label_newsletter', array( 'default' => 'SECURE_ENCRYPT', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_label_newsletter', array( 'label' => __( 'Newsletter Opt-in Checkbox Label', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_btn_text', array( 'default' => 'SEND_PACKET', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_btn_text', array( 'label' => __( 'Submit Button Text', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	// Right Column SYS_STATUS Specs
	$wp_customize->add_setting( 'playpixelpro_contact_sys_loc', array( 'default' => 'BERLIN_DE_01', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_sys_loc', array( 'label' => __( 'SYS_STATUS Location', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_sys_temp', array( 'default' => '32.4°C', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_contact_sys_temp', array( 'label' => __( 'SYS_STATUS Temp', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'text' ) );

	// Social Nodes
	$wp_customize->add_setting( 'playpixelpro_contact_github', array( 'default' => 'https://github.com', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'playpixelpro_contact_github', array( 'label' => __( 'GitHub URL', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_twitter', array( 'default' => 'https://x.com', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'playpixelpro_contact_twitter', array( 'label' => __( 'Twitter / X URL', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'playpixelpro_contact_stackoverflow', array( 'default' => 'https://stackoverflow.com', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'playpixelpro_contact_stackoverflow', array( 'label' => __( 'Stack Overflow URL', 'playpixelpro' ), 'section' => 'playpixelpro_contact_section', 'type' => 'url' ) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'playpixelpro_about_page',
			array(
				'label'       => __( 'Select Static About Page', 'playpixelpro' ),
				'description' => __( 'Choose a static page to display the Terminal About Me design layout.', 'playpixelpro' ),
				'section'     => 'playpixelpro_about_section',
				'type'        => 'dropdown-pages',
			)
		)
	);

	// --- 1. Terminal Hero Section ---
	$wp_customize->add_setting( 'playpixelpro_about_show_hero', array( 'default' => true, 'sanitize_callback' => 'playpixelpro_sanitize_checkbox' ) );
	$wp_customize->add_control( 'playpixelpro_about_show_hero', array( 'label' => __( 'Show Terminal Hero Section', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_session', array( 'default' => 'SESSION: bash — 80x24', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_session', array( 'label' => __( 'Hero Session Header', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_prompt', array( 'default' => 'user@dev-shell:~$', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_prompt', array( 'label' => __( 'Hero CLI Prompt', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_command', array( 'default' => 'cat bio.md', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_command', array( 'label' => __( 'Hero CLI Command', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_title', array( 'default' => '# ARCHITECTING DIGITAL INFRASTRUCTURE', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_title', array( 'label' => __( 'Hero Title', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_bio', array( 'default' => 'Senior developer specializing in high-performance cross-platform systems. Bridging the gap between low-level Android performance and modern reactive web architectures.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_bio', array( 'label' => __( 'Hero Bio / Overview', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_col1_title', array( 'default' => 'ANDROID ECOSYSTEM', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_col1_title', array( 'label' => __( 'Column 1 Title', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_col1_items', array( 'default' => "Kotlin / Coroutines / Flow\nJetpack Compose UI Engine\nNative C++ (JNI) Integrations\nMaterial 3 Implementation", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_col1_items', array( 'label' => __( 'Column 1 Items (One per line)', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_col2_title', array( 'default' => 'WEB INFRASTRUCTURE', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_col2_title', array( 'label' => __( 'Column 2 Title', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_hero_col2_items', array( 'default' => "React & Next.js Frameworks\nTypeScript / Strict Typing\nWebGL & Shader Programming\nTailwind & Headless UI", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_hero_col2_items', array( 'label' => __( 'Column 2 Items (One per line)', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// --- 2. System Modules Section ---
	$wp_customize->add_setting( 'playpixelpro_about_show_modules', array( 'default' => true, 'sanitize_callback' => 'playpixelpro_sanitize_checkbox' ) );
	$wp_customize->add_control( 'playpixelpro_about_show_modules', array( 'label' => __( 'Show System Modules Grid', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'playpixelpro_about_modules_title', array( 'default' => 'SYSTEM_MODULES', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_modules_title', array( 'label' => __( 'Modules Section Title', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_modules_icon', array( 'default' => 'settings_input_component', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_modules_icon', array( 'label' => __( 'Modules Section Icon', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	// Module 1
	$wp_customize->add_setting( 'playpixelpro_about_mod1_legend', array( 'default' => 'KERNEL_CORE', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod1_legend', array( 'label' => __( 'Module 1 Name (Legend)', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod1_row1_label', array( 'default' => 'OS_TARGET', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod1_row1_label', array( 'label' => __( 'Module 1 Row 1 Label', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'playpixelpro_about_mod1_row1_val', array( 'default' => 'AOSP / LINUX', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod1_row1_val', array( 'label' => __( 'Module 1 Row 1 Value', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod1_row2_label', array( 'default' => 'PERF_METRIC', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod1_row2_label', array( 'label' => __( 'Module 1 Row 2 Label', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'playpixelpro_about_mod1_row2_val', array( 'default' => 'OPTIMAL', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod1_row2_val', array( 'label' => __( 'Module 1 Row 2 Value', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod1_desc', array( 'default' => 'Android SDK, Gradle, NDK, Room DB, Retrofit, WorkManager, Dagger-Hilt.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod1_desc', array( 'label' => __( 'Module 1 Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// Module 2
	$wp_customize->add_setting( 'playpixelpro_about_mod2_legend', array( 'default' => 'UI_SUBSYSTEM', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod2_legend', array( 'label' => __( 'Module 2 Name (Legend)', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod2_row1_label', array( 'default' => 'RENDERING', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod2_row1_label', array( 'label' => __( 'Module 2 Row 1 Label', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'playpixelpro_about_mod2_row1_val', array( 'default' => 'GPU_ACCEL', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod2_row1_val', array( 'label' => __( 'Module 2 Row 1 Value', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod2_row2_label', array( 'default' => 'FPS_TARGET', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod2_row2_label', array( 'label' => __( 'Module 2 Row 2 Label', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'playpixelpro_about_mod2_row2_val', array( 'default' => '120_LOCKED', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod2_row2_val', array( 'label' => __( 'Module 2 Row 2 Value', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod2_desc', array( 'default' => 'Compose, Framer Motion, Three.js, Canvas API, Figma-to-Code, Responsive Systems.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod2_desc', array( 'label' => __( 'Module 2 Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// Module 3
	$wp_customize->add_setting( 'playpixelpro_about_mod3_legend', array( 'default' => 'NETWORK_BINARIES', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod3_legend', array( 'label' => __( 'Module 3 Name (Legend)', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod3_row1_label', array( 'default' => 'PROTOCOL', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod3_row1_label', array( 'label' => __( 'Module 3 Row 1 Label', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'playpixelpro_about_mod3_row1_val', array( 'default' => 'GRPC / REST', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod3_row1_val', array( 'label' => __( 'Module 3 Row 1 Value', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod3_row2_label', array( 'default' => 'LATENCY', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod3_row2_label', array( 'label' => __( 'Module 3 Row 2 Label', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'playpixelpro_about_mod3_row2_val', array( 'default' => '< 50MS', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod3_row2_val', array( 'label' => __( 'Module 3 Row 2 Value', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_mod3_desc', array( 'default' => 'Node.js, PostgreSQL, Redis, GraphQL, Docker, Vercel, Firebase, AWS S3.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_mod3_desc', array( 'label' => __( 'Module 3 Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// --- 3. Runtime History Section ---
	$wp_customize->add_setting( 'playpixelpro_about_show_history', array( 'default' => true, 'sanitize_callback' => 'playpixelpro_sanitize_checkbox' ) );
	$wp_customize->add_control( 'playpixelpro_about_show_history', array( 'label' => __( 'Show Runtime History Timeline', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'playpixelpro_about_history_title', array( 'default' => 'RUNTIME_HISTORY', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_history_title', array( 'label' => __( 'Timeline Section Title', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_history_icon', array( 'default' => 'terminal', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_history_icon', array( 'label' => __( 'Timeline Section Icon', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_history_filter', array( 'default' => 'FILTER: ERROR=0 INFO=ALL', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_history_filter', array( 'label' => __( 'Timeline Filter Subtext', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	// Log Entry 1
	$wp_customize->add_setting( 'playpixelpro_about_log1_date', array( 'default' => '[2022-PRESENT] INFO:', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log1_date', array( 'label' => __( 'Log 1 Date / Status Tag', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_log1_title', array( 'default' => 'LEAD MOBILE ENGINEER @ NEXUS_LABS', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log1_title', array( 'label' => __( 'Log 1 Title & Role', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_log1_desc', array( 'default' => 'Architected a micro-services based Android application serving 2M+ active users. Reduced startup latency by 45% using Baseline Profiles and R8 optimization.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log1_desc', array( 'label' => __( 'Log 1 Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// Log Entry 2
	$wp_customize->add_setting( 'playpixelpro_about_log2_date', array( 'default' => '[2020-2022] INFO:', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log2_date', array( 'label' => __( 'Log 2 Date / Status Tag', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_log2_title', array( 'default' => 'FULL STACK DEVELOPER @ BYTE_STREAM_INT', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log2_title', array( 'label' => __( 'Log 2 Title & Role', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_log2_desc', array( 'default' => 'Engineered a real-time analytics dashboard using Next.js and WebSocket. Integration of complex data visualization modules using WebGL for high-density packet tracking.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log2_desc', array( 'label' => __( 'Log 2 Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// Log Entry 3
	$wp_customize->add_setting( 'playpixelpro_about_log3_date', array( 'default' => '[2018-2020] INFO:', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log3_date', array( 'label' => __( 'Log 3 Date / Status Tag', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_log3_title', array( 'default' => 'JUNIOR ANDROID DEVELOPER @ CORE_APPS', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log3_title', array( 'label' => __( 'Log 3 Title & Role', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_log3_desc', array( 'default' => 'Maintained legacy Java codebase while leading the migration to Kotlin. Implemented first-party authentication modules and unit testing suite coverage reaching 85%.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_log3_desc', array( 'label' => __( 'Log 3 Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	// --- 4. Call To Action Section ---
	$wp_customize->add_setting( 'playpixelpro_about_show_cta', array( 'default' => true, 'sanitize_callback' => 'playpixelpro_sanitize_checkbox' ) );
	$wp_customize->add_control( 'playpixelpro_about_show_cta', array( 'label' => __( 'Show Call to Action Section', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'playpixelpro_about_cta_title', array( 'default' => 'READY_FOR_DEPLOYMENT?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_title', array( 'label' => __( 'CTA Title', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_cta_desc', array( 'default' => 'Currently accepting inquiries for high-impact technical roles and specialized architectural consulting.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_desc', array( 'label' => __( 'CTA Subtitle / Description', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'playpixelpro_about_cta_btn1_text', array( 'default' => 'INIT_CONTACT', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_btn1_text', array( 'label' => __( 'Button 1 Text', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_cta_btn1_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_btn1_url', array( 'label' => __( 'Button 1 URL', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'url' ) );

	$wp_customize->add_setting( 'playpixelpro_about_cta_btn2_text', array( 'default' => 'VIEW_REPOSITORY', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_btn2_text', array( 'label' => __( 'Button 2 Text', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'playpixelpro_about_cta_btn2_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_btn2_url', array( 'label' => __( 'Button 2 URL', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'url' ) );

	$wp_customize->add_setting(
		'playpixelpro_about_cta_image',
		array(
			'default'           => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBVvQM86xaZd9brr_jSpkhNAXV0Q14Xn3gBomWV-dRCR4AjWmQQJtVxn6uqG-X9Ush_e-BvH6SLWelp3bjydlG2zaa5gVwqQVVv95Nvd2ajTontS5UAaI1WDaf-HbljuLaRkkZCdrCs36izZ-a2FYIjRGST51h33fQy8Lf9StsG9MxLxeKybt5XivIVDe-PO1FLzFtUNRxisI65YZfMtdg-s1qyfa36Mro5IofkmRwa-X7GFTgKLWpXYOvIb2CbNOHdrK0srWkrmRxM',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'playpixelpro_about_cta_image',
			array(
				'label'       => __( 'CTA Terminal Image', 'playpixelpro' ),
				'description' => __( 'Upload or select an image for the lower-right terminal banner. Recommended resolution: 1200 x 512 px (Aspect ratio ~2:1 or 16:9, minimum width 600px).', 'playpixelpro' ),
				'section'     => 'playpixelpro_about_section',
				'settings'    => 'playpixelpro_about_cta_image',
			)
		)
	);

	$wp_customize->add_setting( 'playpixelpro_about_cta_lens_id', array( 'default' => 'LENS_ID: 0x4F2A', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'playpixelpro_about_cta_lens_id', array( 'label' => __( 'CTA Lens ID Badge', 'playpixelpro' ), 'section' => 'playpixelpro_about_section', 'type' => 'text' ) );

	// ==========================================================================
	// Section: Sidebar Options (Blog Posts List Page)
	// ==========================================================================
	$wp_customize->add_section(
		'playpixelpro_sidebar_section',
		array(
			'title'    => __( 'Sidebar Options', 'playpixelpro' ),
			'panel'    => 'playpixelpro_panel',
			'priority' => 50,
		)
	);

	// Toggle Sidebar Image Widget
	$wp_customize->add_setting(
		'playpixelpro_show_sidebar_image',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_sidebar_image',
		array(
			'label'    => __( 'Show Sidebar Terminal Image Widget', 'playpixelpro' ),
			'section'  => 'playpixelpro_sidebar_section',
			'type'     => 'checkbox',
		)
	);

	// Sidebar Image Title Bar Text
	$wp_customize->add_setting(
		'playpixelpro_sidebar_image_title',
		array(
			'default'           => 'MAINFRAME // PDP-11',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_sidebar_image_title',
		array(
			'label'    => __( 'Sidebar Image Window Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_sidebar_section',
			'type'     => 'text',
		)
	);

	// Sidebar Image Control with Upload & Guidelines
	$wp_customize->add_setting(
		'playpixelpro_sidebar_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'playpixelpro_sidebar_image',
			array(
				'label'       => __( 'Sidebar Terminal Image', 'playpixelpro' ),
				'description' => __( 'Upload or select an image for the bottom-right sidebar terminal banner. Recommended resolution: 600 x 400 px (Aspect ratio ~3:2 or 4:3, minimum width 300px).', 'playpixelpro' ),
				'section'     => 'playpixelpro_sidebar_section',
				'settings'    => 'playpixelpro_sidebar_image',
			)
		)
	);

	// Toggle Single Post Related Articles Widget
	$wp_customize->add_setting(
		'playpixelpro_show_related_posts',
		array(
			'default'           => true,
			'sanitize_callback' => 'playpixelpro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_show_related_posts',
		array(
			'label'    => __( 'Show Related Articles in Single Post Sidebar', 'playpixelpro' ),
			'section'  => 'playpixelpro_sidebar_section',
			'type'     => 'checkbox',
		)
	);

	// Related Posts Widget Legend Title
	$wp_customize->add_setting(
		'playpixelpro_related_posts_title',
		array(
			'default'           => 'grep -r related /',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_related_posts_title',
		array(
			'label'    => __( 'Related Articles Widget Title', 'playpixelpro' ),
			'section'  => 'playpixelpro_sidebar_section',
			'type'     => 'text',
		)
	);

	// Related Posts Count (Max Articles)
	$wp_customize->add_setting(
		'playpixelpro_related_posts_count',
		array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_related_posts_count',
		array(
			'label'       => __( 'Number of Related Articles to Display', 'playpixelpro' ),
			'description' => __( 'Set how many related articles appear in the single post sidebar (1 to 10).', 'playpixelpro' ),
			'section'     => 'playpixelpro_sidebar_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 10,
				'step' => 1,
			),
		)
	);

	// Related Excerpt Word Count
	$wp_customize->add_setting(
		'playpixelpro_related_excerpt_words',
		array(
			'default'           => 12,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'playpixelpro_related_excerpt_words',
		array(
			'label'       => __( 'Related Article Excerpt Length (Words)', 'playpixelpro' ),
			'description' => __( 'Set word length of the related article summary (5 to 50 words).', 'playpixelpro' ),
			'section'     => 'playpixelpro_sidebar_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 5,
				'max'  => 50,
				'step' => 1,
			),
		)
	);
}
add_action( 'customize_register', 'playpixelpro_customize_register' );

/**
 * Sanitize Checkbox Inputs.
 *
 * @param mixed $checked Input status.
 * @return bool Sanitized boolean output.
 */
function playpixelpro_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && ( true === $checked || 1 == $checked || '1' === (string) $checked || 'true' === (string) $checked || 'on' === (string) $checked ) ) ? true : false );
}

/**
 * Generate Inline Dynamic CSS from Customizer Settings.
 */
function playpixelpro_customizer_css() {
	$accent_color  = get_theme_mod( 'playpixelpro_accent_color', '#eec35e' );
	$bg_color      = get_theme_mod( 'playpixelpro_bg_color', '#16130b' );
	$surface_color = get_theme_mod( 'playpixelpro_surface_color', '#1e1b13' );

	$css = ":root {
		--gold: {$accent_color};
		--bg: {$bg_color};
		--surface: {$surface_color};
	}";

	wp_add_inline_style( 'playpixelpro', $css );
}
add_action( 'wp_enqueue_scripts', 'playpixelpro_customizer_css', 20 );
