<?php
if (have_posts()) 
{ while ( have_posts() ) { the_post();
	$post_id = get_the_ID();
?>
   <div class="blog__bitem" data-aos="fade-up" data-aos-duration="1000">
      
      <?php if( has_post_thumbnail() ); { ?>
         <a href="<?php the_permalink(); ?>" class="thumb">
            <?php the_post_thumbnail( 'post_thumb' ); ?>
         </a>
      <?php } ?>
      <div class="content__two">
         <div class="text__box mb-30" data-aos="fade-up" data-aos-duration="1400">
            <span class="text__de">
               By: <?php the_author(); ?>  /  
                  Posted on <?php echo get_the_date( 'F j, Y', get_the_ID() ); ?>  /  Comments: <?php echo get_comments_number(); ?>
            </span>
            <?php the_content(); ?>
         </div>
         
      </div>
      <div class="post__in cmn__bg mb__cus60">
         <div class="post__left">
            <span class="fz-20 fw-500 white">
               Posted in :
            </span>
            <?php
               $cats = get_the_category();
               if ($cats) {
                  $count = 0;
                  foreach ($cats as $cat) {
                     echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
                     $count++;
                     if ($count >= 3) break;
                  }
               }
            ?>
         </div>
         <div class="post__right">
            <?php echo do_shortcode('[social_media type="share"]'); ?>            
         </div>
      </div>
      <?php 
         if ( comments_open() || get_comments_number() ) {
            comments_template();
         } 
      ?>
   </div>
         
<?php
} 
   } else {
      get_template_part( 'template-parts/blog/content', 'none' );
   }
