<?php
/**
 * Front Page Template (playpixelpro.com layout).
 *
 * This template is loaded by ClassicPress on the front page URL.
 *
 * @package PlayPixelPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$prompt_prefix     = get_theme_mod( 'playpixelpro_prompt_prefix', 'user@dev-root:~$' );
$enable_cursor     = get_theme_mod( 'playpixelpro_enable_cursor', true );
$hero_window_title = get_theme_mod( 'playpixelpro_hero_window_title', 'bash — 120x40' );
$hero_line1        = get_theme_mod( 'playpixelpro_hero_line1', 'System initialized. Fetching profile...' );
$hero_line2        = get_theme_mod( 'playpixelpro_hero_line2', 'Specialization: [Android_SDK, Kotlin, WebGL, NextJS, Game_Streaming]' );
$hero_line3        = get_theme_mod( 'playpixelpro_hero_line3', 'Status: All systems operational. Ready for deployment.' );
$hero_line4        = get_theme_mod( 'playpixelpro_hero_line4', 'Environment: Production // Node_01' );
$hero_command      = get_theme_mod( 'playpixelpro_hero_command', 'deploy --android --web' );

$enable_typing     = get_theme_mod( 'playpixelpro_enable_hero_typing', true );
$current_delay     = 0;
$step_delay        = 1400;

$github_url      = get_theme_mod( 'playpixelpro_github_url', 'https://github.com/dindoquitor' );
$github_btn_text = get_theme_mod( 'playpixelpro_github_btn_text', 'VIEW_GITHUB' );

$support_url = get_theme_mod( 'playpixelpro_support_url', 'https://buymeacoffee.com/playpixelpro' );
$twitch_url  = get_theme_mod( 'playpixelpro_twitch_url', 'https://twitch.tv/playpixelpro' );
$kick_url    = get_theme_mod( 'playpixelpro_kick_url', 'https://kick.com/playpixelpro' );
$youtube_url = get_theme_mod( 'playpixelpro_youtube_url', 'https://youtube.com/@playpixelpro' );
$tiktok_url  = get_theme_mod( 'playpixelpro_tiktok_url', 'https://www.tiktok.com/@playpixelpro' );

$show_services = get_theme_mod( 'playpixelpro_show_services', true );
$show_projects = get_theme_mod( 'playpixelpro_show_projects', true );
$show_support  = get_theme_mod( 'playpixelpro_show_support', true );
$show_gaming   = get_theme_mod( 'playpixelpro_show_gaming', true );

$services_title       = get_theme_mod( 'playpixelpro_services_title', '01_Services' );
$projects_title       = get_theme_mod( 'playpixelpro_projects_title', '02_Projects' );
$support_title        = get_theme_mod( 'playpixelpro_support_title', '03_Support' );
$gaming_title         = get_theme_mod( 'playpixelpro_gaming_title', '04_Gaming & Streams' );
$latest_entries_title = get_theme_mod( 'playpixelpro_latest_entries_title', 'latest_entries' );

$services_count = absint( get_theme_mod( 'playpixelpro_services_count', 0 ) );
$projects_count = absint( get_theme_mod( 'playpixelpro_projects_count', 0 ) );
$streams_count  = absint( get_theme_mod( 'playpixelpro_streams_count', 0 ) );

$services_limit = ( 0 === $services_count ) ? -1 : $services_count;
$projects_limit = ( 0 === $projects_count ) ? -1 : $projects_count;
$streams_limit  = ( 0 === $streams_count ) ? -1 : $streams_count;

$entries_count = absint( get_theme_mod( 'playpixelpro_latest_entries_count', 6 ) );
if ( $entries_count < 3 || $entries_count > 9 ) {
	$entries_count = 6;
}
?>

<!-- Terminal Hero Section (5 Lines Configurable via Customizer) -->
<section class="hero">
	<div class="terminal-window">
		<div class="window-bar">
			<div class="window-dots">
				<span class="window-dot dot-red"></span>
				<span class="window-dot dot-yellow"></span>
				<span class="window-dot dot-green"></span>
			</div>
			<span class="window-title"><?php echo esc_html( $hero_window_title ); ?></span>
		</div>
		<div class="terminal-body" id="hero-terminal-screen">
			<?php if ( ! empty( $hero_line1 ) ) : ?>
				<p class="hero-term-line<?php echo $enable_typing ? ' typing-line' : ''; ?>"<?php echo $enable_typing ? ' data-delay="' . esc_attr( $current_delay ) . '"' : ''; ?> style="margin-bottom: 8px;">
					<span class="line-numbers">01</span>
					<span style="color: var(--gold);">info</span>
					<span class="typing-text" data-text="<?php echo esc_attr( $hero_line1 ); ?>"><?php echo esc_html( $hero_line1 ); ?></span>
				</p>
				<?php $current_delay += $step_delay; ?>
			<?php endif; ?>

			<?php if ( ! empty( $hero_line2 ) ) : ?>
				<p class="hero-term-line<?php echo $enable_typing ? ' typing-line' : ''; ?>"<?php echo $enable_typing ? ' data-delay="' . esc_attr( $current_delay ) . '"' : ''; ?> style="margin-bottom: 8px;">
					<span class="line-numbers">02</span>
					<span style="color: var(--gold);">info</span>
					<span class="typing-text" data-text="<?php echo esc_attr( $hero_line2 ); ?>"><?php echo esc_html( $hero_line2 ); ?></span>
				</p>
				<?php $current_delay += $step_delay; ?>
			<?php endif; ?>

			<?php if ( ! empty( $hero_line3 ) ) : ?>
				<p class="hero-term-line<?php echo $enable_typing ? ' typing-line' : ''; ?>"<?php echo $enable_typing ? ' data-delay="' . esc_attr( $current_delay ) . '"' : ''; ?> style="margin-bottom: 8px;">
					<span class="line-numbers">03</span>
					<span style="color: var(--gold);">info</span>
					<span class="typing-text" data-text="<?php echo esc_attr( $hero_line3 ); ?>"><?php echo esc_html( $hero_line3 ); ?></span>
				</p>
				<?php $current_delay += $step_delay; ?>
			<?php endif; ?>

			<?php if ( ! empty( $hero_line4 ) ) : ?>
				<p class="hero-term-line<?php echo $enable_typing ? ' typing-line' : ''; ?>"<?php echo $enable_typing ? ' data-delay="' . esc_attr( $current_delay ) . '"' : ''; ?> style="margin-bottom: 16px;">
					<span class="line-numbers">04</span>
					<span style="color: var(--gold);">info</span>
					<span class="typing-text" data-text="<?php echo esc_attr( $hero_line4 ); ?>"><?php echo esc_html( $hero_line4 ); ?></span>
				</p>
				<?php $current_delay += $step_delay; ?>
			<?php endif; ?>

			<p class="hero-term-line<?php echo $enable_typing ? ' typing-line' : ''; ?>"<?php echo $enable_typing ? ' data-delay="' . esc_attr( $current_delay ) . '" data-cursor="true"' : ''; ?> style="font-size: 1.3rem; font-weight: 700; margin-top: 24px; margin-bottom: 0;">
				<span class="line-numbers">05</span>
				<span><?php echo esc_html( $prompt_prefix ); ?> </span>
				<span class="typing-text" style="color: var(--gold);" data-text="<?php echo esc_attr( $hero_command ); ?>"><?php echo esc_html( $hero_command ); ?></span>
				<?php if ( $enable_cursor ) : ?>
					<span class="cli-cursor"></span>
				<?php endif; ?>
			</p>
		</div>
	</div>

	<?php if ( $github_url ) : ?>
		<div style="text-align: center; margin-top: 20px;">
			<a class="heavy-btn" href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener">
				<?php echo esc_html( $github_btn_text ); ?>
			</a>
		</div>
	<?php endif; ?>
</section>

<?php if ( $show_services ) : ?>
	<!-- 01_Services Section (Dynamic CPT + Configurable Title & Card Limit) -->
	<section id="services">
		<div class="section-header-wrap">
			<h2><?php echo esc_html( $services_title ); ?></h2>
			<div class="section-line"></div>
		</div>

		<div class="grid">
			<?php
			$services_query = new WP_Query(
				array(
					'post_type'      => 'services',
					'posts_per_page' => $services_limit,
					'post_status'    => 'publish',
				)
			);

			if ( $services_query->have_posts() ) :
				while ( $services_query->have_posts() ) :
					$services_query->the_post();
					$icon     = get_post_meta( get_the_ID(), '_ppp_service_icon', true );
					$commands = get_post_meta( get_the_ID(), '_ppp_service_commands', true );
					if ( empty( $icon ) ) {
						$icon = 'terminal';
					}

					$raw_desc  = get_the_content();
					if ( empty( $raw_desc ) ) {
						$raw_desc = get_the_excerpt();
					}
					$serv_desc = playpixelpro_truncate( $raw_desc, 15 );
					?>
					<div class="brutalist-card">
						<span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--gold); float: right;"><?php echo esc_html( $icon ); ?></span>
						<h3><?php the_title(); ?></h3>
						<p class="meta" style="margin-bottom: 16px;">
							<?php echo wp_kses_post( $serv_desc ); ?>
						</p>
						<?php
						if ( ! empty( $commands ) ) {
							$cmd_lines = explode( "\n", str_replace( "\r", '', $commands ) );
							foreach ( $cmd_lines as $line ) {
								$trimmed = trim( $line );
								if ( ! empty( $trimmed ) ) {
									echo '<code class="tech-command">' . esc_html( $trimmed ) . '</code>';
								}
							}
						}
						?>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Fallback to default 3 services if no custom services post created
				?>
				<div class="brutalist-card">
					<span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--gold); float: right;">android</span>
					<h3>Android Engineering</h3>
					<p class="meta" style="margin-bottom: 16px;">Building high-performance, native mobile applications with Kotlin, Jetpack Compose, and clean architecture patterns.</p>
					<code class="tech-command">&gt; kotlin_coroutines.invoked()</code>
					<code class="tech-command">&gt; jetpack_compose.build()</code>
					<code class="tech-command">&gt; material_3.implement()</code>
				</div>

				<div class="brutalist-card">
					<span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--gold); float: right;">code</span>
					<h3>Web Development</h3>
					<p class="meta" style="margin-bottom: 16px;">Developing scalable full-stack applications with modern frameworks, brutalist aesthetics, and optimized delivery pipelines.</p>
					<code class="tech-command">&gt; react_next.mount()</code>
					<code class="tech-command">&gt; tailwind_css.compile()</code>
					<code class="tech-command">&gt; typescript.strict_mode()</code>
				</div>

				<div class="brutalist-card">
					<span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--gold); float: right;">sports_esports</span>
					<h3>Game Content & Streaming</h3>
					<p class="meta" style="margin-bottom: 16px;">Multi-platform gaming streamer covering AAA titles, racing games, hardware reviews, and performance-focused gameplay.</p>
					<code class="tech-command">&gt; obs_studio.stream()</code>
					<code class="tech-command">&gt; multi_platform.broadcast()</code>
					<code class="tech-command">&gt; 4k_gameplay.record()</code>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php if ( $show_projects ) : ?>
	<!-- 02_Projects Section (Dynamic CPT + Configurable Title & Card Limit) -->
	<section id="projects">
		<div class="section-header-wrap">
			<h2><?php echo esc_html( $projects_title ); ?></h2>
			<div class="section-line"></div>
		</div>

		<div class="grid">
			<?php
			$projects_query = new WP_Query(
				array(
					'post_type'      => 'projects',
					'posts_per_page' => $projects_limit,
					'post_status'    => 'publish',
				)
			);

			if ( $projects_query->have_posts() ) :
				while ( $projects_query->have_posts() ) :
					$projects_query->the_post();
					$tech = get_post_meta( get_the_ID(), '_ppp_project_tech', true );
					$url  = get_post_meta( get_the_ID(), '_ppp_project_url', true );
					$btn  = get_post_meta( get_the_ID(), '_ppp_project_btn_text', true );

					if ( empty( $tech ) ) {
						$tech = 'Kotlin';
					}
					if ( empty( $btn ) ) {
						$btn = 'VIEW_PROJECT >';
					}
					if ( empty( $url ) ) {
						$url = get_permalink();
					}

					$raw_pdesc  = get_the_excerpt();
					if ( empty( $raw_pdesc ) ) {
						$raw_pdesc = get_the_content();
					}
					$proj_desc = playpixelpro_truncate( $raw_pdesc, 15 );
					?>
					<div class="brutalist-card">
						<span class="meta-badge"><?php echo esc_html( $tech ); ?></span>
						<h3><?php the_title(); ?></h3>
						<p class="meta" style="margin-bottom: 20px;">
							<?php echo wp_kses_post( $proj_desc ); ?>
						</p>
						<a class="button" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
							<?php echo esc_html( $btn ); ?>
						</a>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Fallback to default 3 projects if no custom project posts exist
				$proj1_name = get_theme_mod( 'playpixelpro_proj1_name', 'audic' );
				$proj1_tech = get_theme_mod( 'playpixelpro_proj1_tech', 'Kotlin' );
				$proj1_desc = get_theme_mod( 'playpixelpro_proj1_desc', 'Music streaming with live lyrics, Spotify playlists & offline mode.' );
				$proj1_url  = get_theme_mod( 'playpixelpro_proj1_url', 'https://github.com/dindoquitor/audic' );

				$proj2_name = get_theme_mod( 'playpixelpro_proj2_name', 'Vivara' );
				$proj2_tech = get_theme_mod( 'playpixelpro_proj2_tech', 'Kotlin' );
				$proj2_desc = get_theme_mod( 'playpixelpro_proj2_desc', 'TV browser built for 8K HDR panels with cinematic depth.' );
				$proj2_url  = get_theme_mod( 'playpixelpro_proj2_url', 'https://github.com/dindoquitor/Vivara' );

				$proj3_name = get_theme_mod( 'playpixelpro_proj3_name', 'SmartesTube' );
				$proj3_tech = get_theme_mod( 'playpixelpro_proj3_tech', 'Java' );
				$proj3_desc = get_theme_mod( 'playpixelpro_proj3_desc', 'Android phone/tablet companion for SmartTube.' );
				$proj3_url  = get_theme_mod( 'playpixelpro_proj3_url', 'https://github.com/dindoquitor/SmartesTube' );
				?>
				<div class="brutalist-card">
					<span class="meta-badge"><?php echo esc_html( $proj1_tech ); ?></span>
					<h3><?php echo esc_html( $proj1_name ); ?></h3>
					<p class="meta" style="margin-bottom: 20px;"><?php echo wp_kses_post( playpixelpro_truncate( $proj1_desc, 15 ) ); ?></p>
					<a class="button" href="<?php echo esc_url( $proj1_url ); ?>" target="_blank" rel="noopener">PROJECT_01 &gt;</a>
				</div>

				<div class="brutalist-card">
					<span class="meta-badge"><?php echo esc_html( $proj2_tech ); ?></span>
					<h3><?php echo esc_html( $proj2_name ); ?></h3>
					<p class="meta" style="margin-bottom: 20px;"><?php echo wp_kses_post( playpixelpro_truncate( $proj2_desc, 15 ) ); ?></p>
					<a class="button" href="<?php echo esc_url( $proj2_url ); ?>" target="_blank" rel="noopener">PROJECT_02 &gt;</a>
				</div>

				<div class="brutalist-card">
					<span class="meta-badge"><?php echo esc_html( $proj3_tech ); ?></span>
					<h3><?php echo esc_html( $proj3_name ); ?></h3>
					<p class="meta" style="margin-bottom: 20px;"><?php echo wp_kses_post( playpixelpro_truncate( $proj3_desc, 15 ) ); ?></p>
					<a class="button" href="<?php echo esc_url( $proj3_url ); ?>" target="_blank" rel="noopener">PROJECT_03 &gt;</a>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php if ( $show_support ) : ?>
	<!-- 03_Support Section (Dynamic Profiles CPT + Fallback) -->
	<section id="support">
		<div class="section-header-wrap">
			<h2><?php echo esc_html( $support_title ); ?></h2>
			<div class="section-line"></div>
		</div>

		<div class="brutalist-card" style="margin-bottom: 32px;">
			<p style="margin-top: 0; font-size: 1.05rem;">
				Support the channel and get exclusive access to content, early releases, and more.
			</p>
			<div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 20px; align-items: center;">
				<?php
				$profiles_query = new WP_Query(
					array(
						'post_type'      => 'profiles',
						'posts_per_page' => -1,
						'post_status'    => 'publish',
					)
				);

				if ( $profiles_query->have_posts() ) :
					while ( $profiles_query->have_posts() ) :
						$profiles_query->the_post();
						$url   = get_post_meta( get_the_ID(), '_ppp_profile_url', true );
						$heavy = ( '1' === get_post_meta( get_the_ID(), '_ppp_profile_heavy', true ) );
						$icon  = get_post_meta( get_the_ID(), '_ppp_profile_icon', true );

						if ( empty( $url ) ) {
							$url = '#';
						}
						if ( empty( $icon ) ) {
							$icon = 'link';
						}

						$btn_class = $heavy ? 'heavy-btn' : 'button';
						?>
						<a class="<?php echo esc_attr( $btn_class ); ?>" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 6px;">
							<span class="material-symbols-outlined" style="font-size: 1.1rem;"><?php echo esc_html( $icon ); ?></span>
							<span><?php the_title(); ?></span>
						</a>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					// Fallback default social & support profile buttons
					?>
					<?php if ( $support_url ) : ?>
						<a class="heavy-btn" href="<?php echo esc_url( $support_url ); ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 6px;">
							<span class="material-symbols-outlined" style="font-size: 1.1rem;">favorite</span>
							<span>SUPPORT_ME</span>
						</a>
					<?php endif; ?>

					<a class="button" href="<?php echo esc_url( home_url( '/connect/' ) ); ?>" style="display: inline-flex; align-items: center; gap: 6px;">
						<span class="material-symbols-outlined" style="font-size: 1.1rem;">mail</span>
						<span>CONTACT</span>
					</a>

					<?php if ( $github_url ) : ?>
						<a class="button" href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 6px;">
							<span class="material-symbols-outlined" style="font-size: 1.1rem;">code</span>
							<span>github</span>
						</a>
					<?php endif; ?>

					<a class="button" href="https://facebook.com/playpixelpro" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 6px;">
						<span class="material-symbols-outlined" style="font-size: 1.1rem;">share</span>
						<span>facebook</span>
					</a>

					<a class="button" href="https://steamcommunity.com/id/kivernis" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 6px;">
						<span class="material-symbols-outlined" style="font-size: 1.1rem;">sports_esports</span>
						<span>steam</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( $show_gaming ) : ?>
	<!-- 04_Gaming & Live Streams Section (Dynamic CPT + Configurable Title & Card Limit) -->
	<section id="gaming">
		<div class="section-header-wrap">
			<h2><?php echo esc_html( $gaming_title ); ?></h2>
			<div class="section-line"></div>
		</div>

		<div class="grid" style="margin-bottom: 40px;">
			<?php
			$streams_query = new WP_Query(
				array(
					'post_type'      => 'streams',
					'posts_per_page' => $streams_limit,
					'post_status'    => 'publish',
				)
			);

			if ( $streams_query->have_posts() ) :
				while ( $streams_query->have_posts() ) :
					$streams_query->the_post();
					$url     = get_post_meta( get_the_ID(), '_ppp_stream_url', true );
					$is_live = ( '1' === get_post_meta( get_the_ID(), '_ppp_stream_is_live', true ) );
					if ( empty( $url ) ) {
						$url = '#';
					}
					$card_class = $is_live ? 'stream-card is-live' : 'stream-card';
					?>
					<a class="<?php echo esc_attr( $card_class ); ?>" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
						<div>
							<h4 class="stream-card-title">
								<?php the_title(); ?>
								<?php if ( $is_live ) : ?>
									<span class="live-badge"><span class="live-dot"></span> LIVE NOW</span>
								<?php endif; ?>
							</h4>
							<p class="stream-card-desc"><?php echo esc_html( get_the_excerpt() ); ?></p>
						</div>
						<span class="material-symbols-outlined" style="color: <?php echo $is_live ? '#ff3377' : 'var(--gold)'; ?>;">open_in_new</span>
					</a>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Fallback to default Customizer stream links if no custom stream posts exist
				?>
				<?php if ( $twitch_url ) : ?>
					<a class="stream-card" href="<?php echo esc_url( $twitch_url ); ?>" target="_blank" rel="noopener">
						<div>
							<h4 class="stream-card-title">Twitch</h4>
							<p class="stream-card-desc">Watch live gameplay and streams</p>
						</div>
						<span class="material-symbols-outlined" style="color: var(--gold);">open_in_new</span>
					</a>
				<?php endif; ?>

				<?php if ( $kick_url ) : ?>
					<a class="stream-card" href="<?php echo esc_url( $kick_url ); ?>" target="_blank" rel="noopener">
						<div>
							<h4 class="stream-card-title">Kick</h4>
							<p class="stream-card-desc">Catch the stream on Kick</p>
						</div>
						<span class="material-symbols-outlined" style="color: var(--gold);">open_in_new</span>
					</a>
				<?php endif; ?>

				<?php if ( $youtube_url ) : ?>
					<a class="stream-card" href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" rel="noopener">
						<div>
							<h4 class="stream-card-title">YouTube</h4>
							<p class="stream-card-desc">Subscribe for highlights and reviews</p>
						</div>
						<span class="material-symbols-outlined" style="color: var(--gold);">open_in_new</span>
					</a>
				<?php endif; ?>

				<?php if ( $tiktok_url ) : ?>
					<a class="stream-card" href="<?php echo esc_url( $tiktok_url ); ?>" target="_blank" rel="noopener">
						<div>
							<h4 class="stream-card-title">TikTok</h4>
							<p class="stream-card-desc">Short clips and gaming moments</p>
						</div>
						<span class="material-symbols-outlined" style="color: var(--gold);">open_in_new</span>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php
// Render Dynamic Custom Sections (Builder)
for ( $sec_idx = 1; $sec_idx <= 3; $sec_idx++ ) {
	$show_custom = get_theme_mod( "playpixelpro_show_custom_sec{$sec_idx}", false );
	if ( $show_custom ) {
		$sec_title   = get_theme_mod( "playpixelpro_custom_sec{$sec_idx}_title", sprintf( '0%d_CustomSection', $sec_idx + 4 ) );
		$sec_content = get_theme_mod( "playpixelpro_custom_sec{$sec_idx}_content", '' );
		?>
		<section id="custom-sec-<?php echo esc_attr( $sec_idx ); ?>" style="margin-bottom: 40px;">
			<div class="section-header-wrap">
				<h2><?php echo esc_html( $sec_title ); ?></h2>
				<div class="section-line"></div>
			</div>
			<div class="brutalist-card">
				<?php echo do_shortcode( wp_kses_post( $sec_content ) ); ?>
			</div>
		</section>
		<?php
	}
}
?>

<!-- Latest Articles Terminal Grid (Configurable Title & Card Count) -->
<div class="section-header-wrap">
	<h2><?php echo esc_html( $latest_entries_title ); ?></h2>
	<div class="section-line"></div>
</div>

<?php
$latest_posts_query = new WP_Query(
	array(
		'posts_per_page' => $entries_count,
		'post_type'      => 'post',
	)
);

if ( $latest_posts_query->have_posts() ) :
	?>
	<div class="grid">
		<?php
		while ( $latest_posts_query->have_posts() ) :
			$latest_posts_query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'card brutalist-card' ); ?>>
				<div>
					<p class="meta">
						<span class="line-numbers">cat</span>
						[<?php echo esc_html( get_the_date( 'Y-m-d' ) ); ?>]
					</p>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="blog-entry-thumbnail" style="margin-bottom: 16px;">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium', array( 'class' => 'blog-thumbnail-img', 'alt' => get_the_title() ) ); ?>
							</a>
						</div>
					<?php endif; ?>

					<h2 style="font-size: 1.2rem; margin: 0 0 10px;">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<p class="meta" style="margin-bottom: 16px;"><?php echo wp_kses_post( playpixelpro_truncate( get_the_excerpt(), 15 ) ); ?></p>
				</div>
				<div style="margin-top: auto; padding-top: 16px; text-align: right;">
					<a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'cat_entry.md', 'playpixelpro' ); ?> &gt;</a>
				</div>
			</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php else : ?>
	<p><?php esc_html_e( 'No posts found.', 'playpixelpro' ); ?></p>
<?php endif; ?>

<?php
get_footer();
