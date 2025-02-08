<?php 
/**
* ------------------------------------------------------------------------------------------------
* Share and follow buttons shortcode
* ------------------------------------------------------------------------------------------------
*/
function social_media_shortcode($atts) {
    $options = get_option('wptb_options');
    
    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'type' => 'share', // Default to share
        ),
        $atts,
        'social_media'
    );

    $output = '<div class="social-media-section">';
    
    // Social Sharing Section
    if ( $atts['type'] == 'share' && ! empty( $options['social_share'] ) ) {
        $output .= '<ul class="social-cus d-flex align-items-center">';
        $output .= '<span class="fz-20 fw-500 white">Share :</span>';
        
        $url = urlencode( get_permalink() );
        $title = urlencode( get_the_title() );

        foreach ( $options['social_share'] as $key => $value ) {
            if ( ! empty( $value ) ) {
                switch ( $key ) {
                    case 'facebook':
                        $output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank"><i class="bi bi-facebook"></i></a></li>';
                        break;
                    case 'twitter':
                        $output .= '<li><a href="https://twitter.com/intent/tweet?text=' . $title . '&url=' . $url . '" target="_blank"><i class="bi bi-twitter"></i></a></li>';
                        break;
                    case 'linkedin':
                        $output .= '<li><a href="https://www.linkedin.com/sharing/share-offsite/?url=' . $url . '" target="_blank"><i class="bi bi-linkedin"></i></a></li>';
                        break;
                    case 'whatsapp':
                        $output .= '<li><a href="https://api.whatsapp.com/send?text=' . $title . '%20' . $url . '" target="_blank"><i class="bi bi-whatsapp"></i></a></li>';
                        break;
                }
            }
        }
        $output .= '</ul>'; // Close social-sharing
    }

    // Social Follow Section
    if ( $atts['type'] == 'follow' && ! empty( $options['social_follow'] ) ) {
        $output .= '<div class="social-follow">';
        $output .= '<h4>Follow us:</h4>';
        
        foreach ( $options['social_follow'] as $key => $value ) {
            if ( ! empty( $value ) ) {
                $output .= '<a href="' . esc_url( $value ) . '" target="_blank">' . ucfirst( $key ) . '</a> ';
            }
        }
        
        $output .= '</div>'; // Close social-follow
    }

    $output .= '</div>'; // Close social-media-section

    return $output;
}

add_shortcode('social_media', 'social_media_shortcode');
