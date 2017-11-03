<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Photoline
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'photoline' ); ?></h1>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'photoline' ); ?></p>
                                                                                <?php the_widget( 'WP_Widget_Search' ); ?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>