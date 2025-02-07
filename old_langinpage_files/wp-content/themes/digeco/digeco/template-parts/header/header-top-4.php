<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$digeco_socials = DigecoTheme_Helper::socials();
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<div class="tophead-left">
				<?php if ( DigecoTheme::$options['address'] ) { ?>
				<div class="address">
					<?php echo wp_kses( DigecoTheme::$options['address'] , 'alltext_allow' );?>
				</div>
				<?php } ?>
				<?php if ( DigecoTheme::$options['email'] ): ?>
					<div class="email-address">
						<span><i class="far fa-envelope"></i></span><?php echo wp_kses( DigecoTheme::$options['email'] , 'alltext_allow' );?>
					</div>
				<?php endif; ?>
			</div>
			<div class="tophead-right">
				<?php if ( DigecoTheme::$options['phone'] ): ?>
				<div class="phone">
					<span><i class="fas fa-phone"></i></span><?php echo wp_kses( DigecoTheme::$options['phone'] , 'alltext_allow' );?>
				</div>
				<?php endif; ?>
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
</div>