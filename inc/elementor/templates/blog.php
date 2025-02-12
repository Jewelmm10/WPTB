<?php
if (!function_exists('wptb_post_show')) {
   function wptb_post_show($params) {
    $posttype = 'post';
    $taxonomy = 'category';
    $category_list = '';
    if (!empty($params['category'])) {
        $category_list = implode(", ", $params['category']);
    }
    $category_list_value = explode(" ", $category_list);

    $posts_per_page = (!empty($params['posts_per_page'])) ? $params['posts_per_page'] : '-1';
    $orderby = (!empty($params['orderby'])) ? $params['orderby'] : 'post_date';
    $order = (!empty($params['order'])) ? $params['order'] : 'desc';
    $offset = (!empty($params['offset'])) ? $params['offset'] : '0';
    $args = array(
        'post_type' => $posttype,
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'offset' => $offset,
    );
    //$title_limit = $params['post_title_length'];
    $query = new \WP_Query($args);
    //$temp = \rainbow_helper::wp_set_temp_query($query);
    if ($query->have_posts()) { ?>
   
    
        <div class="blog__rightwrap">
            <div class="service__uniquewrap">
            <?php
                while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                //$ptitle = wp_trim_words(get_the_title(), $title_limit, '');
            ?>
                <div class="service__unique__item pb-40 pt-40">
                    <div class="left__service">
                    <div class="serial__adjust">
                        <div class="cont">
                            <span class="dates">
                            <?php echo get_the_date( 'F j, Y', get_the_ID() ); ?>
                            </span>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                            </h3>
                        </div>
                    </div>
                    <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'home_blog'); ?>
                    <a href="<?php echo esc_url($thumbnail_url); ?>" class="opa__thumb imgc">
                        <?php the_post_thumbnail('home_blog'); ?>
                    </a>
                    </div>
                    <a href="<?php echo esc_url($thumbnail_url); ?>" class="common__icon imgc">
                    <i class="bi bi-eye"></i>
                    </a>
                </div>
                
            <?php } ?>   
            </div>
        </div>
<?php
     
}
}
}
