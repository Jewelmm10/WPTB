<?php 

class WP_Cat extends WP_widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'show_cat',
            'description' => __( 'A list of categories..', 'wptb' )
        );
        parent::__construct( 'show_cat', __( 'WP:Post from category', 'wptb' ), $widget_ops );
    }

    public function widget( $args, $instance) { 
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $title          = empty( $instance['title'] ) ? '' : $instance['title'];
        ?>

        <?php
            echo $before_widget; 
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];      
        ?>

        <ul class="category">
            <?php 
                $cats = get_the_category();
                if ($cats) {
                    foreach ($cats as $cat) {
           
                echo '<li><a href="' . esc_url(get_category_link($cat->term_id)) . '" class="d-flex align-items-center justify-content-between">
                    <span class="fz-18 ptext">
                        '. esc_html($cat->name) .'
                    </span>
                    <span class="arrow">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                </a>
                </li>';
            } 
        }
            ?>
        </ul>
     
           
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