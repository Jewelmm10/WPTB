<?php
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPTB_Tabs_Library extends Widget_Base {
    
    public function get_name() {
        return 'tabs-library';
    }
    
    public function get_title() {
        return __( 'WPTB Tabs Library', 'wptb' );
    }
    
    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return [ 'wptb-elements' ];
    }
    public function get_post_template() {
        $posts = get_posts([
            'post_type'      => 'elementor_library',
            'orderby'        => 'title',
            'order'          => 'ASC',
            'posts_per_page' => -1,
        ]);
        $templates = [];
        foreach ($posts as $post) {
            $templates[]    = [
                'id'    => $post->ID,
                'name'  => $post->post_title,
            ];
        }

        return $templates;
    }

    public function get_saved_data() {
        $save_widgets = $this->get_post_template();
        $options[-1]  = __( 'Select', 'wptb' );
        if ( count( $save_widgets ) ) {
            foreach( $save_widgets as $save_row ) {
                $options[ $save_row['id'] ] = $save_row['name'];
            }
        } else {
            $options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'wptb' );
        }
        return $options;
    }
    
    protected function _register_controls() {

        $keyword = array();
        
        /**
         * Skill section content settings
         */
        $this->start_controls_section(
            'library_tab_content',
            [
                'label' => __('Tabs Library Items', 'wptb'),
            ]
        );        
        $repeater = new Repeater();

        $repeater->add_control(
            'tab_nav',
            [
                'label'     => esc_html__('Nav Title', 'wptb'),
                'type'      => Controls_Manager::TEXT,
                'default'   => esc_html__('Static', 'wptb'),
            ]
        );
        $repeater->add_control(
            'recommended_on',
            [
                'label'     => esc_html__('Active', 'wptb'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('On', 'wptb'),
                'label_off' => esc_html__('Off', 'wptb'),
                'default'   => 'no',

            ]
        );
        $repeater->add_control(
            'library_tab_library',
            [
                'label'     => __('Elementor Library', 'wptb'),
                'type'      => Controls_Manager::SELECT2,
                'default'   => '-1',
                'options'   => $this->get_saved_data(),
            ]
        );

        $this->add_control(
            'library_tab_items',
            [
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'show_label'    => false,
                'default'       => [
                    [
                        'tab_nav' => esc_html__('Standard Feature', 'wptb'),

                    ],

                ],

                'title_field' => '{{{ tab_nav }}}',
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {

        $settings = $this->get_settings_for_display();
        ?>
        <section class="about__section pb-120" id="about">
            <div class="container">
                <div class="singletab">
                    <ul class="tablinks">
                        <?php 
                            $i = "";
                            foreach ( $settings['library_tab_items'] as $library_tab_item ) :
                                $tab_nav  = $library_tab_item['tab_nav'];
                                $i++;
                                $isActive = $i == 1 ? 'active' : null;
                                $has_active = $library_tab_item['recommended_on'] == 'yes' ? 'active'  : ' ';
                        ?>
                        <li class="nav-links <?php echo esc_attr( $has_active ); ?>">
                            <button class="tablink"><?php echo wp_kses_post($tab_nav); ?></button>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tabcontents">
                        <?php 
                            foreach ( $settings['library_tab_items'] as $library_tab_item ) :
                            
                                $library_elementor_library = $library_tab_item['library_tab_library'];
                                $tabpanel = $library_tab_item['recommended_on'] == 'yes' ? 'active show'  : ' ';
                        ?>
                        <div class="tabitem <?php echo esc_attr($tabpanel); ?>">           
                            <?php echo $content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($library_elementor_library); ?>
                            
                        </div>
                        <?php endforeach; ?>               
                    </div>
                </div>
            </div>
        </section>
        <?php  
        
    }


    

   
}