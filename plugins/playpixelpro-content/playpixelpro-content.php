<?php
/**
 * Plugin Name: PlayPixelPro Content
 * Description: Content types, settings, and shortcodes for the PlayPixelPro ClassicPress site.
 * Version: 3.0.0
 * Author: PlayPixelPro
 * Requires PHP: 7.4
 * License: Proprietary
 * Text Domain: playpixelpro-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Types and Taxonomies under Main PlayPixelPro Menu.
 */
function ppp_register_content() {
	// Register Downloads Post Type (Main PlayPixelPro Menu)
	register_post_type(
		'downloads',
		array(
			'labels'       => array(
				'name'               => __( 'PlayPixelPro', 'playpixelpro-content' ),
				'singular_name'      => __( 'Download', 'playpixelpro-content' ),
				'all_items'          => __( 'Downloads', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Download', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Download', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Download', 'playpixelpro-content' ),
				'new_item'           => __( 'New Download', 'playpixelpro-content' ),
				'view_item'          => __( 'View Download', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Downloads', 'playpixelpro-content' ),
				'not_found'          => __( 'No downloads found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No downloads found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'show_in_menu' => true,
			'menu_icon'    => 'dashicons-desktop',
			'menu_position'=> 25,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
			'rewrite'      => array( 'slug' => 'downloads' ),
			'show_in_rest' => true,
		)
	);

	// Register Services Post Type
	register_post_type(
		'services',
		array(
			'labels'       => array(
				'name'               => __( 'Services', 'playpixelpro-content' ),
				'singular_name'      => __( 'Service', 'playpixelpro-content' ),
				'all_items'          => __( 'Services', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Service', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Service', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Service', 'playpixelpro-content' ),
				'new_item'           => __( 'New Service', 'playpixelpro-content' ),
				'view_item'          => __( 'View Service', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Services', 'playpixelpro-content' ),
				'not_found'          => __( 'No services found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No services found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title', 'editor', 'excerpt' ),
			'show_in_rest' => true,
		)
	);

	// Register Projects Post Type
	register_post_type(
		'projects',
		array(
			'labels'       => array(
				'name'               => __( 'Projects', 'playpixelpro-content' ),
				'singular_name'      => __( 'Project', 'playpixelpro-content' ),
				'all_items'          => __( 'Projects', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Project', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Project', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Project', 'playpixelpro-content' ),
				'new_item'           => __( 'New Project', 'playpixelpro-content' ),
				'view_item'          => __( 'View Project', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Projects', 'playpixelpro-content' ),
				'not_found'          => __( 'No projects found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No projects found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_in_rest' => true,
		)
	);

	// Register Streams Post Type
	register_post_type(
		'streams',
		array(
			'labels'       => array(
				'name'               => __( 'Streams', 'playpixelpro-content' ),
				'singular_name'      => __( 'Stream', 'playpixelpro-content' ),
				'all_items'          => __( 'Streams', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Stream', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Stream', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Stream', 'playpixelpro-content' ),
				'new_item'           => __( 'New Stream', 'playpixelpro-content' ),
				'view_item'          => __( 'View Stream', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Streams', 'playpixelpro-content' ),
				'not_found'          => __( 'No streams found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No streams found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title', 'editor', 'excerpt' ),
			'show_in_rest' => true,
		)
	);

	// Register Profiles Post Type (Dynamic Social & Developer Profiles)
	register_post_type(
		'profiles',
		array(
			'labels'       => array(
				'name'               => __( 'Profiles', 'playpixelpro-content' ),
				'singular_name'      => __( 'Profile', 'playpixelpro-content' ),
				'all_items'          => __( 'Profiles', 'playpixelpro-content' ),
				'add_new'            => __( 'Add New Profile', 'playpixelpro-content' ),
				'add_new_item'       => __( 'Add New Profile', 'playpixelpro-content' ),
				'edit_item'          => __( 'Edit Profile', 'playpixelpro-content' ),
				'new_item'           => __( 'New Profile', 'playpixelpro-content' ),
				'view_item'          => __( 'View Profile', 'playpixelpro-content' ),
				'search_items'       => __( 'Search Profiles', 'playpixelpro-content' ),
				'not_found'          => __( 'No profiles found', 'playpixelpro-content' ),
				'not_found_in_trash' => __( 'No profiles found in trash', 'playpixelpro-content' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_menu' => 'edit.php?post_type=downloads',
			'supports'     => array( 'title' ),
			'show_in_rest' => true,
		)
	);

	// Register Genre Taxonomy under PlayPixelPro menu
	register_taxonomy(
		'download_genre',
		'downloads',
		array(
			'labels'            => array(
				'name'              => __( 'Genres', 'playpixelpro-content' ),
				'singular_name'     => __( 'Genre', 'playpixelpro-content' ),
				'search_items'      => __( 'Search Genres', 'playpixelpro-content' ),
				'all_items'         => __( 'All Genres', 'playpixelpro-content' ),
				'parent_item'       => __( 'Parent Genre', 'playpixelpro-content' ),
				'parent_item_colon' => __( 'Parent Genre:', 'playpixelpro-content' ),
				'edit_item'         => __( 'Edit Genre', 'playpixelpro-content' ),
				'update_item'       => __( 'Update Genre', 'playpixelpro-content' ),
				'add_new_item'      => __( 'Add New Genre', 'playpixelpro-content' ),
				'new_item_name'     => __( 'New Genre Name', 'playpixelpro-content' ),
				'menu_name'         => __( 'Genres', 'playpixelpro-content' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_in_menu'      => 'edit.php?post_type=downloads',
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'genre' ),
		)
	);
}
add_action( 'init', 'ppp_register_content' );

/**
 * Remove "Add New" submenus from PlayPixelPro main menu.
 */
function ppp_clean_admin_submenus() {
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=downloads' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=services' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=projects' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=streams' );
	remove_submenu_page( 'edit.php?post_type=downloads', 'post-new.php?post_type=profiles' );
}
add_action( 'admin_menu', 'ppp_clean_admin_submenus', 999 );

/**
 * Enqueue Material Symbols font in Admin for Services and Profiles editors.
 *
 * @param string $hook Admin page hook.
 */
function ppp_admin_scripts( $hook ) {
	global $post_type;
	if ( 'services' === $post_type || 'profiles' === $post_type ) {
		wp_enqueue_style(
			'material-symbols-admin',
			'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0',
			array(),
			'1.0.0'
		);
	}
}
add_action( 'admin_enqueue_scripts', 'ppp_admin_scripts' );

/**
 * Meta Box for Download Details.
 */
function ppp_download_box( $post ) {
	wp_nonce_field( 'ppp_save_download', 'ppp_download_nonce' );

	$file     = get_post_meta( $post->ID, '_ppp_file', true );
	$version  = get_post_meta( $post->ID, '_ppp_version', true );
	$size     = get_post_meta( $post->ID, '_ppp_size', true );
	$platform = get_post_meta( $post->ID, '_ppp_platform', true );
	?>
	<p>
		<label for="ppp_file"><strong><?php esc_html_e( 'Download File URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_file" name="ppp_file" value="<?php echo esc_attr( $file ); ?>" placeholder="https://...">
	</p>
	<p>
		<label for="ppp_version"><strong><?php esc_html_e( 'Version', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_version" name="ppp_version" value="<?php echo esc_attr( $version ); ?>" placeholder="e.g. v1.0.4">
	</p>
	<p>
		<label for="ppp_size"><strong><?php esc_html_e( 'File Size', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_size" name="ppp_size" value="<?php echo esc_attr( $size ); ?>" placeholder="e.g. 1.2 GB">
	</p>
	<p>
		<label for="ppp_platform"><strong><?php esc_html_e( 'Platform / OS', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_platform" name="ppp_platform" value="<?php echo esc_attr( $platform ); ?>" placeholder="e.g. Windows 10/11 64-bit">
	</p>
	<?php
}

/**
 * Meta Box for Service Details.
 *
 * @param WP_Post $post Current post object.
 */
function ppp_service_box( $post ) {
	wp_nonce_field( 'ppp_save_service', 'ppp_service_nonce' );

	$icon     = get_post_meta( $post->ID, '_ppp_service_icon', true );
	$commands = get_post_meta( $post->ID, '_ppp_service_commands', true );

	if ( empty( $icon ) ) {
		$icon = 'android';
	}

	$preset_icons = array(
		'android'        => __( 'Android', 'playpixelpro-content' ),
		'code'           => __( 'Web Dev', 'playpixelpro-content' ),
		'sports_esports' => __( 'Gaming', 'playpixelpro-content' ),
		'terminal'       => __( 'Terminal', 'playpixelpro-content' ),
		'cloud'          => __( 'Cloud / DevOps', 'playpixelpro-content' ),
		'rocket_launch'  => __( 'Deployment', 'playpixelpro-content' ),
		'speed'          => __( 'Performance', 'playpixelpro-content' ),
		'security'       => __( 'Security', 'playpixelpro-content' ),
		'database'       => __( 'Database', 'playpixelpro-content' ),
		'memory'         => __( 'Hardware', 'playpixelpro-content' ),
		'palette'        => __( 'Design / UI', 'playpixelpro-content' ),
		'tune'           => __( 'Optimization', 'playpixelpro-content' ),
	);
	?>
	<div class="ppp-icon-picker-wrap" style="margin-bottom: 20px;">
		<label><strong><?php esc_html_e( 'Select Service Icon (Click to choose):', 'playpixelpro-content' ); ?></strong></label>
		<div class="ppp-icon-grid" style="display: flex; flex-wrap: wrap; gap: 10px; margin: 12px 0;">
			<?php foreach ( $preset_icons as $icon_key => $label ) : ?>
				<?php $is_selected = ( $icon === $icon_key ); ?>
				<button type="button" 
					class="button ppp-icon-btn <?php echo $is_selected ? 'active' : ''; ?>" 
					data-icon="<?php echo esc_attr( $icon_key ); ?>"
					style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; height: auto; <?php echo $is_selected ? 'background: #16130b; color: #eec35e; border-color: #eec35e; font-weight: bold;' : ''; ?>">
					<span class="material-symbols-outlined" style="font-size: 1.4rem; color: <?php echo $is_selected ? '#eec35e' : 'inherit'; ?>;"><?php echo esc_html( $icon_key ); ?></span>
					<span><?php echo esc_html( $label ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>

		<p style="margin-top: 12px;">
			<label for="ppp_service_icon"><strong><?php esc_html_e( 'Selected Icon Key:', 'playpixelpro-content' ); ?></strong></label><br>
			<input class="widefat" type="text" id="ppp_service_icon" name="ppp_service_icon" value="<?php echo esc_attr( $icon ); ?>" style="max-width: 300px;">
		</p>
	</div>

	<script>
	jQuery(document).ready(function($) {
		$('.ppp-icon-btn').on('click', function(e) {
			e.preventDefault();
			var iconKey = $(this).data('icon');
			$('#ppp_service_icon').val(iconKey);

			$('.ppp-icon-btn').css({
				'background': '',
				'color': '',
				'border-color': '',
				'font-weight': ''
			}).find('.material-symbols-outlined').css('color', 'inherit');

			$(this).css({
				'background': '#16130b',
				'color': '#eec35e',
				'border-color': '#eec35e',
				'font-weight': 'bold'
			}).find('.material-symbols-outlined').css('color', '#eec35e');
		});
	});
	</script>

	<p style="margin-top: 20px;">
		<label for="ppp_service_commands"><strong><?php esc_html_e( 'Terminal Commands (One per line)', 'playpixelpro-content' ); ?></strong></label><br>
		<textarea class="widefat" rows="4" id="ppp_service_commands" name="ppp_service_commands" placeholder="> kotlin_coroutines.invoked()&#10;> jetpack_compose.build()"><?php echo esc_textarea( $commands ); ?></textarea>
	</p>
	<?php
}

/**
 * Meta Box for Project Details.
 *
 * @param WP_Post $post Current post object.
 */
function ppp_project_box( $post ) {
	wp_nonce_field( 'ppp_save_project', 'ppp_project_nonce' );

	$tech = get_post_meta( $post->ID, '_ppp_project_tech', true );
	$url  = get_post_meta( get_the_ID(), '_ppp_project_url', true );
	$btn  = get_post_meta( get_the_ID(), '_ppp_project_btn_text', true );

	if ( empty( $tech ) ) {
		$tech = 'Kotlin';
	}
	if ( empty( $btn ) ) {
		$btn = 'PROJECT_LINK >';
	}
	?>
	<p>
		<label for="ppp_project_tech"><strong><?php esc_html_e( 'Tech Tag / Badge', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_project_tech" name="ppp_project_tech" value="<?php echo esc_attr( $tech ); ?>" placeholder="e.g. Kotlin, Java, React, TypeScript">
	</p>
	<p>
		<label for="ppp_project_url"><strong><?php esc_html_e( 'Project / Repository URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_project_url" name="ppp_project_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://github.com/...">
	</p>
	<p>
		<label for="ppp_project_btn_text"><strong><?php esc_html_e( 'Button Text', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="text" id="ppp_project_btn_text" name="ppp_project_btn_text" value="<?php echo esc_attr( $btn ); ?>" placeholder="e.g. PROJECT_01 >">
	</p>
	<?php
}

/**
 * Meta Box for Stream Channel Details & Live Status.
 *
 * @param WP_Post $post Current post object.
 */
function ppp_stream_box( $post ) {
	wp_nonce_field( 'ppp_save_stream', 'ppp_stream_nonce' );

	$url     = get_post_meta( $post->ID, '_ppp_stream_url', true );
	$is_live = get_post_meta( $post->ID, '_ppp_stream_is_live', true );
	?>
	<p>
		<label for="ppp_stream_url"><strong><?php esc_html_e( 'Stream Channel URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_stream_url" name="ppp_stream_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://twitch.tv/playpixelpro">
	</p>
	<p style="margin-top: 16px; padding: 12px; background: #fff8e5; border-left: 4px solid #eec35e;">
		<label for="ppp_stream_is_live" style="font-size: 1rem; color: #16130b; font-weight: bold;">
			<input type="checkbox" id="ppp_stream_is_live" name="ppp_stream_is_live" value="1" <?php checked( $is_live, '1' ); ?>>
			🔴 <?php esc_html_e( 'Is Stream Currently Live?', 'playpixelpro-content' ); ?>
		</label><br>
		<small style="color: #666; font-style: italic;"><?php esc_html_e( 'Check this box to trigger the animated "● LIVE NOW" badge and glowing red border on the front page stream card.', 'playpixelpro-content' ); ?></small>
	</p>
	<?php
}

/**
 * Meta Box for Profile Details (Social & Developer Links).
 *
 * @param WP_Post $post Current post object.
 */
function ppp_profile_box( $post ) {
	wp_nonce_field( 'ppp_save_profile', 'ppp_profile_nonce' );

	$url   = get_post_meta( $post->ID, '_ppp_profile_url', true );
	$heavy = get_post_meta( $post->ID, '_ppp_profile_heavy', true );
	$icon  = get_post_meta( $post->ID, '_ppp_profile_icon', true );

	if ( empty( $icon ) ) {
		$icon = 'link';
	}

	$preset_icons = array(
		'code'           => __( 'GitHub / Code', 'playpixelpro-content' ),
		'favorite'       => __( 'Support / Sponsor', 'playpixelpro-content' ),
		'mail'           => __( 'Contact / Email', 'playpixelpro-content' ),
		'share'          => __( 'Social / Share', 'playpixelpro-content' ),
		'sports_esports' => __( 'Gaming / Steam', 'playpixelpro-content' ),
		'forum'          => __( 'Discord / Chat', 'playpixelpro-content' ),
		'public'         => __( 'Website / Web', 'playpixelpro-content' ),
		'terminal'       => __( 'Terminal / CLI', 'playpixelpro-content' ),
		'groups'         => __( 'Community', 'playpixelpro-content' ),
		'video_library'  => __( 'Videos', 'playpixelpro-content' ),
		'tune'           => __( 'Custom', 'playpixelpro-content' ),
	);
	?>
	<p>
		<label for="ppp_profile_url"><strong><?php esc_html_e( 'Profile Destination URL', 'playpixelpro-content' ); ?></strong></label><br>
		<input class="widefat" type="url" id="ppp_profile_url" name="ppp_profile_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://...">
	</p>

	<p style="margin-top: 14px;">
		<label for="ppp_profile_heavy">
			<input type="checkbox" id="ppp_profile_heavy" name="ppp_profile_heavy" value="1" <?php checked( $heavy, '1' ); ?>>
			<strong><?php esc_html_e( 'Use Heavy Accent Button Style (Thick Border)', 'playpixelpro-content' ); ?></strong>
		</label>
	</p>

	<div class="ppp-profile-icon-picker" style="margin-top: 20px;">
		<label><strong><?php esc_html_e( 'Select Profile Button Icon (Click to choose):', 'playpixelpro-content' ); ?></strong></label>
		<div class="ppp-profile-icon-grid" style="display: flex; flex-wrap: wrap; gap: 10px; margin: 12px 0;">
			<?php foreach ( $preset_icons as $icon_key => $label ) : ?>
				<?php $is_selected = ( $icon === $icon_key ); ?>
				<button type="button" 
					class="button ppp-picon-btn <?php echo $is_selected ? 'active' : ''; ?>" 
					data-icon="<?php echo esc_attr( $icon_key ); ?>"
					style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; height: auto; <?php echo $is_selected ? 'background: #16130b; color: #eec35e; border-color: #eec35e; font-weight: bold;' : ''; ?>">
					<span class="material-symbols-outlined" style="font-size: 1.4rem; color: <?php echo $is_selected ? '#eec35e' : 'inherit'; ?>;"><?php echo esc_html( $icon_key ); ?></span>
					<span><?php echo esc_html( $label ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>

		<p style="margin-top: 12px;">
			<label for="ppp_profile_icon"><strong><?php esc_html_e( 'Selected Material Icon Key:', 'playpixelpro-content' ); ?></strong></label><br>
			<input class="widefat" type="text" id="ppp_profile_icon" name="ppp_profile_icon" value="<?php echo esc_attr( $icon ); ?>" style="max-width: 300px;">
		</p>
	</div>

	<script>
	jQuery(document).ready(function($) {
		$('.ppp-picon-btn').on('click', function(e) {
			e.preventDefault();
			var iconKey = $(this).data('icon');
			$('#ppp_profile_icon').val(iconKey);

			$('.ppp-picon-btn').css({
				'background': '',
				'color': '',
				'border-color': '',
				'font-weight': ''
			}).find('.material-symbols-outlined').css('color', 'inherit');

			$(this).css({
				'background': '#16130b',
				'color': '#eec35e',
				'border-color': '#eec35e',
				'font-weight': 'bold'
			}).find('.material-symbols-outlined').css('color', '#eec35e');
		});
	});
	</script>
	<?php
}

/**
 * Register Meta Boxes.
 */
function ppp_add_meta_boxes() {
	add_meta_box(
		'ppp_download_details',
		__( 'Download Details', 'playpixelpro-content' ),
		'ppp_download_box',
		'downloads',
		'side',
		'default'
	);

	add_meta_box(
		'ppp_service_details',
		__( 'Service Configuration', 'playpixelpro-content' ),
		'ppp_service_box',
		'services',
		'normal',
		'high'
	);

	add_meta_box(
		'ppp_project_details',
		__( 'Project Details & Links', 'playpixelpro-content' ),
		'ppp_project_box',
		'projects',
		'normal',
		'high'
	);

	add_meta_box(
		'ppp_stream_details',
		__( 'Stream Channel & Live Status', 'playpixelpro-content' ),
		'ppp_stream_box',
		'streams',
		'normal',
		'high'
	);

	add_meta_box(
		'ppp_profile_details',
		__( 'Profile Link & Icon Settings', 'playpixelpro-content' ),
		'ppp_profile_box',
		'profiles',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ppp_add_meta_boxes' );

/**
 * Save Download Meta Box Data.
 */
function ppp_save_download( $post_id ) {
	if ( ! isset( $_POST['ppp_download_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_download_nonce'] ) ), 'ppp_save_download' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'downloads' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_file'] ) ) {
		update_post_meta( $post_id, '_ppp_file', esc_url_raw( wp_unslash( $_POST['ppp_file'] ) ) );
	}
	if ( isset( $_POST['ppp_version'] ) ) {
		update_post_meta( $post_id, '_ppp_version', sanitize_text_field( wp_unslash( $_POST['ppp_version'] ) ) );
	}
	if ( isset( $_POST['ppp_size'] ) ) {
		update_post_meta( $post_id, '_ppp_size', sanitize_text_field( wp_unslash( $_POST['ppp_size'] ) ) );
	}
	if ( isset( $_POST['ppp_platform'] ) ) {
		update_post_meta( $post_id, '_ppp_platform', sanitize_text_field( wp_unslash( $_POST['ppp_platform'] ) ) );
	}
}
add_action( 'save_post_downloads', 'ppp_save_download' );

/**
 * Save Service Meta Box Data.
 */
function ppp_save_service( $post_id ) {
	if ( ! isset( $_POST['ppp_service_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_service_nonce'] ) ), 'ppp_save_service' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'services' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_service_icon'] ) ) {
		update_post_meta( $post_id, '_ppp_service_icon', sanitize_text_field( wp_unslash( $_POST['ppp_service_icon'] ) ) );
	}
	if ( isset( $_POST['ppp_service_commands'] ) ) {
		update_post_meta( $post_id, '_ppp_service_commands', sanitize_textarea_field( wp_unslash( $_POST['ppp_service_commands'] ) ) );
	}
}
add_action( 'save_post_services', 'ppp_save_service' );

/**
 * Save Project Meta Box Data.
 */
function ppp_save_project( $post_id ) {
	if ( ! isset( $_POST['ppp_project_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_project_nonce'] ) ), 'ppp_save_project' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'projects' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_project_tech'] ) ) {
		update_post_meta( $post_id, '_ppp_project_tech', sanitize_text_field( wp_unslash( $_POST['ppp_project_tech'] ) ) );
	}
	if ( isset( $_POST['ppp_project_url'] ) ) {
		update_post_meta( $post_id, '_ppp_project_url', esc_url_raw( wp_unslash( $_POST['ppp_project_url'] ) ) );
	}
	if ( isset( $_POST['ppp_project_btn_text'] ) ) {
		update_post_meta( $post_id, '_ppp_project_btn_text', sanitize_text_field( wp_unslash( $_POST['ppp_project_btn_text'] ) ) );
	}
}
add_action( 'save_post_projects', 'ppp_save_project' );

/**
 * Save Stream Meta Box Data.
 */
function ppp_save_stream( $post_id ) {
	if ( ! isset( $_POST['ppp_stream_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_stream_nonce'] ) ), 'ppp_save_stream' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'streams' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_stream_url'] ) ) {
		update_post_meta( $post_id, '_ppp_stream_url', esc_url_raw( wp_unslash( $_POST['ppp_stream_url'] ) ) );
	}
	$is_live = isset( $_POST['ppp_stream_is_live'] ) ? '1' : '0';
	update_post_meta( $post_id, '_ppp_stream_is_live', $is_live );
}
add_action( 'save_post_streams', 'ppp_save_stream' );

/**
 * Save Profile Meta Box Data.
 */
function ppp_save_profile( $post_id ) {
	if ( ! isset( $_POST['ppp_profile_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ppp_profile_nonce'] ) ), 'ppp_save_profile' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || 'profiles' !== get_post_type( $post_id ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['ppp_profile_url'] ) ) {
		update_post_meta( $post_id, '_ppp_profile_url', esc_url_raw( wp_unslash( $_POST['ppp_profile_url'] ) ) );
	}
	$heavy = isset( $_POST['ppp_profile_heavy'] ) ? '1' : '0';
	update_post_meta( $post_id, '_ppp_profile_heavy', $heavy );

	if ( isset( $_POST['ppp_profile_icon'] ) ) {
		update_post_meta( $post_id, '_ppp_profile_icon', sanitize_text_field( wp_unslash( $_POST['ppp_profile_icon'] ) ) );
	}
}
add_action( 'save_post_profiles', 'ppp_save_profile' );

/**
 * Activation & Deactivation Hooks.
 */
function ppp_activate() {
	ppp_register_content();
	flush_rewrite_rules();
}
function ppp_deactivate() {
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ppp_activate' );
register_deactivation_hook( __FILE__, 'ppp_deactivate' );

/**
 * Shortcodes.
 */
function ppp_download_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => 0 ), $atts, 'game-card' );
	$post = get_post( absint( $atts['id'] ) );

	if ( ! $post || 'downloads' !== $post->post_type ) {
		return '';
	}

	$version  = get_post_meta( $post->ID, '_ppp_version', true );
	$size     = get_post_meta( $post->ID, '_ppp_size', true );
	$platform = get_post_meta( $post->ID, '_ppp_platform', true );

	$meta_html = '';
	if ( $version || $size || $platform ) {
		$meta_items = array_filter( array( $version, $size, $platform ) );
		$meta_html  = '<p class="meta">' . esc_html( implode( ' • ', $meta_items ) ) . '</p>';
	}

	return sprintf(
		'<div class="game-card brutalist-card"><div><h3>%1$s</h3>%2$s<p>%3$s</p></div><a class="button heavy-btn" href="%4$s">%5$s</a></div>',
		esc_html( get_the_title( $post ) ),
		$meta_html,
		esc_html( get_the_excerpt( $post ) ),
		esc_url( get_permalink( $post ) ),
		esc_html__( 'VIEW_DOWNLOAD', 'playpixelpro-content' )
	);
}
add_shortcode( 'game-card', 'ppp_download_shortcode' );

function ppp_terminal_box_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array( 'title' => 'TERMINAL_WINDOW' ), $atts, 'terminal-box' );

	return sprintf(
		'<div class="terminal-window"><div class="window-bar"><div class="window-dots"><span class="window-dot dot-red"></span><span class="window-dot dot-yellow"></span><span class="window-dot dot-green"></span></div><span class="window-title">%1$s</span></div><div class="terminal-body">%2$s</div></div>',
		esc_html( $atts['title'] ),
		do_shortcode( $content )
	);
}
add_shortcode( 'terminal-box', 'ppp_terminal_box_shortcode' );

function ppp_system_specs_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'cpu' => '50', 'memory' => '40', 'disk' => '70' ), $atts, 'system-specs' );
	return sprintf(
		'<div class="brutalist-card" style="padding: 16px; margin: 20px 0;">' .
		'<div style="margin-bottom: 10px;"><strong style="font-size: 0.8rem; color: var(--gold);">CPU_LOAD (%1$d%%)</strong><div class="progress-wrap" style="height:6px; margin:4px 0;"><span style="width:%1$d%%;"></span></div></div>' .
		'<div style="margin-bottom: 10px;"><strong style="font-size: 0.8rem; color: var(--gold);">MEMORY_USAGE (%2$d%%)</strong><div class="progress-wrap" style="height:6px; margin:4px 0;"><span style="width:%2$d%%;"></span></div></div>' .
		'<div><strong style="font-size: 0.8rem; color: var(--gold);">STORAGE_USAGE (%3$d%%)</strong><div class="progress-wrap" style="height:6px; margin:4px 0;"><span style="width:%3$d%%;"></span></div></div>' .
		'</div>',
		absint( $atts['cpu'] ),
		absint( $atts['memory'] ),
		absint( $atts['disk'] )
	);
}
add_shortcode( 'system-specs', 'ppp_system_specs_shortcode' );

function ppp_social_shortcode() {
	$links = (array) get_option( 'ppp_social', array() );
	if ( empty( $links ) ) {
		return '';
	}

	$out = '<div class="social-links">';
	foreach ( $links as $label => $url ) {
		if ( ! empty( $url ) ) {
			$out .= sprintf( '<a class="meta-badge" href="%1$s" rel="me noopener" target="_blank">%2$s</a>', esc_url( $url ), esc_html( ucfirst( $label ) ) );
		}
	}
	$out .= '</div>';
	return $out;
}
add_shortcode( 'social-links', 'ppp_social_shortcode' );

/* ==========================================================================
   PlayPixelPro Contact Transmission Engine, SMTP, Bot Fight & Newsletter System
   ========================================================================== */

// 1. Activation & Table Initialization
function ppp_create_subscriber_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'ppp_subscribers';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		name varchar(100) NOT NULL DEFAULT '',
		email varchar(100) NOT NULL DEFAULT '',
		subscribed_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		status varchar(20) DEFAULT 'active' NOT NULL,
		PRIMARY KEY  (id),
		UNIQUE KEY email (email)
	) {$charset_collate};";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
}
register_activation_hook( __FILE__, 'ppp_create_subscriber_table' );
add_action( 'admin_init', 'ppp_create_subscriber_table' );

// 2. Add Submenu Page under PlayPixelPro Admin Menu
function ppp_add_contact_settings_menu() {
	add_submenu_page(
		'edit.php?post_type=downloads',
		__( 'Contact & Mail Settings', 'playpixelpro-content' ),
		__( 'Contact & Mail Settings', 'playpixelpro-content' ),
		'manage_options',
		'ppp-mail-settings',
		'ppp_render_contact_settings_page'
	);
}
add_action( 'admin_menu', 'ppp_add_contact_settings_menu' );

// 3. Configure PHPMailer via phpmailer_init
function ppp_setup_custom_smtp( $phpmailer ) {
	$smtp_enabled = get_option( 'ppp_smtp_enabled', false );
	if ( ! $smtp_enabled ) {
		return;
	}

	$smtp_host  = get_option( 'ppp_smtp_host', '' );
	$smtp_port  = get_option( 'ppp_smtp_port', '587' );
	$smtp_enc   = get_option( 'ppp_smtp_encryption', 'tls' );
	$smtp_user  = get_option( 'ppp_smtp_user', '' );
	$smtp_pass  = get_option( 'ppp_smtp_pass', '' );
	$from_email = get_option( 'ppp_smtp_from_email', '' );
	$from_name  = get_option( 'ppp_smtp_from_name', '' );

	if ( ! empty( $smtp_host ) ) {
		$phpmailer->isSMTP();
		$phpmailer->Host       = $smtp_host;
		$phpmailer->Port       = absint( $smtp_port );
		$phpmailer->SMTPAuth   = ! empty( $smtp_user );
		$phpmailer->Username   = $smtp_user;
		$phpmailer->Password   = $smtp_pass;

		if ( 'ssl' === $smtp_enc || 'tls' === $smtp_enc ) {
			$phpmailer->SMTPSecure = $smtp_enc;
		} else {
			$phpmailer->SMTPSecure = '';
			$phpmailer->SMTPAutoTLS = false;
		}

		if ( ! empty( $from_email ) ) {
			$phpmailer->From     = $from_email;
			$phpmailer->FromName = ! empty( $from_name ) ? $from_name : get_bloginfo( 'name' );
		}
	}
}
add_action( 'phpmailer_init', 'ppp_setup_custom_smtp' );

// 4. Bot Protection Verification Function (Turnstile & reCAPTCHA)
function ppp_verify_bot_protection( $token, $provider, $secret_key ) {
	if ( 'none' === $provider || empty( $provider ) || empty( $secret_key ) ) {
		return true;
	}

	if ( empty( $token ) ) {
		return false;
	}

	$verify_url = '';
	if ( 'turnstile' === $provider ) {
		$verify_url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
	} elseif ( 'recaptcha_v2' === $provider || 'recaptcha_v3' === $provider ) {
		$verify_url = 'https://www.google.com/recaptcha/api/siteverify';
	}

	if ( empty( $verify_url ) ) {
		return true;
	}

	$response = wp_remote_post(
		$verify_url,
		array(
			'body' => array(
				'secret'   => $secret_key,
				'response' => $token,
				'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) : '',
			),
		)
	);

	if ( is_wp_error( $response ) ) {
		return false;
	}

	$body = wp_remote_retrieve_body( $response );
	$data = json_decode( $body, true );

	return ( isset( $data['success'] ) && true === $data['success'] );
}

// 5. CSV Export Handler
function ppp_export_subscribers_csv() {
	if ( isset( $_GET['page'] ) && 'ppp-mail-settings' === $_GET['page'] && isset( $_GET['action'] ) && 'export_csv' === $_GET['action'] ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'Unauthorized access.', 'playpixelpro-content' ) );
		}

		global $wpdb;
		$table_name  = $wpdb->prefix . 'ppp_subscribers';
		$subscribers = $wpdb->get_results( "SELECT * FROM {$table_name} ORDER BY id DESC", ARRAY_A );

		header( 'Content-Type: text/csv; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=newsletter_subscribers_' . date( 'Y-m-d' ) . '.csv' );
		$output = fopen( 'php://output', 'w' );
		fputcsv( $output, array( 'ID', 'Name', 'Email', 'Subscribed Date', 'Status' ) );

		if ( ! empty( $subscribers ) ) {
			foreach ( $subscribers as $row ) {
				fputcsv( $output, $row );
			}
		}
		fclose( $output );
		exit;
	}
}
add_action( 'admin_init', 'ppp_export_subscribers_csv' );

// 6. Admin Settings Page Renderer
function ppp_render_contact_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'smtp';
	$notice     = '';

	// Handle Settings Save
	if ( isset( $_POST['ppp_save_mail_settings'] ) && check_admin_referer( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ) ) {
		if ( 'smtp' === $active_tab ) {
			update_option( 'ppp_smtp_enabled', isset( $_POST['ppp_smtp_enabled'] ) );
			update_option( 'ppp_smtp_host', sanitize_text_field( $_POST['ppp_smtp_host'] ) );
			update_option( 'ppp_smtp_port', absint( $_POST['ppp_smtp_port'] ) );
			update_option( 'ppp_smtp_encryption', sanitize_key( $_POST['ppp_smtp_encryption'] ) );
			update_option( 'ppp_smtp_user', sanitize_text_field( $_POST['ppp_smtp_user'] ) );
			if ( ! empty( $_POST['ppp_smtp_pass'] ) ) {
				update_option( 'ppp_smtp_pass', sanitize_text_field( $_POST['ppp_smtp_pass'] ) );
			}
			update_option( 'ppp_smtp_from_email', sanitize_email( $_POST['ppp_smtp_from_email'] ) );
			update_option( 'ppp_smtp_from_name', sanitize_text_field( $_POST['ppp_smtp_from_name'] ) );
			update_option( 'ppp_contact_destination_email', sanitize_email( $_POST['ppp_contact_destination_email'] ) );
			update_option( 'ppp_autoreply_enabled', isset( $_POST['ppp_autoreply_enabled'] ) );
			update_option( 'ppp_autoreply_subject', sanitize_text_field( $_POST['ppp_autoreply_subject'] ) );
			update_option( 'ppp_autoreply_body', sanitize_textarea_field( $_POST['ppp_autoreply_body'] ) );
			$notice = __( 'SMTP & Auto-Reply Settings saved successfully.', 'playpixelpro-content' );
		} elseif ( 'bot' === $active_tab ) {
			update_option( 'ppp_bot_provider', sanitize_key( $_POST['ppp_bot_provider'] ) );
			update_option( 'ppp_bot_site_key', sanitize_text_field( $_POST['ppp_bot_site_key'] ) );
			update_option( 'ppp_bot_secret_key', sanitize_text_field( $_POST['ppp_bot_secret_key'] ) );
			$notice = __( 'Bot Fight Protection Settings saved successfully.', 'playpixelpro-content' );
		}
	}

	// Handle Test Email Dispatch
	if ( isset( $_POST['ppp_send_test_email'] ) && check_admin_referer( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ) ) {
		$test_recipient = sanitize_email( $_POST['ppp_test_recipient'] );
		if ( ! empty( $test_recipient ) ) {
			$sent = wp_mail(
				$test_recipient,
				'[PlayPixelPro] Test Transmission Packet',
				"Greetings,\n\nThis is a test email transmission packet sent from your PlayPixelPro site using the configured SMTP server.\n\nStatus: OK\nTimestamp: " . date( 'Y-m-d H:i:s' )
			);
			if ( $sent ) {
				$notice = sprintf( __( 'Test email transmission packet successfully delivered to %s.', 'playpixelpro-content' ), esc_html( $test_recipient ) );
			} else {
				$notice = __( 'Test email transmission failed. Please check your SMTP host, authentication, and port credentials.', 'playpixelpro-content' );
			}
		}
	}

	// Handle Test Auto-Reply Dispatch
	if ( isset( $_POST['ppp_send_test_autoreply'] ) && check_admin_referer( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ) ) {
		$test_recipient = sanitize_email( $_POST['ppp_test_recipient'] );
		if ( ! empty( $test_recipient ) ) {
			$default_ar_sub  = sprintf( __( '[%s] Transmission Received - Thank You!', 'playpixelpro-content' ), get_bloginfo( 'name' ) );
			$reply_sub       = get_option( 'ppp_autoreply_subject', $default_ar_sub );
			if ( empty( $reply_sub ) ) {
				$reply_sub = $default_ar_sub;
			}
			$default_ar_body = "Greetings {username},\n\nThank you for connecting with {site_name}!\n\nWe have successfully received your transmission packet and will review your message shortly.\n\n---\nTransmission Summary:\nSender: {username}\nReturn Address: {email}\nStatus: RECEIVED & QUEUED\n\nBest regards,\nThe {site_name} Team";
			$reply_body      = get_option( 'ppp_autoreply_body', $default_ar_body );
			if ( empty( $reply_body ) ) {
				$reply_body = $default_ar_body;
			}

			$current_user = wp_get_current_user();
			$test_user    = $current_user->display_name ? $current_user->display_name : 'Admin Operative';
			$html_email   = ppp_build_autoreply_html_email( $test_user, $test_recipient, $reply_body, $reply_sub );

			$from_name  = get_option( 'ppp_smtp_from_name', get_bloginfo( 'name' ) );
			$from_email = get_option( 'ppp_smtp_from_email', get_bloginfo( 'admin_email' ) );

			$headers = array(
				'Content-Type: text/html; charset=UTF-8',
			);
			if ( ! empty( $from_name ) && ! empty( $from_email ) ) {
				$headers[] = 'From: ' . $from_name . ' <' . $from_email . '>';
			}

			$sent = wp_mail( $test_recipient, $reply_sub, $html_email, $headers );
			if ( $sent ) {
				$notice = sprintf( __( 'Test HTML auto-reply email successfully delivered to %s.', 'playpixelpro-content' ), esc_html( $test_recipient ) );
			} else {
				$notice = __( 'Failed to dispatch test auto-reply email. Please check your SMTP configuration.', 'playpixelpro-content' );
			}
		}
	}

	// Handle Broadcast Newsletter
	if ( isset( $_POST['ppp_send_newsletter_broadcast'] ) && check_admin_referer( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ) ) {
		$subject = sanitize_text_field( $_POST['ppp_broadcast_subject'] );
		$body    = wp_kses_post( $_POST['ppp_broadcast_body'] );

		global $wpdb;
		$table_name  = $wpdb->prefix . 'ppp_subscribers';
		$subscribers = $wpdb->get_col( "SELECT email FROM {$table_name} WHERE status = 'active'" );

		if ( ! empty( $subscribers ) && ! empty( $subject ) && ! empty( $body ) ) {
			$count = 0;
			foreach ( $subscribers as $sub_email ) {
				if ( wp_mail( $sub_email, $subject, $body, array( 'Content-Type: text/html; charset=UTF-8' ) ) ) {
					$count++;
				}
			}
			$notice = sprintf( __( 'Newsletter broadcast sent successfully to %d active subscribers!', 'playpixelpro-content' ), $count );
		} else {
			$notice = __( 'No active subscribers found or subject/body were empty.', 'playpixelpro-content' );
		}
	}

	// Fetch Options
	$smtp_enabled = get_option( 'ppp_smtp_enabled', false );
	$smtp_host    = get_option( 'ppp_smtp_host', '' );
	$smtp_port    = get_option( 'ppp_smtp_port', '587' );
	$smtp_enc     = get_option( 'ppp_smtp_encryption', 'tls' );
	$smtp_user    = get_option( 'ppp_smtp_user', '' );
	$smtp_pass    = get_option( 'ppp_smtp_pass', '' );
	$from_email        = get_option( 'ppp_smtp_from_email', get_bloginfo( 'admin_email' ) );
	$from_name         = get_option( 'ppp_smtp_from_name', get_bloginfo( 'name' ) );
	$dest_email        = get_option( 'ppp_contact_destination_email', get_bloginfo( 'admin_email' ) );
	$autoreply_enabled = get_option( 'ppp_autoreply_enabled', false );
	$default_ar_sub    = sprintf( __( '[%s] Transmission Received - Thank You!', 'playpixelpro-content' ), get_bloginfo( 'name' ) );
	$autoreply_subject = get_option( 'ppp_autoreply_subject', $default_ar_sub );
	$default_ar_body   = "Greetings {username},\n\nThank you for connecting with {site_name}!\n\nWe have successfully received your transmission packet and will review your message shortly.\n\n---\nTransmission Summary:\nSender: {username}\nReturn Address: {email}\nStatus: RECEIVED & QUEUED\n\nBest regards,\nThe {site_name} Team";
	$autoreply_body    = get_option( 'ppp_autoreply_body', $default_ar_body );

	$bot_provider = get_option( 'ppp_bot_provider', 'none' );
	$bot_site_key = get_option( 'ppp_bot_site_key', '' );
	$bot_sec_key  = get_option( 'ppp_bot_secret_key', '' );

	global $wpdb;
	$table_name  = $wpdb->prefix . 'ppp_subscribers';
	$subscribers = $wpdb->get_results( "SELECT * FROM {$table_name} ORDER BY id DESC LIMIT 50", ARRAY_A );
	$total_subs  = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name}" );
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline" style="font-family: monospace; color: #16130b;"><?php esc_html_e( 'PlayPixelPro // Contact & Mail Settings', 'playpixelpro-content' ); ?></h1>
		<hr class="wp-header-end">

		<?php if ( ! empty( $notice ) ) : ?>
			<div class="notice notice-info is-dismissible"><p><?php echo esc_html( $notice ); ?></p></div>
		<?php endif; ?>

		<nav class="nav-tab-wrapper" style="margin-top: 15px;">
			<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=downloads&page=ppp-mail-settings&tab=smtp' ) ); ?>" class="nav-tab <?php echo 'smtp' === $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'SMTP Mailer Config', 'playpixelpro-content' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=downloads&page=ppp-mail-settings&tab=bot' ) ); ?>" class="nav-tab <?php echo 'bot' === $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Bot Fight & Protection (Turnstile / reCAPTCHA)', 'playpixelpro-content' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=downloads&page=ppp-mail-settings&tab=newsletter' ) ); ?>" class="nav-tab <?php echo 'newsletter' === $active_tab ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Newsletter & Subscribers', 'playpixelpro-content' ); ?></a>
		</nav>

		<div class="tab-content" style="background: #fff; padding: 24px; border: 1px solid #ccc; border-top: 0; max-width: 900px;">
			<?php if ( 'smtp' === $active_tab ) : ?>
				<form method="POST" action="">
					<?php wp_nonce_field( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ); ?>
					<h2><?php esc_html_e( 'SMTP Mail Server Credentials', 'playpixelpro-content' ); ?></h2>
					<p><?php esc_html_e( 'Route contact transmissions and newsletter broadcasts through your custom SMTP server (Gmail, Mailgun, Office 365, etc.).', 'playpixelpro-content' ); ?></p>

					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Enable Custom SMTP', 'playpixelpro-content' ); ?></th>
							<td>
								<label><input type="checkbox" name="ppp_smtp_enabled" value="1" <?php checked( $smtp_enabled ); ?>> <?php esc_html_e( 'Use custom SMTP for all outgoing wp_mail() transmissions', 'playpixelpro-content' ); ?></label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'SMTP Host', 'playpixelpro-content' ); ?></th>
							<td><input type="text" name="ppp_smtp_host" value="<?php echo esc_attr( $smtp_host ); ?>" class="regular-text" placeholder="smtp.example.com"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'SMTP Port', 'playpixelpro-content' ); ?></th>
							<td><input type="number" name="ppp_smtp_port" value="<?php echo esc_attr( $smtp_port ); ?>" class="small-text"> <span class="description">Standard: 587 (TLS), 465 (SSL), 25 (None)</span></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Encryption', 'playpixelpro-content' ); ?></th>
							<td>
								<select name="ppp_smtp_encryption">
									<option value="tls" <?php selected( $smtp_enc, 'tls' ); ?>>TLS (Recommended)</option>
									<option value="ssl" <?php selected( $smtp_enc, 'ssl' ); ?>>SSL</option>
									<option value="none" <?php selected( $smtp_enc, 'none' ); ?>>None</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'SMTP Username', 'playpixelpro-content' ); ?></th>
							<td><input type="text" name="ppp_smtp_user" value="<?php echo esc_attr( $smtp_user ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'SMTP Password', 'playpixelpro-content' ); ?></th>
							<td><input type="password" name="ppp_smtp_pass" value="<?php echo esc_attr( $smtp_pass ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'From Email Address', 'playpixelpro-content' ); ?></th>
							<td><input type="email" name="ppp_smtp_from_email" value="<?php echo esc_attr( $from_email ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'From Sender Name', 'playpixelpro-content' ); ?></th>
							<td><input type="text" name="ppp_smtp_from_name" value="<?php echo esc_attr( $from_name ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Contact Notification Destination Email', 'playpixelpro-content' ); ?></th>
							<td>
								<input type="email" name="ppp_contact_destination_email" value="<?php echo esc_attr( $dest_email ); ?>" class="regular-text" placeholder="juan@email.com">
								<p class="description"><?php esc_html_e( 'The inbox address where messages sent via the [CONNECT.SH] contact form will be delivered. Defaults to the site admin email.', 'playpixelpro-content' ); ?></p>
							</td>
						</tr>
					</table>

					<h3 style="margin-top: 30px;"><?php esc_html_e( 'Auto-Reply / Thank-You Confirmation Settings', 'playpixelpro-content' ); ?></h3>
					<p><?php esc_html_e( 'Automatically send a thank-you confirmation packet back to the visitor after they submit a message.', 'playpixelpro-content' ); ?></p>

					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Enable Auto-Reply', 'playpixelpro-content' ); ?></th>
							<td>
								<label><input type="checkbox" name="ppp_autoreply_enabled" value="1" <?php checked( $autoreply_enabled ); ?>> <?php esc_html_e( 'Send automated confirmation email back to the visitor', 'playpixelpro-content' ); ?></label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Auto-Reply Subject', 'playpixelpro-content' ); ?></th>
							<td>
								<input type="text" name="ppp_autoreply_subject" value="<?php echo esc_attr( $autoreply_subject ); ?>" class="large-text">
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Auto-Reply Message Body', 'playpixelpro-content' ); ?></th>
							<td>
								<textarea name="ppp_autoreply_body" rows="8" class="large-text code"><?php echo esc_textarea( $autoreply_body ); ?></textarea>
								<p class="description"><?php esc_html_e( 'Available template placeholders: {username}, {email}, {site_name}, {site_url}', 'playpixelpro-content' ); ?></p>
							</td>
						</tr>
					</table>

					<p class="submit"><input type="submit" name="ppp_save_mail_settings" class="button button-primary" value="<?php esc_attr_e( 'Save SMTP Settings', 'playpixelpro-content' ); ?>"></p>
				</form>

				<hr style="margin: 30px 0;">

				<form method="POST" action="">
					<?php wp_nonce_field( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ); ?>
					<h3><?php esc_html_e( 'Test SMTP Transmission', 'playpixelpro-content' ); ?></h3>
					<p><input type="email" name="ppp_test_recipient" value="<?php echo esc_attr( wp_get_current_user()->user_email ); ?>" class="regular-text" placeholder="recipient@example.com">
					<input type="submit" name="ppp_send_test_email" class="button button-secondary" value="<?php esc_attr_e( 'Send Plain Test Email', 'playpixelpro-content' ); ?>">
					<input type="submit" name="ppp_send_test_autoreply" class="button button-secondary" value="<?php esc_attr_e( 'Send Test HTML Auto-Reply Email', 'playpixelpro-content' ); ?>" style="margin-left: 4px;"></p>
				</form>

			<?php elseif ( 'bot' === $active_tab ) : ?>
				<form method="POST" action="">
					<?php wp_nonce_field( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ); ?>
					<h2><?php esc_html_e( 'Bot Fight & Spam Protection Settings', 'playpixelpro-content' ); ?></h2>
					<p><?php esc_html_e( 'Prevent automated spam packets on the Contact Terminal page using Cloudflare Turnstile or Google reCAPTCHA.', 'playpixelpro-content' ); ?></p>

					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Bot Fight Provider', 'playpixelpro-content' ); ?></th>
							<td>
								<select name="ppp_bot_provider">
									<option value="none" <?php selected( $bot_provider, 'none' ); ?>>Disabled (None)</option>
									<option value="turnstile" <?php selected( $bot_provider, 'turnstile' ); ?>>Cloudflare Turnstile (Recommended)</option>
									<option value="recaptcha_v2" <?php selected( $bot_provider, 'recaptcha_v2' ); ?>>Google reCAPTCHA v2 Checkbox</option>
									<option value="recaptcha_v3" <?php selected( $bot_provider, 'recaptcha_v3' ); ?>>Google reCAPTCHA v3 Invisible</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Site Key (Public)', 'playpixelpro-content' ); ?></th>
							<td><input type="text" name="ppp_bot_site_key" value="<?php echo esc_attr( $bot_site_key ); ?>" class="large-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Secret Key (Private)', 'playpixelpro-content' ); ?></th>
							<td><input type="password" name="ppp_bot_secret_key" value="<?php echo esc_attr( $bot_sec_key ); ?>" class="large-text"></td>
						</tr>
					</table>

					<p class="submit"><input type="submit" name="ppp_save_mail_settings" class="button button-primary" value="<?php esc_attr_e( 'Save Bot Protection Settings', 'playpixelpro-content' ); ?>"></p>
				</form>

			<?php elseif ( 'newsletter' === $active_tab ) : ?>
				<div style="display: flex; justify-content: space-between; align-items: center;">
					<h2><?php esc_html_e( 'Subscribers Database', 'playpixelpro-content' ); ?> (<?php echo esc_html( absint( $total_subs ) ); ?> total)</h2>
					<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=downloads&page=ppp-mail-settings&tab=newsletter&action=export_csv' ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Export Subscribers CSV', 'playpixelpro-content' ); ?></a>
				</div>

				<table class="widefat fixed striped" style="margin-top: 15px;">
					<thead>
						<tr>
							<th style="width: 50px;">ID</th>
							<th>Name / Username</th>
							<th>Return Email Address</th>
							<th>Subscribed Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $subscribers ) ) : ?>
							<?php foreach ( $subscribers as $sub ) : ?>
								<tr>
									<td><?php echo esc_html( $sub['id'] ); ?></td>
									<td><strong><?php echo esc_html( $sub['name'] ); ?></strong></td>
									<td><?php echo esc_html( $sub['email'] ); ?></td>
									<td><?php echo esc_html( $sub['subscribed_at'] ); ?></td>
									<td><span class="badge" style="background: #28a745; color: #fff; padding: 2px 6px; border-radius: 3px; font-size: 11px;"><?php echo esc_html( strtoupper( $sub['status'] ) ); ?></span></td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr><td colspan="5"><?php esc_html_e( 'No newsletter subscribers found yet.', 'playpixelpro-content' ); ?></td></tr>
						<?php endif; ?>
					</tbody>
				</table>

				<hr style="margin: 30px 0;">

				<h2><?php esc_html_e( 'Broadcast Newsletter Email Dispatcher', 'playpixelpro-content' ); ?></h2>
				<form method="POST" action="">
					<?php wp_nonce_field( 'ppp_mail_settings_action', 'ppp_mail_settings_nonce' ); ?>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Newsletter Subject', 'playpixelpro-content' ); ?></th>
							<td><input type="text" name="ppp_broadcast_subject" class="large-text" placeholder="[DEV_ROOT] System Update Broadcast #01"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Newsletter Content', 'playpixelpro-content' ); ?></th>
							<td>
								<?php
								wp_editor(
									'',
									'ppp_broadcast_body',
									array(
										'textarea_name' => 'ppp_broadcast_body',
										'textarea_rows' => 10,
										'media_buttons' => true,
									)
								);
								?>
							</td>
						</tr>
					</table>
					<p class="submit"><input type="submit" name="ppp_send_newsletter_broadcast" class="button button-primary" value="<?php esc_attr_e( 'Broadcast Newsletter to All Active Subscribers', 'playpixelpro-content' ); ?>" onclick="return confirm('Are you sure you want to broadcast this newsletter email to all active subscribers?');"></p>
				</form>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/**
 * Generate a Terminal Modernist HTML auto-reply email.
 * Built with full cross-client compatibility: Outlook 2007-2021 (MSO tables, XML DPI scaling, VML buttons),
 * Yahoo! Mail, Gmail, Apple Mail, and mobile clients.
 *
 * @param string $username       Visitor's name.
 * @param string $email          Visitor's email.
 * @param string $custom_message Custom message text from settings.
 * @param string $subject        Subject line.
 * @return string HTML email content.
 */
