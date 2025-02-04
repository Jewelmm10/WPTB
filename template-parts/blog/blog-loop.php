<?php 
if ( have_posts() )
{

while ( have_posts() ) : the_post() ;
?>
<div class="blog__bitem mb__cus50" data-aos="fade-up" data-aos-duration="1000">
    <a href="<?php the_permalink(); ?>" class="thumb">
        <?php the_post_thumbnail(); ?>
    </a>
    <div class="content">
        <span class="bdate d-flex align-items-center gap-1 ptext fz-16">
        <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<span class="text-uppercase text-white">' . esc_html($categories[0]->name) . '</span>';
            }
        ?>
        .  <?php echo get_the_date( 'F j, Y', get_the_ID() ); ?>
        </span>
    <h3>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <p class="fz-16 ptext"><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
        <a href="<?php the_permalink(); ?>" class="d-flex justify-content-center fw-500 cmn--btn align-items-center gap-2">
        <span class="get__text">
            Read More
        </span>
        <span>
            <i class="bi bi-arrow-right"></i>             
        </span>
        </a>
    </div>
</div>
<?php endwhile; 
} else {
    get_template_part( 'template-parts/blog/content', 'none' );
}