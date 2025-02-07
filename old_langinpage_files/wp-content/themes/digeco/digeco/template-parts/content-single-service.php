<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$thumb_size = 'digeco-size1';

global $post;

$digeco_service_contact  		= get_post_meta( get_the_ID(), 'digeco_service_contact', true );
$digeco_service_email  			= get_post_meta( get_the_ID(), 'digeco_service_email', true );
$digeco_service_button  		= get_post_meta( get_the_ID(), 'digeco_service_button', true );
$digeco_service_url  		    = get_post_meta( get_the_ID(), 'digeco_service_url', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'service-single' ); ?>>
	<div class="single-service-inner">
		<?php if ( !empty(has_post_thumbnail() ) ){ ?>
		<div class="post-thumb">
			<?php
				if ( has_post_thumbnail() ){
					the_post_thumbnail( $thumb_size );
				}
			?>
		</div>
		<?php } ?>		
		<?php if ( ( DigecoTheme::$options['service_contact'] ) && !empty ( $digeco_service_contact ) || ( DigecoTheme::$options['service_email'] ) && !empty ( $digeco_service_email ) ) { ?>		
		<ul class="rtin-service-info">			
			<?php if ( ( DigecoTheme::$options['service_contact'] ) && !empty ( $digeco_service_contact ) ) { ?>
				<li><span class="rtin-label"><?php esc_html_e( 'Contact', 'digeco' );?> :</span><?php echo wp_kses_post( $digeco_service_contact );?></li>
			<?php } if ( ( DigecoTheme::$options['service_email'] ) && !empty ( $digeco_service_email ) ) { ?>
				<li><span class="rtin-label"><?php esc_html_e( 'E-mail', 'digeco' );?> :</span><?php echo wp_kses_post( $digeco_service_email );?></li>
			<?php } ?>
		</ul>
		<?php } ?>			
		<?php the_content(); ?>
		<?php if ( ( DigecoTheme::$options['service_button'] ) && !empty ( $digeco_service_button ) ) { ?>
		<div class="service-button">
		<a href="<?php echo esc_url ( $digeco_service_url ); ?>" class="button-gradient-1"><?php echo wp_kses_post( $digeco_service_button );?><i class="flaticon-next"></i></a>
		<?php } ?>
		</div>
	</div>
</div>