<?php
if ( ! function_exists( 'wptb_tabs_section_content' ) ) {
    function wptb_tabs_section_content( $params ) {
    if ( empty( $params ) ) {
        return;
    }
    
    // Extract parameters with default values
    $section_img    = !empty( $params['section_img']['url'] ) ? esc_url( $params['section_img']['url'] ) : '';
    $tabs_title     = !empty( $params['tabs_title'] ) ? esc_html( $params['tabs_title'] ) : '';
    $tabs_desc      = !empty( $params['tabs_desc'] ) ? wp_kses_post( $params['tabs_desc'] ) : '';
    $info_box_list  = !empty( $params['info_box_list'] ) ? $params['info_box_list'] : [];
    $info_list_view = !empty( $params['info_list_view'] ) ? $params['info_list_view'] : [];
    
    ?>

    <div class="about__v1wrap">
        <div class="row g-4 align-items-lg-start align-items-center">
            <?php if ( $section_img ) : ?>
                <div class="col-lg-5">
                    <div class="about__onethumb" data-aos="zoom-in" data-aos-duration="500">
                        <img src="<?php echo $section_img; ?>" alt="section image">
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-lg-7">
                <div class="about__onecontent">
                    <?php if ( $tabs_title ) : ?>
                        <h2 class="h2-head" data-aos="fade-up" data-aos-duration="500">
                            <?php echo $tabs_title; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ( $tabs_desc ) : ?>
                        <p class="p-descrip" data-aos="fade-up" data-aos-duration="500">
                            <?php echo $tabs_desc; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( ! empty( $info_list_view ) ) : ?>
                        <div class="exprience__box mt-30">
                        <?php foreach ( $info_list_view as $info ) :
                         $info_title = !empty( $info['list_title_view'] ) ? esc_html( $info['list_title_view'] ) : '';
                         $list_sub = !empty( $info['list_sub_title'] ) ? esc_html( $info['list_sub_title'] ) : '';
                         $list_date = !empty( $info['list_date'] ) ? esc_html( $info['list_date'] ) : '';
                         ?>
                            <div class="exri__item">
                                <span class="fz-18 fw-500 base">
                                    <?php echo $list_date; ?>
                                </span>
                                <div class="expri__cont">
                                <h4 class="mb-15 text-white">
                                    <?php echo $info_title; ?>
                                </h4>
                                <p class="fz-18 pra d-block">
                                    <?php echo $list_sub; ?>
                                </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $info_box_list ) ) : ?>
                        <div class="about__contactwrap">
                            <div class="row g-4">
                                <?php foreach ( $info_box_list as $info ) : 
                                    $info_title = !empty( $info['tabs_info_box'] ) ? esc_html( $info['tabs_info_box'] ) : '';
                                    $info_content = !empty( $info['tabs_sub'] ) ? esc_html( $info['tabs_sub'] ) : '';
                                    $info_link = !empty( $info['conte_link']['url'] ) ? esc_url( $info['conte_link']['url'] ) : '#';
                                    $info_target = !empty( $info['conte_link']['is_external'] ) ? '_blank' : '_self';
                                    ?>

                                    <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6" data-aos="zoom-in">
                                        <div class="abox">
                                            <div class="about__contbox__item">
                                                <?php if ( $info_title ) : ?>
                                                    <span class="ptext fz-18 mb-20 d-block">
                                                        <?php echo $info_title; ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if ( ! empty( $info['type'] ) ) : ?>
                                                    <?php if ( $info['type'] === 'basic' ) : ?>
                                                        <a href="<?php echo $info_link; ?>" target="<?php echo esc_attr( $info_target ); ?>">
                                                            <?php echo $info_content; ?>
                                                        </a>
                                                    <?php elseif ( $info['type'] === 'icon' && !empty( $info['socials'] ) ) : ?>
                                                        <ul class="d-flex align-items-center gap-2 gap-xl-4">
                                                            <?php foreach ( $info['socials'] as $social ) : 
                                                                $social_icon = !empty( $social['tabs_social_icon']['value'] ) ? esc_attr( $social['tabs_social_icon']['value'] ) : '';
                                                                $social_link = !empty( $social['social_link']['url'] ) ? esc_url( $social['social_link']['url'] ) : '#';
                                                                $social_target = !empty( $social['social_link']['is_external'] ) ? '_blank' : '_self';
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo $social_link; ?>" target="<?php echo esc_attr( $social_target ); ?>">
                                                                        <i class="<?php echo $social_icon; ?>"></i>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php elseif ( $info['type'] === 'img' && !empty( $info['info_box_img']['url'] ) ) : ?>           
                                                        <div class="abox myskill__item">
                                                            <div class="thumb">
                                                                <img src="<?php echo esc_url( $info['info_box_img']['url'] ); ?>">
                                                            </div>
                                                            <div class="mys">
                                                                    <span class="ptext fz-18 mb-15 d-block">
                                                                    <?php echo $info_title; ?>
                                                                    </span>
                                                                    <h1 class="fw-600">
                                                                    <?php echo $info_content; ?>
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>                                               
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>

    <?php
    }
}
