<?php
/**
 * The template for displaying Category mosaic grid template.
 * @package Photoline
 */

get_header(); ?>

	<div id="primary" class="content-area" style="float: none; width: 100%;">
		<main id="main" class="site-main" role="main">

<?php $num = 0; ?>
<?php if ( have_posts() ) : ?>

		<div id="mosaicTiles">

			<?php while ( have_posts() ) : the_post(); ?>

			<?php  if ( $num == 6 ){ $num = 1; } else { $num++; } ?>

			<?php  if ( $num == 2 ){ $class = 'vertical'; } ?>
			<?php  if ( $num == 3 || $num == 4 ){ $class = 'rectangle'; } ?>
			<?php  if ( $num == 1 || $num == 5 ){ $class = 'big-square'; } ?>
			<?php  if ( $num == 6 ){ $class = 'big-rectangle'; } ?>

			<div class="box <?php echo $class; ?>">
				<?php get_template_part( 'template-parts/layout', 'tiles' ); ?>
			</div>

			<?php endwhile; ?>

		</div>

<?php else : ?>
		<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif;  // have_posts() ?>

<?php get_template_part( 'template-parts/blog-wrap', 'end' ); ?>

<?php get_footer(); ?>
