<?php
/**
 * Widget API: WP_Widget_Categories class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Categories widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Custom_Categories extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'category_widget',
			'description'                 => __( 'Custom design category.' ),
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'cateogris', __( 'Drug:Product by Cat' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Categories widget instance.
	 *
	 * @since 2.8.0
	 * @since 4.2.0 Creates a unique HTML ID for the `<select>` element
	 *              if more than one instance is displayed on the page.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Categories widget instance.
	 */
	public function widget( $args, $instance ) {
		static $first_dropdown = true;

		$default_title = __( 'Categories' );
		$title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;

		$count        = ! empty( $instance['count'] ) ? '1' : '0';		

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => $count,
		);

			?>

			<ul class="widget-list wd-bg">
				<?php
				$cat_args['title_li'] = '';

				/**
				 * Filters the arguments for the Categories widget.
				 *
				 * @since 2.8.0
				 * @since 4.9.0 Added the `$instance` parameter.
				 *
				 * @param array $cat_args An array of Categories widget options.
				 * @param array $instance Array of settings for the current widget.
				 */
				wp_list_categories( apply_filters( 'widget_categories_args', $cat_args, $instance ) );
				?>
			</ul>

	<?php	
		

		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Categories widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['count']        = ! empty( $new_instance['count'] ) ? 1 : 0;

		return $instance;
	}

	/**
	 * Outputs the settings form for the Categories widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		// Defaults.
		$instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$count        = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts' ); ?></label>
		

		</p>
		<?php
	}

}
