<?php 

class Recent_Post extends WP_widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname'     => 'wp_recent_post',
            'description'   => __( 'wptb custom style recent post', 'wptb' )
        );
        parent::__construct( 'wp_recent_post', __( 'WP:Recent Post', 'wptb' ), $widget_ops );
    }

    public function widget( $args, $instance) { 
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $title          = empty( $instance['title'] ) ? '' : $instance['title'];
        $date           = empty( $instance['date'] ) ? '0' : $instance['date'];
        $post_count     = empty( $instance['post_limit'] ) ? '5' : $instance['post_limit'];

        ?>

        <?php
            echo $before_widget; 
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
            $args = [
                'post_type'       => 'post',
                'posts_per_page'  => $post_count,
                
            ];
            $query = new WP_Query($args);          
        ?>
         <div class="scope__item mb__cus60">                 
            <ul class="recent__post">
               <?php while( $query->have_posts() ) : $query->the_post(); ?>
               <li>
                  <a href="<?php the_permalink(); ?>" class="recent__innter">
                     <?php
                        if( has_post_thumbnail() ) {
                           the_post_thumbnail( 'recent_thumb' );
                        }  
                     ?>
                     <div class="cont__box">
                        <span class="retitle"><?php the_title(); ?></span>
                        <span class="base fz-16 d-flex align-items-center gap-2">
                           <i class="bi bi-clock"></i>
                           <?php echo get_the_date( 'F j, Y', get_the_ID() ); ?>
                        </span>
                     </div>
                  </a>
               </li>
               <?php 
                  endwhile; 
                  wp_reset_postdata();
               ?>
            </ul>
         </div>           
        <?php
        echo $after_widget;
    }


    private function widget_fields() {

        $fields = array(
            'widget_title'  => array(
                'widget_id'         => 'title',
                'widget_form_title' => __( 'Title', 'wptb' ),
                'widget_form_type'  => 'text'
            ),
            'limit_post'    => array(
                'widget_id'          => 'post_limit',
                'widget_form_title' => __( 'Number of posts to show:', 'wptb' ),
                'widget_form_type'  => 'number',
                'widget_default'    => 4,
            ),
            'date_show'    => array(
                'widget_id'          => 'date_show',
                'widget_form_title' => __( 'Display post date?', 'wptb' ),
                'widget_form_type'  => 'checkbox',
                'widget_default'    => 4,
            ),

        );
        
        return $fields;
    }


    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $widget_form_value = !empty( $instance[$widget_id] ) ?  $instance[$widget_id]  : '';
            show_widget_form( $this, $widget_field, $widget_form_value );

        }
    }  

}