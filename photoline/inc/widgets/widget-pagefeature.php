<?php
/**
 * Featured Page Widget
 * @package Photoline
 */
add_action('widgets_init', create_function('', 'register_widget("photoline_featured_page");'));

class photoline_featured_page extends WP_Widget {
    function __construct() {
	parent::__construct(
		'photoline_featured_page',
		__( 'Photoline Featured Page', 'photoline' ),
		array(
		'classname' => 'photoline_featured_page',
		'description' => __( 'Photoline theme widget to display a featured page', 'photoline' )
		)
	);
    }

    function widget( $args, $instance ) {
        extract($args);
        $title = ( ! $instance['title'] ? false : apply_filters( 'widget_title', $instance['title'] ) );
		$page_id = ( empty( $instance['page_id'] ) ? '0' : $instance['page_id'] );

        echo $before_widget;
        echo '<div class="featured-page">';
        if ( $title )
            echo $before_title . $title . $after_title;

		$featured_post_args = array(
			'post_type' => 'page',
			'page_id' => $page_id
		);
		$featured_post = new WP_Query( $featured_post_args );

?>

<?php if ( $featured_post->have_posts() ) : while ( $featured_post->have_posts() ) : $featured_post->the_post(); ?>

	
	<?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'photoline-aside' ); ?></a><?php } ?>
		

	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<?php if ( has_excerpt() ) : ?>
	<?php the_excerpt(); ?>
		<?php endif; ?>	
<?php
	endwhile;
	endif;
		wp_reset_postdata();
?>

<?php
        echo '</div>';
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = '' != $new_instance['title'] ? strip_tags( $new_instance['title'] ) : false;
		$instance['page_id'] = strip_tags( $new_instance['page_id'] );

        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => __( 'Featured Page', 'photoline' ), 'page_id' => '' ) );
        $title = strip_tags( $instance['title'] );
        $page_id = strip_tags( $instance['page_id'] );
?>

<p>This widget will show the title, thumbnail and the announcement of any page on which you want to attract the visitor's attention.</p>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'photoline' ); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>

			<p>
				<label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e( 'Page:', 'photoline' ); ?></label>

				<?php
				wp_dropdown_pages( array( 
					'depth'            => 0,
					'child_of'         => 0,
					'selected'         => $page_id,
					'echo'             => 1,
					'name'             => $this->get_field_name('page_id'),
					'id'               => $this->get_field_id('page_id')
				) );
				?>
			</p>

<?php
    }
} 