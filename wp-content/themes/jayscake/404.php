<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Animal Pet Store
 * @subpackage jays_cake
 */

get_header(); ?>

<div class="container">
	<main id="tp_content" role="main">
		<div id="primary" class="content-area">
			<section class="error-404 not-found">
				<h1 class="page-title text-center pt-3"><?php echo esc_html(get_theme_mod('jays_cake_not_found_title',__('Oops! That page can&rsquo;t be found.','jays-cake')));?></h1>
				<div class="page-content text-center">
					<p class="py-3"><?php echo esc_html(get_theme_mod('jays_cake_not_found_text',__('It looks like nothing was found at this location. Maybe try a search?','jays-cake')));?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
	</main>
</div>

<?php get_footer();