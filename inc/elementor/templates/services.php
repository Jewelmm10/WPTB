<?php
if ( ! function_exists( 'wptb_service_show' ) ) {
    function wptb_service_show( $args ) {
        
        ?>
        <div class="service__uniquewrap">
            <?php 
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    $i = 01;
                    while ($query->have_posts()) { $query->the_post();                       
                    ?>
                    <div class="service__unique__item pb-40 pt-40">
                        <div class="left__service">
                            <div class="serial__adjust">
                                <span><?php echo ($i <= 9) ? sprintf("%02d", $i) : $i; ?></span>
                                <div class="cont">
                                    <?php
                                        $terms = get_the_terms(get_the_ID(), 'service_cat');                                        
                                        if (!empty($terms) && !is_wp_error($terms)) {
                                            echo '<h5>' . esc_html($terms[0]->name) . '</h5>';
                                        }
                                    ?>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <p class="pra">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '.'); ?>
                            </p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="common__icon">
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>

                    <?php
                        $i++;
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>No posts found.</p>';
                }
            ?>
        </div>
        <?php
    }
}
