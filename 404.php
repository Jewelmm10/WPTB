<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header();
?>
<section class="mt-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-xs-12 col-sm-12 col-md-12">
				<div class="404">
					<div class="content d-flex flex-column align-items-center">
						<img width="500" src="<?php echo esc_url(trailingslashit(get_template_directory_uri())."images/404.png"); ?>" alt="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', TRUE)); ?>" class="img-fluid">
						<h2><span><?php echo esc_html__( 'Oops!', 'wptb' ).'</span> '.esc_html__( 'Page Not Found', 'wptb' ); ?></h2>
						<p><?php echo esc_html__( "We're sorry, but the page you were looking for doesn't exist or temporarily unavailable.", 'wptb' ); ?></p>
					</div>
					<div class="mt-4 d-flex justify-content-center">
                    <a href="<?php echo home_url( '/' ); ?> " class="mt-5 fw-500 cmn--btn align-items-center gap-2">  <?php echo esc_html__('Back to home','wptb'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();