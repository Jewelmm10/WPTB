<?php



if ( !function_exists( 'wptb_hero_section' ) ) {
	function wptb_hero_section($params) {
      
      $sub_title = $sub_icon = $hero_title = $animate_title = $prefix_img = $video_link= $suffix_text = $hero_img = '';
      $sub_title      = $params['sub_title'];
      $sub_icon       = $params['sub_icon']['value'];
      $hero_title     = $params['hero_title'];
      $animate_title  = $params['animate_title'];
      $prefix_img     = $params['prefix_img']['url'];
      $video_link     = $params['video_link'];
      $suffix_text    = $params['suffix_text'];
      $hero_img       = $params['hero_img']['url'];
      ?>
        <section class="banner__section">
    <div class="container">
      <div class="row g-4">
         <div class="col-lg-8">
            <div class="banner__content">
               <a href="#0" class="bn__currently">
                  <span class="d-block gap-4"><?php echo $sub_title; ?> <i class="<?php echo $sub_icon; ?>"></i></span>
               </a>
               <h1>
                 <span class="hone"><?php echo $hero_title; ?></span>
                  <span class="d-block designers" data-text="<?php echo $animate_title; ?>"><?php echo $animate_title; ?></span>
               </h1>
               <div class="video__area">                  
                  <img src="<?php echo $prefix_img; ?>" class="vid__arrow">
                  <a href="https://www.youtube.com/watch?v=zFuJgOiUEso&amp;ab_channel=SujithRajendran" class="video__80 video-btn">
                     <i class="bi bi-play-fill"></i>
                  </a>
                  <span class="proces"><?php echo $suffix_text; ?></span>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="banner__thumb" data-aos="fade-up-right" data-aos-duration="300">
               <img src="<?php echo $hero_img; ?>" alt="man-img">
            </div>
         </div>
      </div>
   </div>
</section>
<?php
	}
}