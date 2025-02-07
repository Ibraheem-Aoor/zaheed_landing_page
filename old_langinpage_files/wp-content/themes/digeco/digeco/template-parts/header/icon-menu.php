<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$digeco_socials = DigecoTheme_Helper::socials();
// Logo
$digeco_dark_logo = empty(  DigecoTheme::$options['logo']['id'] ) ? '<img width="138" height="59" alt="'.get_bloginfo( 'name' ).'" src="'.DIGECO_IMG_URL . 'logo-dark.png'.'">' :  wp_get_attachment_image(DigecoTheme::$options['logo']['id'],'full');

$digeco_addit_info  = ( DigecoTheme::$options['address'] || DigecoTheme::$options['phone'] || DigecoTheme::$options['email'] ) ? true : false;

?>

<div class="additional-menu-area">
	<div class="sidenav">
		<a href="#" class="closebtn"><i class="fas fa-times"></i></a>
		<div class="additional-logo">
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post($digeco_dark_logo);?></a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => '' ) );?>
		<div class="sidenav-address">
		<?php if ( !empty ( $digeco_addit_info ) || !empty ( $digeco_socials ) ) { ?>
			<div class="sidenav-address-title"><?php esc_html_e( 'Follow Us', 'digeco' );?></div>
		<?php } ?>
		<?php if ( $digeco_addit_info ) { ?>
			<?php if ( DigecoTheme::$options['address'] ) { ?>
			<span><?php echo wp_kses( DigecoTheme::$options['address'] , 'alltext_allow' );?></span>
			<?php } ?>
			<?php if ( DigecoTheme::$options['phone'] ) { ?>
			<span><a href="tel:<?php echo esc_attr( DigecoTheme::$options['phone'] );?>"><?php echo esc_html( DigecoTheme::$options['phone'] );?></a></span>
			<?php } ?>
			<?php if ( DigecoTheme::$options['email'] ) { ?>
			<span><a href="mailto:<?php echo esc_attr( DigecoTheme::$options['email'] );?>"><?php echo esc_html( DigecoTheme::$options['email'] );?></a></span>
			<?php } ?>
		<?php } ?>
			<?php if ( $digeco_socials ) { ?>
				<div class="sidenav-social">
					<?php foreach ( $digeco_socials as $digeco_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $digeco_social['url'] );?>"><i class="fab <?php echo esc_attr( $digeco_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
			<?php } ?>
		</div>
	</div>
	<span class="side-menu-open side-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</span>
</div>