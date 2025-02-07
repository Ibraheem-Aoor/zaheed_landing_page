<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = DigecoTheme_Helper::nav_menu_args();
// Logo
$digeco_light_logo = empty( DigecoTheme::$options['logo_light']['id'] ) ? '<img width="138" height="59" alt="'.get_bloginfo( 'name' ).'" src="'.DIGECO_IMG_URL . 'logo-light.png'.'">' : wp_get_attachment_image(DigecoTheme::$options['logo_light']['id'],'full');
$digeco_dark_logo = empty(  DigecoTheme::$options['logo']['id'] ) ? '<img width="138" height="59" alt="'.get_bloginfo( 'name' ).'" src="'.DIGECO_IMG_URL . 'logo-dark.png'.'">' :  wp_get_attachment_image(DigecoTheme::$options['logo']['id'],'full');

?>
<div class="masthead-container header-controll" id="sticker">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_dark_logo);?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_light_logo);?></a>
			</div>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="menu-right-wrap header-icon-area">
				<?php if ( DigecoTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>
				<?php if ( DigecoTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
				<?php } ?>
				<?php if ( DigecoTheme::$options['online_button'] == '1' ) { ?>
				<div class="header-button-wrap">
					<div class="header-button">
						<?php if ( DigecoTheme::$options['online_button_text'] ) { ?><a class="btn-fill btn-gradient" target="_self" href="<?php echo esc_url( DigecoTheme::$options['online_button_link']  );?>"><?php echo esc_html( DigecoTheme::$options['online_button_text'] );?></a><?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="rt-sticky-menu-wrapper rt-sticky-menu">
	<div class="container">
		<div class="sticky-menu-align">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_dark_logo);?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_light_logo);?></a>
			</div>
			<div id="site-navigation-onepage" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args ); ?>
			</div>
			<div class="menu-right-wrap header-icon-area">
				<?php if ( DigecoTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>
				<?php if ( DigecoTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
				<?php } ?>
				<?php if ( DigecoTheme::$options['online_button'] == '1' ) { ?>
				<div class="header-button-wrap">
					<div class="header-button">
						<a class="btn-fill btn-gradient" target="_self" href="<?php echo esc_url( DigecoTheme::$options['online_button_link']  );?>"><?php echo esc_html( DigecoTheme::$options['online_button_text'] );?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>