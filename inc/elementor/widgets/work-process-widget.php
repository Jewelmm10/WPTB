<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class WPTB_Working_Widget extends Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_working_process';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Work Process', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-favorite';
    }

    // Widget Categories
    public function get_categories() {
        return ['wptb-elements'];
    }

    // Register Widget Controls
    protected function _register_controls() {
        $this->start_controls_section(
            'section-title',
            [
                'label' => esc_html__( 'WPTB Working Process', 'wptb' ),
            ]
        );

        $this->add_control(
            'wprocess_title',
            [
                'label'     => __('Title', 'wptb'),
                'type'      => Controls_Manager::TEXT,
                'default'   => __('Concept', 'wptb'),
            ]
        );
        $this->add_control(
            'wprocess_details',
            [
                'label'     => __('Details', 'wptb'),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __('Nemo enim ipsam voluptatem voluptas', 'wptb'),
            ]
        );

        // Repeater for Process List
        $repeater = new Repeater();
        $repeater->add_control(
            'process_list_title',
            [
                'label'     => __('Process List Title', 'wptb'),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __('Reviewing any existing branding', 'wptb'),
            ]
        );
        $this->add_control(
            'wprocess_lists',
            [
                'label'         => __('Work Process List', 'wptb'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'title_field'   => '{{{ process_list_title }}}',
            ]
        );
        
        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {
        $settings = $this->get_settings_for_display();      

        ?>
        <div class="process">
            <div class="process__item">
                <h2 class="white mb-24">
                    <?php echo esc_html($settings['wprocess_title']); ?>
                </h2>
                <p class="mb-30 pra fz-18">
                    <?php echo esc_html($settings['wprocess_details']); ?>
                </p>
                <?php if (!empty($settings['wprocess_lists'])) : ?>
                    <ul>
                        <?php foreach ($settings['wprocess_lists'] as $item) : 
                        ?>
                        <li>
                            <?php echo esc_html($item['process_list_title']); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
?>
