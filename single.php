<?php
/**
 * Single post
 * @package wptb
 */
get_header();?>


<!--<< blog >>-->
<section class="blog__bsection pb-120">
   <div class="container">
      <div class="row g-4">
         <?php
            $sidebar_opt = 'right';
            $blog_type	=	'col-lg-8 col-xl-8 col-xs-12 col-md-12 col-sm-12';

            if( isset( $sidebar_opt ) && $sidebar_opt == 'no-sidebar' ) {
               $blog_type	=	'col-lg-12 col-xl-12 col-xs-12 col-md-12 col-sm-12';	
            } else {
               $blog_type	=	'col-lg-8 col-xl-8 col-xs-12 col-md-12 col-sm-12';	
            }            
            if(isset($sidebar_opt) && $sidebar_opt == 'left') {
               get_sidebar();
            }
         ?>
         <div class="<?php echo esc_attr($blog_type); ?> ">
            <div class="blog__bleft__wrapper">
               
               <?php get_template_part( 'template-parts/blog/blog','details' ); ?>
               <?php
                  wptb_pagination();
               ?>
            </div>
         </div>
         <?php
         if(isset($sidebar_opt) && $sidebar_opt == 'right') {
            get_sidebar();
         } else if(isset($sidebar_opt) && $sidebar_opt == '' && is_active_sidebar('default-sidebar' )) {
            get_sidebar();
         }
        ?>
      </div>
   </div>
</section>
<!--<< blog >>-->

<!--<< Footer >>-->
<footer class="footer__section">
   <div class="container">
      <div class="footer__top pt-120 pb-120">
         <div class="fl" data-aos="fade-up" data-aos-duration="1000">
            Get In Touch
         </div>
         <div class="row g-4">
            <div class="col-lg-6">
               <div class="get__content">
                  <p>
                     Hello, I’m David Matias, Website & User Interface 
                     Designer based in London.
                  </p>
                  <a href="#0">davidmatias333@gmail.com</a>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="get__rightcontetn">
                  <div class="row g-4">
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#0" class="social__footer">
                           Facebook
                           <i class="bi bi-arrow-right"></i>
                        </a>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#0" class="social__footer">
                           Instagram
                           <i class="bi bi-arrow-right"></i>
                        </a>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#0" class="social__footer">
                           Dribble
                           <i class="bi bi-arrow-right"></i>
                        </a>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="#0" class="social__footer">
                           Webflow
                           <i class="bi bi-arrow-right"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer__bottom cmn__bg">
      <div class="container">
         <div class="copyright">
         <?php footer_credit(); ?>
            <!-- <p class="white"> Copyright © 2023 <a href="index-2.html" class="base">Matias.</a> All rights reserved.</p> -->
            <ul class="terms">
               <li>
                  <a href="#0">
                     Terms & Condition
                  </a>
               </li>
               <li>
                  <a href="#0">
                     Privacy Policy
                  </a>
               </li>
            </ul>
            <a href="#about" class="toparrow">
               <i class="bi bi-arrow-up-short"></i>
            </a>
         </div>
      </div>
   </div>
</footer>
<!--<< Footer >>-->
</body>
</html>
<?php get_footer();