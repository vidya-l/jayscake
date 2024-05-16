<?php
/**
 * Animal Pet Store Theme Page
 *
 * @package Animal Pet Store
 */

function jays_cake_admin_scripts() {
	wp_dequeue_script('jays-cake-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'jays_cake_admin_scripts' );

if ( ! defined( 'ANIMAL_PET_STORE_FREE_THEME_URL' ) ) {
	define( 'ANIMAL_PET_STORE_FREE_THEME_URL', 'https://www.themespride.com/themes/free-pet-store-wordpress-theme/' );
}
if ( ! defined( 'ANIMAL_PET_STORE_PRO_THEME_URL' ) ) {
	define( 'ANIMAL_PET_STORE_PRO_THEME_URL', 'https://www.themespride.com/themes/pet-care-wordpress-theme/' );
}
if ( ! defined( 'ANIMAL_PET_STORE_DEMO_THEME_URL' ) ) {
	define( 'ANIMAL_PET_STORE_DEMO_THEME_URL', 'https://www.themespride.com/jays-cake/' );
}
if ( ! defined( 'ANIMAL_PET_STORE_DOCS_THEME_URL' ) ) {
    define( 'ANIMAL_PET_STORE_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/jays-cake/' );
}
if ( ! defined( 'ANIMAL_PET_STORE_RATE_THEME_URL' ) ) {
    define( 'ANIMAL_PET_STORE_RATE_THEME_URL', 'https://wordpress.org/support/theme/jays-cake/reviews/#new-post' );
}
if ( ! defined( 'ANIMAL_PET_STORE_SUPPORT_THEME_URL' ) ) {
    define( 'ANIMAL_PET_STORE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/jays-cake/' );
}
if ( ! defined( 'ANIMAL_PET_STORE_CHANGELOG_THEME_URL' ) ) {
    define( 'ANIMAL_PET_STORE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'ANIMAL_PET_STORE_THEME_BUNDLE' ) ) {
    define( 'ANIMAL_PET_STORE_THEME_BUNDLE', 'https://www.themespride.com/themes/wordpress-theme-bundle/' );
}

/**
 * Add theme page
 */
function jays_cake_menu() {
	add_theme_page( esc_html__( 'About Theme', 'jays-cake' ), esc_html__( 'About Theme', 'jays-cake' ), 'edit_theme_options', 'jays-cake-about', 'jays_cake_about_display' );
}
add_action( 'admin_menu', 'jays_cake_menu' );

/**
 * Display About page
 */
function jays_cake_about_display() {
	$jays_cake_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $jays_cake_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$jays_cake_description = explode( '. ', $jays_cake_theme->get( 'Description' ) );

					array_pop( $jays_cake_description );

					$jays_cake_description = implode( '. ', $jays_cake_description );

					echo esc_html( $jays_cake_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'jays-cake' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'jays-cake' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'jays-cake' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'jays-cake' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'jays-cake' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $jays_cake_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'jays-cake' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'jays-cake-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'jays-cake-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'jays-cake' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'jays-cake-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'jays-cake' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'jays-cake-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'jays-cake' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'jays-cake-about', 'tab' => 'get_bundle' ), 'themes.php' ) ) ); ?>" class="blink wp-bundle nav-tab<?php echo ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Get WordPress Theme Bundle', 'jays-cake' ); ?></a>
		</nav>

		<?php
			jays_cake_main_screen();

			jays_cake_changelog_screen();

			jays_cake_free_vs_pro();

			jays_cake_get_bundle();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'jays-cake' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'jays-cake' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'jays-cake' ) : esc_html_e( 'Go to Dashboard', 'jays-cake' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function jays_cake_main_screen() {
	if ( isset( $_GET['page'] ) && 'jays-cake-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'jays-cake' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'jays-cake' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'jays-cake' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'jays-cake' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'jays-cake' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'jays-cake' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'jays-cake' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'jays-cake' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'jays-cake' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function jays_cake_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'jays-cake' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'jays_cake_changelog_file', ANIMAL_PET_STORE_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = jays_cake_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function jays_cake_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function jays_cake_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'jays-cake' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'jays-cake' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'jays-cake' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'jays-cake' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'jays-cake' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a  href="<?php echo esc_url( ANIMAL_PET_STORE_PRO_THEME_URL ); ?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'jays-cake' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}

function jays_cake_get_bundle() {
	if ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'Get WordPress Theme Bundle', 'jays-cake' ); ?></p>
			<div class="col card">
				<h2 class="title"><?php esc_html_e( ' WordPress Theme Bundle of 65+ Themes At 15% Discount. ', 'jays-cake' ); ?></h2>
				<p><?php esc_html_e( 'Spring Offer Is To Get WP Bundle of 65+ Themes At 15% Discount use the coupon', 'jays-cake' ) ?>"<input type="text" value=" TPRIDE15 "  id="myInput">".</p>
				<p><a target="_blank" href="<?php echo esc_url( ANIMAL_PET_STORE_THEME_BUNDLE ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Bundle', 'jays-cake' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}
