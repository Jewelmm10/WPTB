<?php
if (!function_exists('wptb_hero_section')) {
    function wptb_hero_section($params) {
        // Default values to prevent errors
        $defaults = [
            'sub_title'        => '',
            'sub_icon'         => ['value' => ''],
            'hero_title'       => '',
            'animate_title'    => '',
            'prefix_img'       => ['url' => ''],
            'video_link'       => '',
            'suffix_text'      => '',
            'hero_img'         => ['url' => ''],
            'social_title'    => '',
            'social_arrow_img' => ['url' => ''],
            'hero_left_title' => '',
            'hero_left_arrow' => ['url' => ''],
            'hero_contact'    => '',
            'hero_contact_img' => ['url' => ''],
            'hero_social'      => [],
        ];

        // Merge defaults with provided parameters
        $params = array_merge($defaults, $params);

        // Assign values safely
        $sub_title        = $params['sub_title'];
        $sub_icon         = esc_attr($params['sub_icon']['value']);
        $hero_btn_link    = esc_url($params['hero_btn_link']['url']);
        $hero_title       = esc_html($params['hero_title']);
        $animate_title    = esc_html($params['animate_title']);        
        $prefix_img       = esc_url($params['prefix_img']['url']);
        $video_link       = esc_url($params['video_link']['url'] ?? '');
        $suffix_text      = esc_html($params['suffix_text']);
        $hero_img         = esc_url($params['hero_img']['url']);
        $social_title     = esc_html($params['social_title']);
        $social_arrow     = esc_url($params['social_arrow_img']['url']);
        $hero_left_title  = esc_html($params['hero_left_title']);
        $hero_contact     = esc_html($params['hero_contact']);
        $hero_left_arrow  = esc_url($params['hero_left_arrow']['url']);
        $hero_contact_img = esc_url($params['hero_contact_img']['url']);
        $hero_socials     = is_array($params['hero_social']) ? $params['hero_social'] : [];
        ?>

        <section class="banner__section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="banner__content">
                            <?php if (!empty($sub_title)) : ?>
                                <a href="<?php echo $hero_btn_link; ?>" class="bn__currently">
                                    <span class="d-block gap-4">
                                        <?php echo $sub_title; ?>
                                        <?php if (!empty($sub_icon)) : ?>
                                            <i class="<?php echo $sub_icon; ?>"></i>
                                        <?php endif; ?>
                                    </span>
                                </a>
                            <?php endif; ?>

                            <h1>
                                <span class="hone"><?php echo $hero_title; ?></span>
                                <span class="d-block designers" data-text="<?php echo $animate_title; ?>">
                                    <?php echo $animate_title; ?>
                                </span>
                            </h1>

                            <?php if (!empty($video_link) || !empty($prefix_img)) : ?>
                                <div class="video__area">
                                    <?php if (!empty($prefix_img)) : ?>
                                        <img width="60" src="<?php echo $prefix_img; ?>" class="vid__arrow" alt="Video Arrow">
                                    <?php endif; ?>

                                    <?php if (!empty($video_link)) : ?>
                                        <a href="<?php echo $video_link; ?>" class="video__80 video-btn">
                                            <i class="bi bi-play-fill"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($suffix_text)) : ?>
                                        <span class="proces"><?php echo $suffix_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <?php if (!empty($hero_img)) : ?>
                            <div class="banner__thumb" data-aos="fade-up-right" data-aos-duration="300">
                                <img src="<?php echo $hero_img; ?>" alt="Hero Image">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="banner__leftinfo">
                <div class="left__infomobile">
                    <a href="#0">
                        <img src="<?php echo $hero_contact_img; ?>" alt="Contact Image">
                    </a>
                    <a href="#0">
                        <?php echo $hero_contact; ?>
                    </a>
                </div>
                <div class="right__infoscroll">
                    <a href="#prot" class="scroll">
                        <?php echo $hero_left_title; ?>
                    </a>
                    <a href="#prot" class="scroll__bar">
                        <img src="<?php echo $hero_left_arrow; ?>" alt="Scroll Arrow">
                    </a>
                </div>
            </div>

            <div class="banner__rightinfo">
                <div class="right__infoscroll">
                    <a href="#0" class="scroll">
                        <?php echo $social_title; ?>
                    </a>
                    <a href="#0" class="scroll__bar">
                        <img src="<?php echo $social_arrow; ?>" alt="Social Arrow">
                    </a>
                </div>
                <div class="banner__xlsocial">
                    <?php if (!empty($hero_socials)) : ?>
                        <ul class="banner__soci d-grid justify-content-center">
                            <?php foreach ($hero_socials as $social) : ?>
                                <?php
                                $icon_class = esc_attr($social['wptb_media_icon']['value'] ?? '');
                                $social_link = esc_url($social['hero_social_link']['url'] ?? '#');
                                ?>
                                <li>
                                    <a href="<?php echo $social_link; ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="<?php echo $icon_class; ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}