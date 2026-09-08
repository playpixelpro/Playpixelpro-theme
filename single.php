<?php
/**
 * Single Post Template (replicating new_design/developer_portfolio_blog_post_view/code.html layout with custom stat /file and social share buttons).
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$prompt_prefix = get_theme_mod( 'playpixelpro_prompt_prefix', 'user@dev-root:~$' );
$enable_cursor = get_theme_mod( 'playpixelpro_enable_cursor', true );

$show_share_x        = playpixelpro_is_option_enabled( 'playpixelpro_share_x', true );
$show_share_facebook = playpixelpro_is_option_enabled( 'playpixelpro_share_facebook', true );
$show_share_linkedin = playpixelpro_is_option_enabled( 'playpixelpro_share_linkedin', true );
$show_share_reddit   = playpixelpro_is_option_enabled( 'playpixelpro_share_reddit', true );
$show_share_email    = playpixelpro_is_option_enabled( 'playpixelpro_share_email', true );

while ( have_posts() ) :
	the_post();

	$post_id      = get_the_ID();
	$slug         = sanitize_title( get_the_title() );
	$content      = get_the_content();
	$text_only    = wp_strip_all_tags( $content );
	$char_count   = strlen( $text_only );
	$pub_date     = get_the_date( 'Y-m-d' );
	$mod_date     = get_the_modified_date( 'Y-m-d H:i' );

	$cats = get_the_category();
	$cat_names = array();
	$cat_ids   = array();
	if ( $cats ) {
		foreach ( $cats as $c ) {
			$cat_names[] = $c->name;
			$cat_ids[]   = $c->term_id;
		}
	}
	$category_str = ! empty( $cat_names ) ? implode( ', ', $cat_names ) : __( 'Uncategorized', 'playpixelpro' );

	// Article Metrics (Word Count & Estimated Read Time)
	$word_count    = str_word_count( $text_only );
	if ( $word_count < 1 ) {
		$word_count = 100;
	}
	$read_time_min = max( 1, ceil( $word_count / 200 ) );
	$word_percent  = min( 100, max( 15, round( ( $word_count / 1000 ) * 100 ) ) );
	$read_percent  = min( 100, max( 15, round( ( $read_time_min / 10 ) * 100 ) ) );

	$current_time = date_i18n( 'Y-m-d H:i:s' );

	$tags = get_the_tags();
	$tag_names = array();
	if ( $tags ) {
		foreach ( $tags as $t ) {
			$tag_names[] = '#' . esc_html( strtolower( $t->name ) );
		}
	}
	if ( empty( $tag_names ) ) {
		if ( $cats ) {
			foreach ( $cats as $c ) {
				$tag_names[] = '#' . esc_html( strtolower( $c->name ) );
			}
		}
	}
	if ( empty( $tag_names ) ) {
		$tag_names[] = '#article';
	}
	$tag_string = implode( ', ', $tag_names );

	$blog_page_url = get_permalink( get_option( 'page_for_posts' ) );
	if ( ! $blog_page_url ) {
		$blog_page_url = home_url( '/' );
	}

	$permalink_encoded = rawurlencode( get_permalink() );
	$title_encoded     = rawurlencode( get_the_title() );
	?>

	<!-- Terminal Header Simulation -->
	<div class="single-post-cmd-header">
		<span><?php echo esc_html( $prompt_prefix ); ?></span> cat /blog/<?php echo esc_html( $slug ); ?>.md
	</div>

	<!-- Main Terminal 2-Column Grid (Article + Sidebar) -->
	<div class="single-post-grid">
		<!-- Content Canvas (Column 8) -->
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-article' ); ?>>
			<!-- Blog Header -->
			<header class="single-post-article-header">
				<h1 class="terminal-glow">
					# <?php echo esc_html( get_the_title() ); ?>
					<?php if ( $enable_cursor ) : ?>
						<span class="cli-cursor"></span>
					<?php endif; ?>
				</h1>
				<div class="single-post-meta-tags">
					<span>[DATE: <?php echo esc_html( get_the_date( 'Y-m-d' ) ); ?>]</span>
					<span>[AUTHOR: <?php echo esc_html( strtoupper( get_the_author() ) ); ?>]</span>
					<span style="color: var(--gold);">[TAGS: <?php echo esc_html( $tag_string ); ?>]</span>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="featured-image" style="margin-bottom: 24px;">
					<?php the_post_thumbnail( 'large', array( 'style' => 'border: 2px solid var(--line); width: 100%; height: auto;' ) ); ?>
				</div>
			<?php endif; ?>

			<!-- Markdown Content Area -->
			<section class="single-entry-content">
				<?php the_content(); ?>
			</section>

			<?php if ( $show_share_x || $show_share_facebook || $show_share_linkedin || $show_share_reddit || $show_share_email ) : ?>
				<!-- Social Share Buttons (matching Ultimate Social Media Icons popup window pattern) -->
				<div class="post-share-wrap" style="margin-top: 36px; padding-top: 24px; border-top: 2px dashed var(--line);">
					<div style="font-family: var(--font-mono); font-size: 0.85rem; color: var(--gold); font-weight: 700; text-transform: uppercase; margin-bottom: 12px;">
						&gt; share_article --target=[social_network]
					</div>
					<div style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
						<?php if ( $show_share_x ) : ?>
							<button type="button" class="ppp-btn ppp-share-btn" data-platform="twitter" data-url="<?php echo $permalink_encoded; ?>" data-text="<?php echo $title_encoded; ?>" style="display: inline-flex; align-items: center; gap: 6px;">
								<span class="material-symbols-outlined" style="font-size: 1rem;">share</span>
								<span>X / TWITTER</span>
							</button>
						<?php endif; ?>

						<?php if ( $show_share_facebook ) : ?>
							<button type="button" class="ppp-btn ppp-share-btn" data-platform="facebook" data-url="<?php echo $permalink_encoded; ?>" style="display: inline-flex; align-items: center; gap: 6px;">
								<span class="material-symbols-outlined" style="font-size: 1rem;">public</span>
								<span>FACEBOOK</span>
							</button>
						<?php endif; ?>

						<?php if ( $show_share_linkedin ) : ?>
							<button type="button" class="ppp-btn ppp-share-btn" data-platform="linkedin" data-url="<?php echo $permalink_encoded; ?>" style="display: inline-flex; align-items: center; gap: 6px;">
								<span class="material-symbols-outlined" style="font-size: 1rem;">work</span>
								<span>LINKEDIN</span>
							</button>
						<?php endif; ?>

						<?php if ( $show_share_reddit ) : ?>
							<button type="button" class="ppp-btn ppp-share-btn" data-platform="reddit" data-url="<?php echo $permalink_encoded; ?>" data-text="<?php echo $title_encoded; ?>" style="display: inline-flex; align-items: center; gap: 6px;">
								<span class="material-symbols-outlined" style="font-size: 1rem;">forum</span>
								<span>REDDIT</span>
							</button>
						<?php endif; ?>

						<?php if ( $show_share_email ) : ?>
							<a class="ppp-btn" href="mailto:?subject=<?php echo $title_encoded; ?>&amp;body=<?php echo $title_encoded; ?>%0A%0A<?php echo $permalink_encoded; ?>" style="display: inline-flex; align-items: center; gap: 6px;">
								<span class="material-symbols-outlined" style="font-size: 1rem;">mail</span>
								<span>EMAIL</span>
							</a>
						<?php endif; ?>

						<button type="button" class="ppp-btn" id="copy-post-link-btn" data-url="<?php echo esc_url( get_permalink() ); ?>" style="display: inline-flex; align-items: center; gap: 6px; cursor: pointer; background: transparent;">
							<span class="material-symbols-outlined" style="font-size: 1rem;">link</span>
							<span id="copy-btn-text">COPY_LINK</span>
						</button>
					</div>
				</div>
				<script>
				document.addEventListener('DOMContentLoaded', function() {
					var copyBtn = document.getElementById('copy-post-link-btn');
					if (copyBtn) {
						copyBtn.addEventListener('click', function() {
							var url = this.getAttribute('data-url');
							if (navigator.clipboard) {
								navigator.clipboard.writeText(url).then(function() {
									var textSpan = document.getElementById('copy-btn-text');
									if (textSpan) {
										var orig = textSpan.innerText;
										textSpan.innerText = '[ COPIED! ]';
										textSpan.style.color = 'var(--gold)';
										setTimeout(function() {
											textSpan.innerText = orig;
											textSpan.style.color = '';
										}, 2000);
									}
								});
							} else {
								prompt('Copy article URL:', url);
							}
						});
					}
				});
				</script>
			<?php endif; ?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links" style="margin-top: 20px; font-family: var(--font-mono);">' . esc_html__( 'Pages:', 'playpixelpro' ),
					'after'  => '</div>',
				)
			);
			?>

			<!-- Navigation Action Footer -->
			<footer class="single-post-footer">
				<a class="heavy-btn" href="<?php echo esc_url( $blog_page_url ); ?>">
					&lt;- RETURN_TO_DIRECTORY [cd ..]
				</a>
			</footer>

			<!-- Comments Area -->
			<?php comments_template(); ?>
		</article>

		<!-- Sidebar / Terminal Widgets (Column 4) -->
		<aside class="single-post-sidebar">
			<!-- Stat Widget (Customized: Characters, Published Date, Modify Date, Category) -->
			<fieldset class="brutalist-fieldset">
				<legend class="brutalist-legend">stat /file</legend>
				<div class="brutalist-fieldset-body">
					<div class="stat-row">
						<span class="stat-label">Characters:</span>
						<span class="stat-val"><?php echo esc_html( number_format( $char_count ) ); ?></span>
					</div>
					<div class="stat-row">
						<span class="stat-label">Published:</span>
						<span class="stat-val"><?php echo esc_html( $pub_date ); ?></span>
					</div>
					<div class="stat-row">
						<span class="stat-label">Modify:</span>
						<span class="stat-val"><?php echo esc_html( $mod_date ); ?></span>
					</div>
					<div class="stat-row">
						<span class="stat-label">Category:</span>
						<span class="stat-val"><?php echo esc_html( $category_str ); ?></span>
					</div>
					<div style="padding-top: 8px; margin-top: 8px; border-top: 1px solid var(--line); text-align: center; color: var(--gold); font-style: italic; font-size: 0.78rem;">
						File integrity verified.
					</div>
				</div>
			</fieldset>

			<!-- ClassicPress Dynamic Single Post Widgets Area -->
			<?php if ( is_active_sidebar( 'sidebar-single' ) ) : ?>
				<div class="dynamic-single-widgets">
					<?php dynamic_sidebar( 'sidebar-single' ); ?>
				</div>
			<?php endif; ?>

			<?php
			$show_related  = playpixelpro_is_option_enabled( 'playpixelpro_show_related_posts', true );
			$related_title = get_theme_mod( 'playpixelpro_related_posts_title', 'grep -r related /' );
			$related_count = max( 1, absint( get_theme_mod( 'playpixelpro_related_posts_count', 3 ) ) );
			$related_words = max( 5, absint( get_theme_mod( 'playpixelpro_related_excerpt_words', 12 ) ) );
			?>

			<?php if ( $show_related ) : ?>
				<!-- Related Articles Sidebar Widget -->
				<fieldset class="brutalist-fieldset related-articles-widget">
					<legend class="brutalist-legend"><?php echo esc_html( $related_title ); ?></legend>
					<div class="brutalist-fieldset-body" style="display: flex; flex-direction: column; gap: 16px;">
						<?php
						$related_args = array(
							'post_type'      => 'post',
							'post_status'    => 'publish',
							'posts_per_page' => $related_count,
							'post__not_in'   => array( $post_id ),
						);

						if ( ! empty( $cat_ids ) ) {
							$related_args['category__in'] = $cat_ids;
						}

						$related_query = new WP_Query( $related_args );

						if ( ! $related_query->have_posts() ) {
							unset( $related_args['category__in'] );
							$related_query = new WP_Query( $related_args );
						}

						if ( $related_query->have_posts() ) :
							while ( $related_query->have_posts() ) :
								$related_query->the_post();
								$rel_excerpt = get_the_excerpt();
								if ( empty( $rel_excerpt ) ) {
									$rel_excerpt = get_the_title();
								}
								$summary_text = wp_trim_words( $rel_excerpt, $related_words, '...' );
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

										<p class="related-post-summary">
											<?php echo esc_html( $summary_text ); ?>
										</p>

										<div class="related-post-action">
											<a href="<?php the_permalink(); ?>" class="button related-post-btn">READ &gt;</a>
										</div>
									</div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							?>
							<div style="color: var(--muted); font-size: 0.8rem; font-style: italic;">No related entries found.</div>
						<?php endif; ?>

						<div style="padding-top: 10px; border-top: 1px solid var(--line); font-size: 0.78rem; color: var(--muted); font-style: italic;">
							Showing <?php echo esc_html( min( $related_count, $related_query->post_count ) ); ?> matches...
						</div>
					</div>
				</fieldset>
			<?php endif; ?>

			<!-- Dynamic Article Metrics Display -->
			<div class="brutalist-card" style="padding: 16px; margin-bottom: 24px;">
				<div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
					<span class="material-symbols-outlined" style="color: var(--gold); font-size: 1.2rem;">terminal</span>
					<span style="font-family: var(--font-mono); font-weight: 700; color: var(--gold); font-size: 0.88rem; text-transform: uppercase;">ARTICLE_STATS</span>
				</div>
				<div style="font-family: var(--font-mono); font-size: 0.78rem;">
					<div style="margin-bottom: 10px;">
						<div style="display: flex; justify-content: space-between; color: var(--muted); margin-bottom: 4px; text-transform: uppercase;">
							<span>WORD_COUNT</span>
							<span><?php echo esc_html( number_format( $word_count ) ); ?> words</span>
						</div>
						<div class="progress-wrap" style="height: 6px;">
							<span style="width: <?php echo esc_attr( $word_percent ); ?>%;"></span>
						</div>
					</div>

					<div style="margin-bottom: 10px;">
						<div style="display: flex; justify-content: space-between; color: var(--muted); margin-bottom: 4px; text-transform: uppercase;">
							<span>SYS_CLOCK</span>
							<span><?php echo esc_html( $current_time ); ?></span>
						</div>
					</div>

					<div>
						<div style="display: flex; justify-content: space-between; color: var(--muted); margin-bottom: 4px; text-transform: uppercase;">
							<span>READ_TIME</span>
							<span>~<?php echo esc_html( $read_time_min ); ?> min read</span>
						</div>
						<div class="progress-wrap" style="height: 6px;">
							<span style="width: <?php echo esc_attr( $read_percent ); ?>%; background: var(--gold);"></span>
						</div>
					</div>
				</div>
			</div>
		</aside>
	</div>
	<?php
endwhile;

get_footer();