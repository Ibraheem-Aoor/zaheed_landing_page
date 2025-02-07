<?php
$digeco_footer_column = DigecoTheme::$options['footer_column_9'];
switch ( $digeco_footer_column ) {
	case '1':
	$digeco_footer_class = 'col-lg-12 col-sm-12 col-12';
	break;
	case '2':
	$digeco_footer_class = 'col-lg-6 col-sm-6 col-12';
	break;
	case '3':
	$digeco_footer_class = 'col-lg-4 col-sm-4 col-12';
	break;		
	default:
	$digeco_footer_class = 'col-lg-3 col-sm-6 col-12';
	break;
}
// Logo
$digeco_light_logo = empty( DigecoTheme::$options['footer_logo_light']['url'] ) ? DIGECO_IMG_URL . 'logo-light.png' : DigecoTheme::$options['footer_logo_light']['url'];
$digeco_socials = DigecoTheme_Helper::socials();
?>
<?php if ( DigecoTheme::$footer_area == 1 || DigecoTheme::$footer_area == 'on' ){ ?>
	<div class="footer-top-area">
		<div class="container">
			<div class="row">
				<?php
				for ( $i = 1; $i <= $digeco_footer_column; $i++ ) {
					echo '<div class="' . $digeco_footer_class . '">';
					dynamic_sidebar( 'footer-style-9-'. $i );
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ( DigecoTheme::$copyright_area == 1 || DigecoTheme::$copyright_area == 'on' ) { ?>
	<div class="footer-bottom-area">
		<div class="container">
			<div class="copyright_wrap">
				<div class="copyright"><?php echo wp_kses_post( DigecoTheme::$options['copyright_text'] );?></div>
				<?php if(is_active_sidebar( 'copyright_widget' )) { ?>
				<div class="copyright_widget"><?php dynamic_sidebar( 'copyright_widget' ); ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>