<?php
class Widget_Rangers_Inner_Post_Preview extends WP_Widget {

    public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_rangers_inner_post_preview',
			'description' => __( 'Random generated post' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'inner-post-preview', __( 'Random generated post' ), $widget_ops );
		$this->alt_option_name = 'widget_rangers_inner_post';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$queried_object = get_queried_object();
		if ( $queried_object ) {
			$post_id = $queried_object->ID;
		}

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $query_args = apply_filters( 'widget_posts_args', array(
            'post_type'           => ['articles', 'news'],
			'post__not_in'		  => [$post_id],
			'posts_per_page'      => 1,
			'orderby'   		  => 'rand',
			'no_found_rows'       => true,
			'post_status'         => 'publish',
		), $instance );

		$query = new WP_Query( $query_args );

		if (!$query->have_posts()) {
			return;
		}


		?>

		<?php echo $args['before_widget']; ?>

		<?php while( $query->have_posts() ) : $query->the_post() ?>
			<!-- Display Post Here -->
			<h3><?php the_title() ?></h3>            
			<?php
				$image = get_field('articles_main_image');
				if (isset($image)):
					$image_title = $image['title'];
					$image_alt = $image['alt'];
					$image_src = $image['url'];

			?>
				<img 
					src="<?= $image_src ?>"
					title="<?= $image_title ?>"
					class="img-thumbnail border-0"
					alt="<?= $image_alt ?>"
				>
			<?php
				endif;
			?>
			<p><?php the_excerpt() ?></p>
			<p class="read">
				<a href="<?= get_the_permalink() ?>">Read More</a>
			</p>
			<div class="ara"></div>

			<?php wp_reset_postdata(); ?>
			<?php endwhile ?>

		<?php echo $args['after_widget'];
	}
}