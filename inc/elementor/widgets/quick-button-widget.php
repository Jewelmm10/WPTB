<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

class WPTB_Quick_Button extends Widget_Base {

    public function get_name() {
        return 'wptb-quick-button';
    }

    public function get_title() {
        return esc_html__('WPTB Quick Button', 'wptb');
    }

    public function get_icon() {
        return 'eaicon-creative-button';
    }

    public function get_categories() {
        return ['wptb-elements'];
    }

    protected function register_controls() {
        // Content Controls
        $this->start_controls_section('wpbt_button_content', [
            'label' => esc_html__('Quick Button Content', 'wptb'),
        ]);

        $this->add_control('wpbt_feature_text', [
            'label'       => __('Feature Text', 'wptb'),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => ['active' => true],
            'label_block' => true,
            'default'     => 'Follow Me',
            'placeholder' => __('Enter feature text', 'wptb'),
        ]);

        $this->add_control('wpbt_feature_img', [
            'label'   => __('Feature Image', 'wptb'),
            'type'    => Controls_Manager::MEDIA,
            'default' => ['url' => Utils::get_placeholder_image_src()],
        ]);

        $this->add_control('wptb_button_link_url', [
            'label'         => esc_html__('Feature Text Link URL', 'wptb'),
            'type'          => Controls_Manager::URL,
            'label_block'   => true,
            'default'       => ['url' => '#', 'is_external' => ''],
            'show_external' => true,
        ]);

        $this->add_control('heading_type', [
            'label'       => esc_html__('Feature Type', 'wptb'),
            'type'        => Controls_Manager::SELECT,
            'default'     => 'icon',
            'options'     => ['icon' => esc_html__('Icon', 'wptb'), 'image' => esc_html__('Image', 'wptb')],
        ]);

        $this->end_controls_section();

        // Social Media Section (Repeater)
        $this->start_controls_section('wptb_feature_list', [
            'label'     => esc_html__('Social Media', 'wptb'),
            'condition' => ['heading_type' => 'icon'],
        ]);

        $repeater = new Repeater();
        $repeater->add_control('wptb_media_title', [
            'label'   => __('Social Title', 'wptb'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Facebook', 'wptb'),
        ]);

        $repeater->add_control('wptb_media_icon', [
            'label'         => esc_html__('Social Icon', 'wptb'),
            'type'          => Controls_Manager::ICONS,
            'recommended'   => ['fa-brands' => ['facebook', 'github', 'instagram', 'linkedin', 'twitter', 'whatsapp']],
        ]);

        $repeater->add_control('feature_link', [
            'label'   => esc_html__('Link', 'wptb'),
            'type'    => Controls_Manager::URL,
            'default' => ['is_external' => 'true'],
            'dynamic' => ['active' => true],
        ]);

        $this->add_control('feature_media_list', [
            'label'       => __('Social List', 'wptb'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ wptb_media_title }}}',
        ]);

        $this->end_controls_section();

        // Image Feature Section
        $this->start_controls_section('wptb_feature_list_img', [
            'label'     => esc_html__('Image', 'wptb'),
            'condition' => ['heading_type' => 'image'],
        ]);

        $this->add_control('wpbt_feature_list_img', [
            'label'   => __('Feature List Image', 'wptb'),
            'type'    => Controls_Manager::MEDIA,
            'default' => ['url' => Utils::get_placeholder_image_src()],
        ]);

        $this->add_control('wpbt_feature_list_txt', [
            'label'   => __('Feature List Text', 'wptb'),
            'type'    => Controls_Manager::TEXT,
            'default' => '(+02)-574-328-301',
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
        $type           = $settings['heading_type'];
        $feature_img    = $settings['wpbt_feature_img']['url'];
        $type           = $settings['heading_type'];
        $type           = $settings['heading_type'];

        if ($type === 'image') : ?>
            <div class="banner__leftinfo">
                <div class="left__infomobile">
                    <a href="#">
                        <img src="<?php echo esc_url($settings['wpbt_feature_list_img']['url']); ?>" alt="Feature Image">
                    </a>
                    <a href="#">
                        <?php echo esc_html($settings['wpbt_feature_list_txt']); ?>
                    </a>
                </div>
                <div class="right__infoscroll">
                    <a href="#prot" class="scroll">scroll down</a>
                    <a href="#prot" class="scroll__bar">
                        <img src="<?php echo $feature_img; ?>">
                    </a>
                </div>
            </div>
        <?php else : ?>
            <div class="banner__rightinfo">
                <div class="right__infoscroll">
                    <a href="<?php echo esc_url($settings['wptb_button_link_url']['url']); ?>" class="scroll">
                        <?php echo esc_html($settings['wpbt_feature_text']); ?>
                    </a>
                    <a href="<?php echo esc_url($settings['wptb_button_link_url']['url']); ?>" class="scroll__bar">
                        <img src="<?php echo $feature_img; ?>" alt="Scroll Down">
                    </a>
                </div>
                <div class="banner__xlsocial">
                    <ul class="banner__soci d-grid justify-content-center">
                        <?php if (!empty($settings['feature_media_list'])) :
                            foreach ($settings['feature_media_list'] as $social) :
                                $icon = $social['wptb_media_icon'];
                                $link = $social['feature_link']['url'];
                        ?>
                                <li>
                                    <a href="<?php echo esc_url($link); ?>" target="_blank">
                                        <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                    </a>
                                </li>
                        <?php endforeach;
                        endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif;
    }
}
