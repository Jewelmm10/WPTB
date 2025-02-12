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
    $content_view   = !empty( $params['content_view'] ) ? $params['content_view'] : 'tabs-list';
    ?>

    <div class="about__v1wrap">
        <div class="row g-4 align-items-lg-start align-items-center">
            <div class="col-lg-5">
                <?php if ( $section_img ) : ?>
                    
                    <div class="about__onethumb">
                        <img src="<?php echo $section_img; ?>" alt="section image">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7">
                <div class="about__onecontent">
                    <?php if ( $tabs_title ) : ?>
                        <h2 class="h2-head">
                            <?php echo $tabs_title; ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ( $tabs_desc ) : ?>
                        <p class="p-descrip">
                            <?php echo $tabs_desc; ?>
                        </p>
                    <?php endif; ?>
                    <?php if($content_view == 'tabs-basic') : ?>
                    <!-- about or skill -->
                    <div class="about__contactwrap">
                        <div class="row g-4">
                            
                            <?php
                                if (!empty($info_box_list)) {
                                    foreach ($info_box_list as $info) {
                                        $type = isset($info['item_type']) ? $info['item_type'] : 'basic';
                            ?>

                                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6" data-aos="zoom-in">
                                    <?php if ($type == 'basic') : ?>
                                        <div class="abox">
                                            <div class="about__contbox__item">
                                                <span class="ptext fz-18 mb-20 d-block"><?php echo $info['tabs_info_box'] ?></span>
                                                <a href="#0"><?php echo $info['tabs_sub'] ?></a>
                                            </div>
                                        </div>
                                    <?php elseif ($type == 'icon') : ?>
                                        <div class="abox">
                                            <div class="about__contbox__item">
                                                <span class="ptext fz-18 mb-20 d-block"><span class="ptext fz-18 mb-20 d-block"><?php echo $info['tabs_info_box'] ?></span>
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
                                            </div>
                                        </div>
                                    <?php elseif ($type == 'img') : ?>                                       
                                        <div class="abox myskill__item">
                                            <div class="thumb">
                                                <img src="<?php echo esc_url( $info['info_box_img']['url'] ); ?>" alt="img">
                                            </div>
                                            <div class="mys">
                                                <span class="ptext fz-18 mb-15 d-block"><?php echo $info['tabs_info_box'] ?></span>
                                                <h1 class="fw-600"><?php echo $info['tabs_sub'] ?></h1>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php
                                }
                            }
                        ?>
                        </div> <!-- row -->
                    </div>

                    <?php endif; ?>
                    <?php if($content_view == 'tabs-list') : ?>
                        <!-- experien or education -->
                        <div class="exprience__box mt-30">
                            <div class="exri__item">
                                <span class="fz-18 fw-500 base">
                                2011-2013
                                </span>
                                <div class="expri__cont">
                                <h4 class="mb-15 text-white">
                                    Programming Course
                                </h4>
                                <p class="fz-18 pra d-block">
                                    New York University
                                </p>
                                </div>
                            </div>
                            <div class="exri__item">
                                <span class="fz-18 fw-500 base">
                                2013-2016
                                </span>
                                <div class="expri__cont">
                                <h4 class="mb-15 text-white">
                                    University of Design
                                </h4>
                                <p class="fz-18 pra d-block">
                                    Kingston, United States
                                </p>
                                </div>
                            </div>
                            <div class="exri__item">
                                <span class="fz-18 fw-500 base">
                                2016-2018
                                </span>
                                <div class="expri__cont">
                                <h4 class="mb-15 text-white">
                                    Web Design Course
                                </h4>
                                <p class="fz-18 pra d-block">
                                    New York University
                                </p>
                                </div>
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
