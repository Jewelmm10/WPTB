<?php
if (!function_exists('wptb_heading')) {
   function wptb_heading($params) {
      
      if( $params['heading_type'] == 'stand' ) {

      ?>
      <div class="personal__head text-center">
         <img src="<?php echo $params['title_img']['url']; ?>" class="mb-30" alt="star">
         <p class="descrp">
            <?php echo $params['title']; ?>
         </p>
      </div>
      <?php 
      } else {
      ?>
      <div class="project__head text-center">
         <span class="common__sub">
            <?php echo $params['sub_title']; ?> 
         </span>
         <h2 class="fw-500">
         <?php echo $params['title']; ?>
         </h2>
      </div>
      <?php
      }
   }
}
