<?php 

function wptb_pagination() {
    global $wp_query;

    $pages = paginate_links(array(
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => '<i class="bi bi-chevron-left"></i>',
        'next_text' => '<i class="bi bi-chevron-right"></i>',
        'type'      => 'array'
    ));

    if ($pages) {
        echo '<div class="pagination__box cmn__bg"><ul class="pagi">';
        foreach ($pages as $page) {
            echo '<li>' . $page . '</li>';
        }
        echo '</ul></div>';
    }
}
