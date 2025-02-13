<?php
if ( ! function_exists( 'wptb_portfolio_show' ) ) {
    function wptb_portfolio_show( $args ) {
        
        $query = new WP_Query($args);
        ?>
        <div class="project__wrapone">
            <div class="row g-4">
                <?php
                if ($query->have_posts()) {            
                    while ($query->have_posts()) { $query->the_post();
                        $count = 0;                       
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <?php 
                        // Alternate image size                       
                        $image_size = ($count % 2 == 0) ? 'portfolio_lg' : 'portfolio_sm';
                        $count++;
                        ?>
                        <div class="project__item cus__mb60 aos-init">
                            <a href="<?php the_post_thumbnail_url(); ?>" class="thumb mb-30 imgc">
                                <?php the_post_thumbnail($image_size, ['alt' => get_the_title()]); ?>
                            </a>
                            <div class="content d-flex align-items-center justify-content-between gap-2">
                                <a href="<?php the_permalink(); ?>" class="left__cont">
                                <?php
                                    $terms = get_the_terms(get_the_ID(), 'portfolio_cat');                                        
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        echo '<span class="base mb-2 mb-xxl-3 d-block text-uppercase">' . esc_html($terms[0]->name) . '</span>';
                                    }
                                ?>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <a href="<?php the_post_thumbnail_url(); ?>" class="common__icon imgc">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>No posts found.</p>';
                }
        ?>
            </div>
        </div>
    <?php
 
    }
}
