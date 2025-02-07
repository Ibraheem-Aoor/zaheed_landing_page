<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = DigecoTheme_Helper::nav_menu_args();
$digeco_socials = DigecoTheme_Helper::socials();
// Logo
$digeco_light_logo = empty( DigecoTheme::$options['logo_light']['id'] ) ? '<img width="138" height="59" alt="'.get_bloginfo( 'name' ).'" src="'.DIGECO_IMG_URL . 'logo-light.png'.'">' : wp_get_attachment_image(DigecoTheme::$options['logo_light']['id'],'full');
$digeco_dark_logo = empty(  DigecoTheme::$options['logo']['id'] ) ? '<img width="138" height="59" alt="'.get_bloginfo( 'name' ).'" src="'.DIGECO_IMG_URL . 'logo-dark.png'.'">' :  wp_get_attachment_image(DigecoTheme::$options['logo']['id'],'full'); 

?>

<div class="masthead-container header-controll" id="sticker">
	<div class="container">
		<div class="header-5-wrap">
			<?php if ( DigecoTheme::$options['quick_contact'] == '1' ) { ?>
			<div class="info-wrap">				
				<div class="icon-left">
				<i class="flaticon-phone-call"></i>
				</div>
				<div class="info"><span><?php $header_hotline_txt = DigecoTheme::$options['header_hotline_txt'];
				if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Call Us Now', 'digeco' ); } ?></span><a href="tel:<?php echo esc_attr( DigecoTheme::$options['phone'] );?>"><?php echo wp_kses( DigecoTheme::$options['phone'] , 'alltext_allow' );?></a></div>					
			</div>
			<?php } ?>	
			<div class="header-5-middle">
				<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_dark_logo);?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_light_logo);?></a>
				</div>
			</div>
			<?php if ( $digeco_socials ) { ?>
				<ul class="tophead-social">
					<?php foreach ( $digeco_socials as $digeco_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $digeco_social['url'] );?>"><i class="fab <?php echo esc_attr( $digeco_social['icon'] );?>"></i></a></li>
					<?php endforeach; ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</div>
<div class="masthead-container header-menu-controll">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/header/icon', 'area' );?>
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
			<div class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args ); ?>
			</div>
			<?php get_template_part( 'template-parts/header/icon', 'area' );?>
		</div>
	</div>
</div>