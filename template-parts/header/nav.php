<?Php
/**
 * Navigation template
 * @package WPTB
 */
?>

<header class="header-section">
	<div class="container">
		<div class="header-wrapper">
		<div class="main__logo">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php 
					$default_logo_html = '<img src="' . get_template_directory_uri() . '/images/je.png">';
					echo apply_filters( 'wptb_display_logo', $default_logo_html );
				?>
			</a>
		</div>
		<?php 
		
		?>
		<?php if ( has_nav_menu( 'wptb-header-menu' ) ) : 
			wp_nav_menu(
				array(
					'theme_location'  => 'wptb-header-menu',
					'menu_class'      => 'main-menu',
					'container_class' => '',
				)
			);
		?>

		<?php endif; ?>
		
		<div class="menu__components d-flex align-items-center">			
			<?php 
				header_btn_show();
			?>			
			<div class="header-bar d-lg-none">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="remove__click">
				<i class="bi bi-list"></i>
			</div>
		</div>
		</div>
	</div>
</header>