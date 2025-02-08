<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package wptb
 */

?>
<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
    <div class="scope__item">
           <h3><?php echo esc_html__('Nothing Found','wptb'); ?></h3>
           <p><?php echo esc_html__('Nothing matched your search term. Please try again with some different keywords.','wptb'); ?></p>
           
           <form action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search" class="mt-4 d-flex align-content-center justify-content-between">
                <input name="s" type="text" placeholder="Search" id="search" value="<?php the_search_query(); ?>" />
                <button type="submit">
                <i class="bi bi-search"></i>
                </button>
            </form>
            
            <a href="<?php echo home_url( '/' ); ?> " class="mt-5 fw-500 cmn--btn align-items-center gap-2">  <?php echo esc_html__('Back to home','wptb'); ?></a>
    </div>
</div>