<?php
/**
 * Header template
 * @package WPTB
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('myclass'); ?>>
<?php
    //wp version lower than 5.2 the function doesn't exists.
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } ?>
<?php get_template_part('template-parts/header/nav'); ?>
<?php
    if(is_page_template( 'page-home.php' )) {
		
	} else
    if ( get_framework_options('breadcrum_visibility' ) == 1) {
?>
    <div class="container pt-120 pb-120">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
            <div class="breadcrumnd__wrap text-center">
                <h1><?php echo wptb_breadcrumb_heading(); ?></h1>
                <ul class="breakcrumnd__cont justify-content-center">
                    <li>
                        <a href="<?php echo home_url( '/' ); ?>"><?php echo esc_html__('Home', 'wptb' ); ?></a>
                    </li>
                    <li class="white">
                        /  
                    </li>
                    <li class="base"><?php echo wptb_breadcrumb(); ?></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
<?php
}
