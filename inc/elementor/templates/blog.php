<?php
if (!function_exists('wptb_post_show')) {
   function wptb_post_show($params) {
    $posttype = 'post';
    $taxonomy = 'category';
    $category_list = '';
    if (!empty($settings['category'])) {
        $category_list = implode(", ", $settings['category']);
    }
    $category_list_value = explode(" ", $category_list);

    $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
    $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
    $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
    $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';
    $args = array(
        'cat' => $settings['category'],
        'post_type' => $posttype,
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'offset' => $offset,
    );
    $title_limit = $settings['post_title_length'];
    $query = new \WP_Query($args);
    //$temp = \rainbow_helper::wp_set_temp_query($query);
    if ($query->have_posts()) { ?>
    ?>
    
        <div class="blog__rightwrap">
            <div class="service__uniquewrap">
            <?php
                while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $ptitle = wp_trim_words(get_the_title(), $title_limit, '');
            ?>
                <div class="service__unique__item pb-40 pt-40" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left__service">
                    <div class="serial__adjust">
                        <div class="cont">
                            <span class="dates">
                                Sept 19, 2023
                            </span>
                            <h3>
                                <a href="blog.html"><?php the_title() ?></a>
                            </h3>
                        </div>
                    </div>
                    <a href="assets/img/blog/opa-blog.png" class="opa__thumb imgc">
                        <img src="assets/img/blog/opa-blog.png" alt="img-opa">
                    </a>
                    </div>
                    <a href="assets/img/blog/opa-blog.png" class="common__icon imgc">
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
