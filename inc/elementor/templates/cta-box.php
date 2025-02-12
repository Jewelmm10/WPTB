<?php
if (!function_exists('wptb_call_to_acton')) {
   function wptb_call_to_acton($params) {
       // Default values to prevent errors
       $defaults = [
           'cta_type'    => '',
           'cta_title'   => [ 'value' => '' ],
           'cta_details' => '',
           'cta_image'   => [ 'url' => '' ],
           'cta_social'  => []
       ];
       
       // Merge defaults with provided parameters
       $params = array_merge($defaults, $params);

       // Assign values safely
       $cta_type    = $params['cta_type'];
       $cta_title   = $params['cta_title'] ?? 'Title';
       $cta_details = $params['cta_details'];
       $url         = $params['cta_link']['url'] ?? '#0';
       $cta_image   = $params['cta_image']['url'] ?? ''; // Fix image URL reference
       $cta_social  = $params['cta_social'];
       if ($cta_type == 'cta-basic') {
       ?>
           <div>
               <div class="abox">
                   <div class="about__contbox__item">
                       <span class="ptext fz-18 mb-20 d-block"><?php echo esc_html($cta_title); ?></span>
                       <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($cta_details); ?></a>
                   </div>
               </div>
           </div>
       <?php
       } elseif ($cta_type == 'cta-img') { ?>
           <div class="abox myskill__item">
               <div class="thumb">
                   <img src="<?php echo esc_url($cta_image); ?>" alt="img">
               </div>
               <div class="mys">
                   <span class="ptext fz-18 mb-15 d-block"><?php echo esc_html($cta_title); ?></span>
                   <h1 class="fw-600"><?php echo esc_html($cta_details); ?></h1>
               </div>
           </div>
       <?php 
       } else { 
       ?>
        <div class="abox">
            <div class="about__contbox__item">
                <span class="ptext fz-18 mb-20 d-block"><?php echo esc_html($cta_title); ?></span>
                <ul class="d-flex align-items-center gap-2 gap-xl-4">
                <?php if (!empty($cta_social) && is_array($cta_social)) : ?>
                    <?php foreach ($cta_social as $social) : ?>
                        <?php 
                            $icon = $social['social_icon']['value'] ?? 'bi bi-globe'; // Default icon
                            $url  = $social['link']['url'] ?? '#0'; // Default URL
                        ?>
                        <li>
                            <a href="<?php echo esc_url($url); ?>" target="_blank">
                                <i class="<?php echo esc_attr($icon); ?>"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#0"><i class="bi bi-globe"></i></a></li>
                    <li><a href="#0"><i class="bi bi-linkedin"></i></a></li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
       <?php 
       }
   }
}
