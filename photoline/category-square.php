<?php
/**
 * The template for displaying Category square grid template.
 * @package Photoline
 */

get_header(); ?>

	<div id="primary" class="content-area" style="float: none; width: 100%;">
		<main id="main" class="site-main clearfix" role="main">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="box">

			<?php get_template_part( 'template-parts/layout', 'tiles' ); ?>

		</div>

	<?php endwhile; ?>

<?php else : ?>
		<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif;  // have_posts() ?>

<?php get_template_part( 'template-parts/blog-wrap', 'end' ); ?>

<?php get_footer(); ?>
