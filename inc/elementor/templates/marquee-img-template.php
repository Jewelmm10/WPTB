<?php
if (!function_exists('wptb_marquee_gallery')) {
   function wptb_marquee_gallery($params) {
      $gallery_images = $params['wptb_gallery'];
      $direction = $params['direction'] === 'right' ? 'to-right' : 'to-left';
     
      if ($params['gallery_rand'] === 'rand') {
         shuffle($gallery_images);
      }

       ?>
       <div class="marquee-wrapper text-slider">
           <div class="marquee-inner <?php echo esc_attr($direction); ?>">
               <ul class="marqee-list d-flex">
                  <li>
                     <?php foreach ($gallery_images as $index => $image): ?>
                        <?php if ($index % 2 == 0): ?>
                           <img src="<?php echo esc_url($image['url']); ?>" alt="text-slide">
                        <?php else: ?>
                           <span class="stroke-text">
                              <img src="<?php echo esc_url($image['url']); ?>" alt="text-slide">
                           </span>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </li>
               </ul>
           </div>
       </div>
       <?php
   }
}
