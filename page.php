<?php
get_header();
?>
<!--<< blog >>-->
<section class="blog__bsection pb-120 pt-5">
   <div class="container">
      <div class="row g-4">
         <div class="col-lg-12 col-xl-12 col-xs-12 col-md-12 col-sm-12">
            <div class="blog__bleft__wrapper">               
                <?php
                    the_content();
                ?>       
            </div>
         </div>
      </div>
   </div>
</section>
<!--<< blog >>-->
<?php
get_footer();