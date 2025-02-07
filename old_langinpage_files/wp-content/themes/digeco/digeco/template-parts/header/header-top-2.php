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
				<div class="address"><?php if ( DigecoTheme::$options['address'] ) { ?><?php echo wp_kses( DigecoTheme::$options['address'] , 'alltext_allow' );?><?php } ?></div>
				<?php if ( DigecoTheme::$options['email'] ): ?>
					<div class="email-address">
						<i class="fas fa-envelope"></i><?php echo wp_kses( DigecoTheme::$options['email'] , 'alltext_allow' );?>
					</div>
				<?php endif; ?>
			</div>
			<div class="tophead-right">
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

