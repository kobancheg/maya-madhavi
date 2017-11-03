<?php
/**
 * @package Photoline
 */
?>

<article id="post-<?php the_ID(); ?>">

	<div class="entry-content search-list">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<h3>
			<?php
				if ( get_the_title() ) {
					the_title();
				} else {
					esc_html_e( 'No Title', 'photoline');
				} ?>
			</h3>
		</a>
		<hr />
	</div><!-- .entry-content -->

</article><!-- #post-## -->