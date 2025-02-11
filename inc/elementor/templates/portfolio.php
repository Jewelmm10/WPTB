<?php
if ( ! function_exists( 'wptb_hero_section' ) ) {
    function wptb_hero_section( $params ) {
        // Default values to prevent errors
        $defaults = [
            'sub_title'     => '',
            'sub_icon'      => [ 'value' => '' ],
            'hero_title'    => '',
            'animate_title' => '',
            'prefix_img'    => [ 'url' => '' ],
            'video_link'    => '',
            'suffix_text'   => '',
            'hero_img'      => [ 'url' => '' ],
        ];

        // Merge defaults with provided parameters
        $params = array_merge( $defaults, $params );

        // Assign values safely
        $sub_title     = $params['sub_title'];
        $sub_icon      = esc_attr( $params['sub_icon']['value'] ?? '' );
        $hero_title    = esc_html( $params['hero_title'] );
        $animate_title = esc_html( $params['animate_title'] );
        $prefix_img    = esc_url( $params['prefix_img']['url'] ?? '' );
        $video_link    = $params['video_link'];
        $suffix_text   = esc_html( $params['suffix_text'] );
        $hero_img      = esc_url( $params['hero_img']['url'] ?? '' );
        ?>

        <section class="banner__section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="banner__content">
                            <?php if ( ! empty( $sub_title ) ) : ?>
                                <a href="#0" class="bn__currently">
                                    <span class="d-block gap-4"><?php echo $sub_title; ?>
                                        <?php if ( ! empty( $sub_icon ) ) : ?>
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

                            <?php if ( ! empty( $video_link ) || ! empty( $prefix_img ) ) : ?>
                                <div class="video__area">
                                    <?php if ( ! empty( $prefix_img ) ) : ?>
                                        <img src="<?php echo $prefix_img; ?>" class="vid__arrow" alt="Video Arrow">
                                    <?php endif; ?>

                                    <?php if ( ! empty( $video_link ) ) : ?>
                                        <a href="<?php echo $video_link; ?>" class="video__80 video-btn">
                                            <i class="bi bi-play-fill"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $suffix_text ) ) : ?>
                                        <span class="proces"><?php echo $suffix_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <?php if ( ! empty( $hero_img ) ) : ?>
                            <div class="banner__thumb" data-aos="fade-up-right" data-aos-duration="300">
                                <img src="<?php echo $hero_img; ?>" alt="Hero Image">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
