<?php
/**
 * Single post
 * @package wptb
 */
get_header();

?>
<!--<< protfolio details >>-->
<section class="protfolio__details pb-120">
    <div class="container">
        <div class="details__bigthumb mb-60" data-aos="fade-up" data-aos-duration="1000">
            <?php if( has_post_thumbnail() ); { ?>
                <?php the_post_thumbnail( 'portfolio_lg' ); ?>
            <?php } ?>
            <div class="prot__detail__contact">
                <h3>
                Project Info
                </h3>
                <div class="prot__itembox">
                <div class="prot__left">
                    <div class="items mb__cus30">
                        <h5>
                            Clients
                        </h5>
                        <p>
                            Nicolas Marko
                        </p>
                    </div>
                    <div class="items">
                        <h5>
                            Date
                        </h5>
                        <p>
                            Sept 19, 2023
                        </p>
                    </div>
                </div>
                <div class="prot__left">
                    <div class="items mb__cus30">
                        <h5>
                            Category
                        </h5>
                        <p>
                            Branding Design
                        </p>
                    </div>
                    <div class="items">
                        <h5>
                            Location
                        </h5>
                        <p>
                            24 Fifth st.,Los Angeles, USA
                        </p>
                    </div>
                </div>
                </div>
                <ul class="social d-flex gap-3">
                <li>
                    <a href="javascript:void(0)">
                        <i class="bi bi-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="bi bi-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="bi bi-youtube"></i>
                    </a>
                </li>
                </ul>
            </div>
        </div>
        <div class="details__textwrap">
            <div class="text__box mb__cus60" data-aos="fade-up" data-aos-duration="1400">
                <?php
                    the_content();
                ?>
            </div>   
        </div>
   </div>
</section>
<!--<< protfolio details >>-->

<!--<< Related Portfolio Section >>-->
<section class="protfolidetails__section cmn__bg pt-120 pb-120">
   <div class="container">
      <div class="project__head text-center">
         <span class="common__sub" data-aos="fade-down" data-aos-duration="1000">
            Portfolio
         </span>
         <h2 class="fw-500" data-aos="fade-up" data-aos-duration="1000">
            Related Work
         </h2>
      </div>
      <div class="row g-4">
         <?php
         // Get current portfolio ID
         $current_id = get_the_ID();

         // Get portfolio categories
         $terms = get_the_terms($current_id, 'portfolio_cat');

         if ($terms && !is_wp_error($terms)) {
             $term_ids = wp_list_pluck($terms, 'term_id'); // Get category IDs
             
             // Query related portfolio items
             $args = array(
                 'post_type'      => 'portfolio',
                 'posts_per_page' => 2, // Change the number of related posts
                 'post__not_in'   => array($current_id), // Exclude current post
                 'tax_query'      => array(
                     array(
                         'taxonomy' => 'portfolio_cat',
                         'field'    => 'term_id',
                         'terms'    => $term_ids,
                     ),
                 ),
             );

             $related_query = new WP_Query($args);

             if ($related_query->have_posts()) {
                 while ($related_query->have_posts()) {
                     $related_query->the_post();
                     ?>
                     <div class="col-lg-6 col-md-6">
                        <div class="project__wrapone">
                           <div class="project__item" data-aos="fade-up" data-aos-duration="1000">
                              <a href="<?php the_permalink(); ?>" class="thumb mb-30">
                                 <?php the_post_thumbnail('portfolio_sm'); // Portfolio Image ?>
                              </a>
                              <div class="content d-flex align-items-center justify-content-between gap-2">
                                 <a href="<?php the_permalink(); ?>" class="left__cont">
                                    <span class="base mb-2 mb-xxl-3 d-block text-uppercase">
                                       <?php 
                                       $categories = get_the_terms(get_the_ID(), 'portfolio_cat');
                                       if ($categories) {
                                           echo esc_html($categories[0]->name);
                                       }
                                       ?>
                                    </span>
                                    <h3><?php the_title(); ?></h3>
                                 </a>
                                 <a href="<?php the_permalink(); ?>" class="common__icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                 }
                 wp_reset_postdata();
             } else {
                 echo '<p class="text-center">' . esc_html__('No related projects found.', 'wptb') . '</p>';
             }
         }
         ?>
      </div>
   </div>
</section>
<!--<< Related Portfolio Section >>-->

<?php 

get_footer();