<?php
/**
 * PlayPixelPro functions and definitions.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Require ClassicPress Customizer settings.
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Theme Setup.
 */
function playpixelpro_setup() {
	load_theme_textdomain( 'playpixelpro', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'playpixelpro' ),
		)
	);
}
add_action( 'after_setup_theme', 'playpixelpro_setup' );

/**
 * Enqueue Scripts and Styles.
 */
function playpixelpro_assets() {
	// Enqueue JetBrains Mono & Material Symbols
	wp_enqueue_style(
		'playpixelpro-font',
		'https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
		array(),
		null
	);

	// Enqueue Main Theme Stylesheet (with automatic cache busting based on file modification time)
	$style_ver = file_exists( get_template_directory() . '/style.css' ) ? filemtime( get_template_directory() . '/style.css' ) : '2.0.0';
	wp_enqueue_style(
		'playpixelpro',
		get_stylesheet_uri(),
		array(),
		$style_ver
	);

	// Enqueue Site JS
	$js_ver = file_exists( get_template_directory() . '/assets/js/site.js' ) ? filemtime( get_template_directory() . '/assets/js/site.js' ) : '1.4.1';
	wp_enqueue_script(
		'playpixelpro',
		get_template_directory_uri() . '/assets/js/site.js',
		array(),
		$js_ver,
		true
	);

	wp_localize_script(
		'playpixelpro',
		'pppData',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular( 'downloads' ) ) {
		wp_localize_script(
			'playpixelpro',
			'pppDownload',
			array(
				'isSingle' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'playpixelpro_assets' );

/**
 * Register Sidebars and Widget Areas.
 */
function playpixelpro_widgets_init() {
	// 1. Blog Listing Sidebar
	register_sidebar(
		array(
			'name'          => __( 'Blog Listing Sidebar', 'playpixelpro' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in the sidebar of the main blog listing directory.', 'playpixelpro' ),
			'before_widget' => '<fieldset id="%1$s" class="brutalist-card widget %2$s" style="padding: 16px; margin-bottom: 24px;">',
			'after_widget'  => '</fieldset>',
			'before_title'  => '<legend class="widget-title" style="padding: 0 8px; font-weight: 700; color: var(--gold); text-transform: uppercase; font-size: 0.88rem; font-family: var(--font-mono);">',
			'after_title'   => '</legend>',
		)
	);

	// 2. Single Post Sidebar
	register_sidebar(
		array(
			'name'          => __( 'Single Post Sidebar', 'playpixelpro' ),
			'id'            => 'sidebar-single',
			'description'   => __( 'Add widgets here to appear in the sidebar of single blog post pages.', 'playpixelpro' ),
			'before_widget' => '<fieldset id="%1$s" class="brutalist-fieldset widget %2$s" style="margin-bottom: 24px;">',
			'after_widget'  => '</fieldset>',
			'before_title'  => '<legend class="brutalist-legend widget-title">',
			'after_title'   => '</legend>',
		)
	);

	// 3. Footer Widgets
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'playpixelpro' ),
			'id'            => 'footer-widgets',
			'description'   => __( 'Add widgets here to appear in the theme footer.', 'playpixelpro' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s" style="margin-bottom: 16px;">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 style="color: var(--gold); font-size: 0.9rem; margin-bottom: 8px;">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'playpixelpro_widgets_init' );

/**
 * Custom Terminal Recent Posts Widget (matching Related Articles card design).
 */
class PlayPixelPro_Widget_Recent_Posts extends WP_Widget_Recent_Posts {

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'playpixelpro' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$r = new WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if ( ! $r->have_posts() ) {
			return;
		}

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}
		?>
		<div class="recent-posts-card-list" style="display: flex; flex-direction: column; gap: 16px; margin-top: 12px;">
			<?php
			while ( $r->have_posts() ) :
				$r->the_post();
				$excerpt_raw = get_the_excerpt();
				if ( empty( $excerpt_raw ) ) {
					$excerpt_raw = get_the_title();
				}
				$summary_text = wp_trim_words( $excerpt_raw, 12, '...' );
				?>
				<article class="related-post-card">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="related-thumb-wrap">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium', array( 'class' => 'related-post-img', 'alt' => get_the_title() ) ); ?>
							</a>
						</div>
					<?php endif; ?>

					<div class="related-post-content">
						<h4 class="related-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>

						<?php if ( $show_date ) : ?>
							<div class="related-post-date" style="font-size: 0.75rem; color: var(--muted); margin-bottom: 6px;">
								[<?php echo esc_html( get_the_date( 'Y-m-d' ) ); ?>]
							</div>
						<?php endif; ?>

						<p class="related-post-summary">
							<?php echo esc_html( $summary_text ); ?>
						</p>

						<div class="related-post-action">
							<a href="<?php the_permalink(); ?>" class="button related-post-btn">READ &gt;</a>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<?php
		echo $args['after_widget'];
		wp_reset_postdata();
	}
}

function playpixelpro_register_custom_recent_posts() {
	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'PlayPixelPro_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'playpixelpro_register_custom_recent_posts', 15 );

/**
 * Register Navigation Menus.
 */
function playpixelpro_fallback_menu() {
	echo '<ul class="nav-menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/blog/' ) ) . '">Blog</a></li>';
	if ( get_post_type_archive_link( 'downloads' ) ) {
		echo '<li><a href="' . esc_url( get_post_type_archive_link( 'downloads' ) ) . '">Downloads</a></li>';
	}
	echo '</ul>';
}

/**
 * Helper function to safely strip tags and truncate text to a set word length.
 * Appends a blinking CLI cursor after the ellipsis when enabled.
 *
 * @param string $text Raw text.
 * @param int    $words Max word count.
 * @param string $more Append string.
 * @return string Truncated text with optional CLI cursor.
 */
function playpixelpro_truncate( $text, $words = 15, $more = '...' ) {
	$clean   = wp_strip_all_tags( $text );
	$trimmed = wp_trim_words( $clean, $words, $more );

	$enable_cursor = get_theme_mod( 'playpixelpro_enable_cursor', true );
	if ( $enable_cursor && ( substr( $trimmed, -3 ) === '...' ) ) {
		$trimmed .= '<span class="cli-cursor"></span>';
	}

	return $trimmed;
}

/**
 * Check if a theme mod feature is enabled (defaults to true if not explicitly disabled).
 *
 * @param string $mod_name Setting name.
 * @param bool   $default  Default status.
 * @return bool Enabled status.
 */
function playpixelpro_is_option_enabled( $mod_name, $default = true ) {
	$val = get_theme_mod( $mod_name, null );
	if ( null === $val ) {
		return (bool) $default;
	}
	if ( false === $val || 0 === $val || '0' === (string) $val || 'false' === (string) $val || 'off' === (string) $val ) {
		return false;
	}
	return true;
}

/**
 * Add Open Graph & Twitter Card Meta Tags to <head> for Social Sharing.
 */
function playpixelpro_add_social_meta_tags() {
	if ( is_singular() ) {
		global $post;
		$title     = esc_attr( get_the_title( $post->ID ) );
		$url       = esc_url( get_permalink( $post->ID ) );
		$site_name = esc_attr( get_bloginfo( 'name' ) );
		$excerpt   = esc_attr( wp_strip_all_tags( get_the_excerpt( $post->ID ) ) );
		if ( empty( $excerpt ) ) {
			$excerpt = $title;
		}

		$image_url = '';
		if ( has_post_thumbnail( $post->ID ) ) {
			$thumb_id  = get_post_thumbnail_id( $post->ID );
			$thumb_src = wp_get_attachment_image_src( $thumb_id, 'large' );
			if ( ! empty( $thumb_src[0] ) ) {
				$image_url = esc_url( $thumb_src[0] );
			}
		}

		echo "\n<!-- PlayPixelPro Open Graph & Twitter Card Meta Tags -->\n";
		echo '<meta property="og:type" content="article" />' . "\n";
		echo '<meta property="og:title" content="' . $title . '" />' . "\n";
		echo '<meta property="og:description" content="' . $excerpt . '" />' . "\n";
		echo '<meta property="og:url" content="' . $url . '" />' . "\n";
		echo '<meta property="og:site_name" content="' . $site_name . '" />' . "\n";
		if ( ! empty( $image_url ) ) {
			echo '<meta property="og:image" content="' . $image_url . '" />' . "\n";
		}
		echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
		echo '<meta name="twitter:title" content="' . $title . '" />' . "\n";
		echo '<meta name="twitter:description" content="' . $excerpt . '" />' . "\n";
		if ( ! empty( $image_url ) ) {
			echo '<meta name="twitter:image" content="' . $image_url . '" />' . "\n";
		}
	}
}
add_action( 'wp_head', 'playpixelpro_add_social_meta_tags', 5 );