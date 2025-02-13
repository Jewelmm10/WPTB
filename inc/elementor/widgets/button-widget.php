<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class WPTB_Button extends Widget_Base {

    public function get_name()
    {
        return 'wptb-button';
    }

    public function get_title()
    {
        return esc_html__('WPTB Button', 'wptb');
    }

    public function get_icon()
    {
        return 'eaicon-creative-button';
    }

    public function get_categories()
    {
        return ['wptb-elements'];
    }

    protected function register_controls() {

        // Content Controls
        $this->start_controls_section(
            'wpbt_button_content',
            [
                'label' => esc_html__('Button Content', 'wptb'),
            ]
        );

        $this->add_control(
            'wpbt_button_text',
            [
                'label'       => __('Button Text', 'wptb'),
                'type'        => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
                'default'     => 'Click Me!',
                'placeholder' => __('Enter button text', 'wptb'),
                'title'       => __('Enter button text here', 'wptb'),
                'ai' => [
                    'active' => false,
                ],
            ]
        );

        $this->add_control(
            'wptb_button_link_url',
            [
                'label'         => esc_html__('Link URL', 'wptb'),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'         => '#',
                    'is_external' => '',
                ],
                'show_external' => true,
            ]
        );

        $this->add_control(
            'wptb_button_icon',
            [
                'label' => esc_html__( 'Icon', 'wptb' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'arrow',
				'default' => [
					'value' => 'fas fa-long-arrow-alt-right',
					'library' => 'fa-solid',
				],
            ]
        );

        $this->end_controls_section();
  
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $params['title'] = $settings['wpbt_button_text'];
        $params['url']   = $settings['wptb_button_link_url']['url'];
        $params['icon']  = $settings['wptb_button_icon']['value'];
        

?>
    <div class="blog__hoverbox">
        <a href="<?php echo $params['url']; ?>" class="hover__circle wow fadeInUp" data-wow-duration="1.6s">
            <span class="box">
            <?php 
                if (!isset($params['icon'])) {
                    echo '<i class="bi bi-arrow-up-right"></i>';
                } else {
                    echo '<i class="'.esc_attr($params['icon']).'"></i>';
                }
            ?>
            
            <span class="textmore"> 
                <?php echo $params['title']; ?>
            </span>
            </span>
        </a>
    </div>   

<?php

    }
}
