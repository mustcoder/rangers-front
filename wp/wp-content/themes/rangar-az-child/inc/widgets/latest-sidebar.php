<?php
class Widget_Rangers_Latest_Sidebar extends WP_Widget {

    public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_rangers_latest_sidebar',
			'description' => __( 'Our site&#8217;s most recent news' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'sidebar-latest-news', __( 'Latest News Widget' ), $widget_ops );
		$this->alt_option_name = 'widget_reangers_latest_news';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Latest News' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( !empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$post_type = isset( $instance['our_post_type'] ) ? $instance['our_post_type'] : 'news';

        $args = apply_filters( 'widget_posts_args', array(
            'post_type'           => $post_type,
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
		), $instance );

		$r = new WP_Query( $args );

		if (!$r->have_posts()) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>

		<?php
		if ( $title ) {
			echo "<h3>". $title . "</h3>";
		}
		?>
		<?php echo '<ul>' ?>
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$post_title = get_the_title( $recent_post->ID );
				$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
				?>
				<li><span>
					<a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo $title ; ?></a>
				</span></li>
			<?php endforeach; ?>
		</ul>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$post_type = isset($instance['our_post_type']) ? esc_attr($instance['our_post_type']) : 'post';
?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="4" /></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'our_post_type' ); ?>">
                <?php _e( 'Post Type:' ); echo " " . $post_type; ?>
            </label>
            <?php $post_types = get_post_types(); ?>
            <select id="<?php echo $this->get_field_id( 'our_post_type' ); ?>"
                name="<?php echo $this->get_field_name( 'our_post_type' ); ?>">
                <option>Please Select</option>
                <?php foreach($post_types as $post): ?>
                    <option 
                        value="<?= $post ?>"
                    >
                        <?= $post ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
		
<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['our_post_type'] = sanitize_text_field($new_instance['our_post_type']);
		return $instance;
	}
}