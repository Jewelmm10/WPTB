<?php
/**
 * Main Template File
 * @package Jagoron
 */
get_header();
   if ( ! get_framework_options('breadcrum_visibility' ) == 1 ) {
      $space = 'pt-120';
   }
   if( is_elementor_activated() )
	{
		the_content();
	} else {
?>


<!--<< blog >>-->
<section class="blog__bsection pb-120 <?php echo $space; ?>">
   <div class="container">
      <div class="row g-4">
         <?php
            $sidebar_opt = get_framework_options('blog_sidebar');
            $blog_type	=	'col-lg-8 col-xl-8 col-xs-12 col-md-12 col-sm-12';
            if( isset( $sidebar_opt ) && $sidebar_opt == 'no-sidebar' ) {
               $blog_type	=	'col-lg-12 col-xl-12 col-xs-12 col-md-12 col-sm-12';	
            } else {
               $blog_type	=	'col-lg-8 col-xl-8 col-xs-12 col-md-12 col-sm-12';	
            }
            if(isset($sidebar_opt) && $sidebar_opt == 'left') {
               get_sidebar();
            }
            if ( !is_active_sidebar( 'default-sidebar' ) ) {
               $blog_type	=	'col-lg-12 col-xl-12 col-xs-12 col-md-12 col-sm-12';	
            }
         ?>
         <div class="<?php echo esc_attr($blog_type); ?> ">
            <div class="blog__bleft__wrapper">               
               <?php get_template_part( 'template-parts/blog/blog','loop' ); ?>               
               <?php wptb_pagination(); ?>
            </div>
         </div>
         <?php
         if(isset($sidebar_opt) && $sidebar_opt == 'right'){
            get_sidebar();
         } else if (isset($sidebar_opt) && $sidebar_opt == '' && is_active_sidebar( 'default-sidebar' )){
            get_sidebar();
         }
        ?>
      </div>
   </div>
</section>
<!--<< blog >>-->
<?php

   }

get_footer();