function ppp_build_autoreply_html_email( $username, $email, $custom_message, $subject ) {
	$site_name = get_bloginfo( 'name' );
	$site_url  = home_url();

	// Replace template tags
	$tags = array(
		'{username}'  => esc_html( $username ),
		'{email}'     => esc_html( $email ),
		'{site_name}' => esc_html( $site_name ),
		'{site_url}'  => esc_url( $site_url ),
	);
	$content_formatted = str_replace( array_keys( $tags ), array_values( $tags ), $custom_message );
	$content_html      = nl2br( esc_html( $content_formatted ) );
	$timestamp         = current_time( 'Y-m-d H:i:s T' );

	ob_start();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo esc_html( $subject ); ?></title>
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<style type="text/css">
		body, table, td, p, a, li, blockquote { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
		table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
		img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
		body { margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #16130b; }
		@media only screen and (max-width: 620px) {
			.email-container { width: 100% !important; max-width: 100% !important; }
			.card-padding { padding: 24px 18px !important; }
			.meta-padding { padding: 0 18px 20px 18px !important; }
		}
	</style>
</head>
<body bgcolor="#16130b" style="margin: 0; padding: 0; background-color: #16130b; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; color: #e9e2d4; -webkit-font-smoothing: antialiased;">
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#16130b" style="background-color: #16130b; table-layout: fixed;">
		<tr>
			<td align="center" style="padding: 30px 12px;">
				<!--[if (gte mso 9)|(IE)]>
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
				<tr>
				<td>
				<![endif]-->
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" class="email-container" style="max-width: 600px; background-color: #1e1b13; border: 2px solid #4e4637; margin: 0 auto;">
					
					<!-- TERMINAL TOP WINDOW BAR -->
					<tr>
						<td bgcolor="#16130b" style="background-color: #16130b; padding: 12px 20px; border-bottom: 2px solid #4e4637;">
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="left" style="font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 13px; font-weight: bold; color: #eec35e; letter-spacing: 1px;">
										<span style="color: #ff5555; margin-right: 3px;">●</span>
										<span style="color: #eec35e; margin-right: 3px;">●</span>
										<span style="color: #00ff9c; margin-right: 8px;">●</span>
										<?php echo esc_html( strtoupper( $site_name ) ); ?> // CONNECT.SH
									</td>
									<td align="right" style="font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 11px; color: #9a8f7d; letter-spacing: 1px;">
										[ACK_0x00]
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<!-- HERO STATUS HEADER -->
					<tr>
						<td class="card-padding" style="padding: 32px 30px 20px 30px; text-align: left;">
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 18px;">
								<tr>
									<td bgcolor="#16130b" style="background-color: #16130b; border: 1px solid #00ff9c; padding: 5px 12px; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 11px; font-weight: bold; color: #00ff9c; letter-spacing: 1px;">
										● STATUS: TRANSMISSION_RECEIVED_OK
									</td>
								</tr>
							</table>
							<h1 style="margin: 0 0 12px 0; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 20px; font-weight: bold; color: #eec35e; line-height: 1.3; letter-spacing: 0.5px;">
								TRANSMISSION_CONFIRMED
							</h1>
							<p style="margin: 0; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 14px; line-height: 1.6; color: #e9e2d4;">
								Greetings <strong><?php echo esc_html( $username ); ?></strong>, your communication packet has been securely ingested by our terminal uplink.
							</p>
						</td>
					</tr>

					<!-- TELEMETRY / PACKET METADATA BOX -->
					<tr>
						<td class="meta-padding" style="padding: 0 30px 24px 30px;">
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#16130b" style="background-color: #16130b; border: 1px dashed #4e4637;">
								<tr>
									<td style="padding: 16px; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 12px; line-height: 1.7; color: #9a8f7d;">
										<span style="color: #eec35e; font-weight: bold;">[PACKET_TELEMETRY]</span><br />
										<span style="color: #9a8f7d;">IDENTIFIER  :</span> <span style="color: #e9e2d4; font-weight: bold;"><?php echo esc_html( $username ); ?></span><br />
										<span style="color: #9a8f7d;">RETURN_ADDR :</span> <span style="color: #e9e2d4;"><?php echo esc_html( $email ); ?></span><br />
										<span style="color: #9a8f7d;">TIMESTAMP   :</span> <span style="color: #e9e2d4;"><?php echo esc_html( $timestamp ); ?></span><br />
										<span style="color: #9a8f7d;">DISPATCH_ID :</span> <span style="color: #00ff9c;">PKT_<?php echo strtoupper( wp_generate_password( 8, false ) ); ?></span>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<!-- MESSAGE PAYLOAD BODY -->
					<tr>
						<td class="card-padding" style="padding: 0 30px 32px 30px;">
							<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 24px;">
								<tr>
									<td style="border-left: 3px solid #eec35e; padding: 12px 0 12px 16px; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 14px; line-height: 1.7; color: #e9e2d4;">
										<?php echo $content_html; ?>
									</td>
								</tr>
							</table>

							<!-- BULLETPROOF CALL TO ACTION BUTTON (MSO / OUTLOOK & STANDARD) -->
							<table role="presentation" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td align="left">
										<!--[if mso]>
										<v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="<?php echo esc_url( $site_url ); ?>" style="height:44px;v-text-anchor:middle;width:240px;" stroke="f" fillcolor="#eec35e">
										<w:anchorlock/>
										<center style="color:#16130b;font-family:'Courier New',Courier,monospace;font-size:13px;font-weight:bold;letter-spacing:1px;">RETURN TO TERMINAL &rarr;</center>
										</v:rect>
										<![endif]-->
										<a href="<?php echo esc_url( $site_url ); ?>" target="_blank" style="mso-hide:all; display: inline-block; background-color: #eec35e; color: #16130b; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 13px; font-weight: bold; padding: 12px 24px; text-decoration: none; text-transform: uppercase; border: 2px solid #eec35e; letter-spacing: 1px;">
											[ RETURN TO TERMINAL &rarr; ]
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<!-- TERMINAL FOOTER -->
					<tr>
						<td bgcolor="#16130b" style="background-color: #16130b; padding: 22px 30px; border-top: 2px solid #4e4637; text-align: center;">
							<p style="margin: 0 0 6px 0; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 11px; color: #9a8f7d; letter-spacing: 0.5px;">
								SYS_ID: PPP-TERMINAL // AUTOMATED_UPLINK_DISPATCH
							</p>
							<p style="margin: 0; font-family: 'JetBrains Mono', 'Courier New', Courier, monospace; font-size: 11px; color: #666053;">
								&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( $site_url ); ?>" style="color: #eec35e; text-decoration: none; font-weight: bold;"><?php echo esc_html( $site_name ); ?></a>. All rights reserved.
							</p>
						</td>
					</tr>

				</table>
				<!--[if (gte mso 9)|(IE)]>
				</td>
				</tr>
				</table>
				<![endif]-->
			</td>
		</tr>
	</table>
</body>
</html>
	<?php
	return ob_get_clean();
}

// 7. AJAX Contact Transmission Form Handler
function ppp_ajax_send_contact_packet() {
	check_ajax_referer( 'ppp_contact_nonce', 'security' );

	$username  = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : '';
	$email     = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
	$subscribe = isset( $_POST['subscribe'] ) ? ( '1' === (string) $_POST['subscribe'] || 'true' === (string) $_POST['subscribe'] ) : false;
	$token     = isset( $_POST['bot_token'] ) ? sanitize_text_field( $_POST['bot_token'] ) : '';

	if ( empty( $username ) || empty( $email ) || empty( $message ) ) {
		wp_send_json_error( array( 'message' => '[ERROR_0x01]: MISSING_REQUIRED_PAYLOAD_FIELDS' ) );
	}

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => '[ERROR_0x02]: INVALID_RETURN_ADDR_FORMAT' ) );
	}

	// Verify Bot Fight Protection
	$provider   = get_option( 'ppp_bot_provider', 'none' );
	$secret_key = get_option( 'ppp_bot_secret_key', '' );

	if ( ! ppp_verify_bot_protection( $token, $provider, $secret_key ) ) {
		wp_send_json_error( array( 'message' => '[ERROR_0x03]: BOT_PROTECTION_CHALLENGE_FAILED' ) );
	}

	// Handle Newsletter Subscription
	if ( $subscribe ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'ppp_subscribers';
		$wpdb->replace(
			$table_name,
			array(
				'name'          => $username,
				'email'         => $email,
				'subscribed_at' => current_time( 'mysql' ),
				'status'        => 'active',
			),
			array( '%s', '%s', '%s', '%s' )
		);
	}

	// Send Email to Admin / Configured Destination
	$admin_email = get_option( 'ppp_contact_destination_email', get_bloginfo( 'admin_email' ) );
	if ( empty( $admin_email ) ) {
		$admin_email = get_bloginfo( 'admin_email' );
	}
	$subject     = '[CONNECT.SH] Transmission Packet from ' . $username;
	$body        = "SECURITY ENCRYPTED TRANSMISSION PACKET\n";
	$body       .= "========================================\n\n";
	$body       .= "USERNAME_STR: " . $username . "\n";
	$body       .= "RETURN_ADDR:  " . $email . "\n";
	$body       .= "NEWSLETTER:   " . ( $subscribe ? 'OPTED_IN' : 'NO' ) . "\n";
	$body       .= "TIMESTAMP:    " . current_time( 'mysql' ) . "\n\n";
	$body       .= "DATA_PAYLOAD:\n" . $message . "\n\n";
	$body       .= "========================================\n";

	$headers = array(
		'Reply-To: ' . $username . ' <' . $email . '>',
	);

	$sent = wp_mail( $admin_email, $subject, $body, $headers );

	if ( $sent ) {
		// Send Thank-You Auto-Reply to visitor if enabled and email is active
		$autoreply_enabled = get_option( 'ppp_autoreply_enabled', false );
		if ( $autoreply_enabled && is_email( $email ) ) {
			$default_ar_sub  = sprintf( __( '[%s] Transmission Received - Thank You!', 'playpixelpro-content' ), get_bloginfo( 'name' ) );
			$reply_sub       = get_option( 'ppp_autoreply_subject', $default_ar_sub );
			if ( empty( $reply_sub ) ) {
				$reply_sub = $default_ar_sub;
			}

			$default_ar_body = "Greetings {username},\n\nThank you for connecting with {site_name}!\n\nWe have successfully received your transmission packet and will review your message shortly.\n\n---\nTransmission Summary:\nSender: {username}\nReturn Address: {email}\nStatus: RECEIVED & QUEUED\n\nBest regards,\nThe {site_name} Team";
			$reply_body      = get_option( 'ppp_autoreply_body', $default_ar_body );
			if ( empty( $reply_body ) ) {
				$reply_body = $default_ar_body;
			}

			$html_email = ppp_build_autoreply_html_email( $username, $email, $reply_body, $reply_sub );

			$from_name  = get_option( 'ppp_smtp_from_name', get_bloginfo( 'name' ) );
			$from_email = get_option( 'ppp_smtp_from_email', get_bloginfo( 'admin_email' ) );

			$reply_headers = array(
				'Content-Type: text/html; charset=UTF-8',
			);
			if ( ! empty( $from_name ) && ! empty( $from_email ) ) {
				$reply_headers[] = 'From: ' . $from_name . ' <' . $from_email . '>';
			}

			wp_mail( $email, $reply_sub, $html_email, $reply_headers );
		}

		wp_send_json_success( array( 'message' => '[SUCCESS_0x00]: TRANSMISSION_PACKET_DELIVERED_OK' ) );
	} else {
		wp_send_json_error( array( 'message' => '[ERROR_0x04]: TRANSMISSION_UPLINK_FAILED' ) );
	}
}
add_action( 'wp_ajax_ppp_send_contact_packet', 'ppp_ajax_send_contact_packet' );
add_action( 'wp_ajax_nopriv_ppp_send_contact_packet', 'ppp_ajax_send_contact_packet' );