<?php
/**
 * Main Template File
 * @package Jagoron
 */
get_header();?>


<!--<< blog >>-->
<section class="blog__bsection pb-120">
   <div class="container">
      <div class="row g-4">
      <?php
         $sidebar_opt = 'no-sidebar';
            $blog_type	=	'col-lg-8 col-xl-8 col-xs-12 col-md-12 col-sm-12';
            if( isset( $sidebar_opt ) && $sidebar_opt == 'no-sidebar' )
            {
                  $blog_type	=	'col-lg-12 col-xl-12 col-xs-12 col-md-12 col-sm-12';	
            }
            else
            {
                  $blog_type	=	'col-lg-8 col-xl-8 col-xs-12 col-md-12 col-sm-12';	
            }
            
            if(isset($sidebar_opt) && $sidebar_opt == 'left')
            {
                  get_sidebar();
            }
            if ( !is_active_sidebar( 'exertia-blog-widget' ) ) {
               $blog_type	=	'col-lg-12 col-xl-12 col-xs-12 col-md-12 col-sm-12';	
            }
        ?>
         <div class="<?php echo esc_attr($blog_type); ?> ">
            <div class="blog__bleft__wrapper">
               
               <?php get_template_part( 'template-parts/blog/blog','loop' ); ?>
               <?php
                  wptb_pagination();
               ?>
               <!-- <div class="pagination__box cmn__bg">
                  <ul class="pagi">
                     <li>
                        <a href="#0">
                           1
                        </a>
                     </li>
                     <li>
                        <a href="#0">
                           2
                        </a>
                     </li>
                     <li>
                        <a href="#0">
                           3
                        </a>
                     </li>
                     <li>
                        <a href="#0">
                           <i class="bi bi-chevron-right"></i>
                        </a>
                     </li>
                  </ul>
               </div> -->

            </div>
         </div>
         <?php
        if(isset($sidebar_opt) && $sidebar_opt == 'right')
         {
            get_sidebar();
         }
         else if(isset($sidebar_opt) && $sidebar_opt == '' && is_active_sidebar( 'blog-widget' ))
         {
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

<!--<<  sub side bar custom >>-->
<div class="subside__barmenu sub__contact">
   <div class="remove__click d-flex justify-content-center align-items-center">
      <i class="bi bi-x-lg"></i>
   </div>
   <div class="sub__contact__wrapper d-grid">
      <a href="index-2.html" class="side-logo">
         <img src="assets/img/logo/logo.png" alt="img">
      </a>
      <p>
         Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur, aliquam quaerats voluptatem. Ut enim ad minima veniam, exercitationem laboriosam, nisi ut aliquid ex ea autem velit esse quam nihil
      </p>
      <div class="sub__contact-left d-grid">
         <div class="sub__contac-item">
            <div class="content">
               <span class="address d-block">
                  address
               </span>
               <span class="textp">
                  Victoria Street London,
               </span>
            </div>
         </div>
         <div class="sub__contac-item">
            <div class="content">
               <span class="address d-block">
                  email
               </span>
               <a href="javascript:void(0)" class="textp">
                  matias999@.com
               </a>
            </div>
         </div>
         <div class="sub__contac-item">
            <div class="content">
               <span class="address d-block">
                  call now
               </span>
               <a href="jasacript:void(0)" class="textp">
                  +98 4758 2154 021
               </a>
            </div>
         </div>
      </div>
      <div class="sub__contact-right mb-80 position-relative">
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
      <a href="#0" class="d-flex justify-content-center fw-500 cmn--btn align-items-center gap-2">
         <span>
            <i class="bi bi-chevron-right"></i>             
         </span>
         <span class="get__text">
            Let's Talk
         </span>
      </a>
   </div>
</div>
<!--<<  sub side bar custom >>-->

   <!--<< Scroll To Top >>-->
   <div class="progress-wrap">
      <svg
         class="progress-circle svg-content"
         width="100%"
         height="100%"
         viewBox="-1 -1 102 102"
      >
         <path fill="#c9f31d" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
      </svg>
      <i class="bi bi-arrow-90deg-up title topping"></i>
   </div>
   <!--<< Scroll To Top >>-->
</body>
</html>
<?php get_footer();