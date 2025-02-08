<?php
/**
 * Define custom fields for widgets
 * 
 * @package wptb
 */

function show_widget_form( $instance = '', $widget_field = '', $widget_form_value = '' ) {
    
    extract( $widget_field );

    switch ( $widget_form_type ) {

        /**
         * Text field
         */
        case 'text' :
        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>"><?php echo esc_html( $widget_form_title ); ?></label></span>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $widget_id ) ); ?>" type="text" value="<?php echo esc_html( $widget_form_value ); ?>" />

                
            </p>
        <?php
            break;


        /**
         * Number field
         */
        case 'number' :
            if ( empty( $widget_form_value ) ) {
                $widget_form_value = $widget_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>"><?php echo esc_html( $widget_form_title ); ?></label>
                <input name="<?php echo esc_attr( $instance->get_field_name( $widget_id ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>" value="<?php echo esc_html( $widget_form_value ); ?>" class="small-text" />

                
            </p>
        <?php
            break;

        
        /**
         * Checkbox field
         */
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $widget_id ) ); ?>" type="checkbox" value="1" <?php checked( '1', $widget_form_value ); ?>/>
                <label for="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>"><?php echo esc_html( $widget_form_title ); ?></label>

               
            </p>
            <?php
            break;

        /**
         * Select field
         */
        case 'select' :
            // if ( empty( $widget_form_value ) ) {
            //     $widget_form_value = $widget_default;
            // }

        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>"><?php echo esc_html( $widget_form_title ); ?></label></span> 
                <select name="<?php echo esc_attr( $instance->get_field_name( $widget_id ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $widget_id ) ); ?>" class="widefat">
                    <?php foreach ( $widget_form_options as $key => $cat_name ) { ?>
                        <option value="<?php echo esc_attr( $key ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $key ) ); ?>" <?php selected( $key, $widget_form_value ); ?>><?php echo esc_html( $cat_name ); ?></option>
                    <?php } ?>
                </select>

                
            </p>
        <?php
            break;

        /**
         * Selector field
         */
        case 'selector':
            if ( empty( $widget_form_value ) ) {
                $widget_form_value = $widget_default;
            }
        ?>
            <p><span class="field-label"><label class="field-title"><?php echo esc_html( $widget_form_title ); ?></label></span></p>
        <?php            
            echo '<div class="selector-labels">';
            foreach ( $widget_form_options as $option => $val ) {
                $class = ( $widget_form_value == $option ) ? 'selector-selected': '';
                echo '<label class="'. esc_attr( $class ).'" data-val="'.esc_attr( $option ).'">';
                echo '<img src="'.esc_url( $val ).'"/>';
                echo '</label>'; 
            }
            echo '</div>';
            echo '<input data-default="'.esc_attr( $widget_form_value ).'" type="hidden" value="'.esc_attr( $widget_form_value ).'" name="'.esc_attr( $instance->get_field_name( $widget_id ) ).'"/>';
            break;
        /**
         * Multiple checkboxes field
         */
        case 'multicheckboxes':
        ?>
            <p><span class="field-label"><label><?php echo esc_html( $widget_form_title ); ?></label></span></p>
            <div class="mt-checkbox">
        <?php    
            foreach ( $widget_form_options as $key => $cat_name ) {
                if ( isset( $widget_form_value[$key] ) ) {
                    $multi_select = 1;
                } else {
                    $multi_select = 0;
                }
                
            ?>
                
                    <p>
                        <input id="<?php echo esc_attr( $instance->get_field_name( $widget_id ).'['.$key.']' ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $widget_id ).'['.$key.']' ); ?>" type="checkbox" value="1" <?php checked( '1', $multi_select ); ?>/>
                        <label for="<?php echo esc_attr( $instance->get_field_name( $widget_id ).'['.$key.']' ); ?>"><?php echo esc_html( $cat_name ); ?></label>
                    </p>
               
            <?php
                }
               echo '</div>';
            
            break;

    
    }
}

