<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size 			= 'digeco-size5';
$id            			= get_the_id();
$excerpt_count			= DigecoTheme::$options['excerpt_display_limit'];
$excerpt 				= wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
$digeco_service_icon   	= get_post_meta( get_the_ID(), 'digeco_service_icon', true );
$digeco_service_img   	= get_post_meta( get_the_ID(), 'digeco_service_img', true );
$icon_class 			= '' ;
if ( empty( $digeco_service_icon ) && empty( $digeco_service_img )  ) {
	$icon_class 		= ' no-icon';	
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'rt-el-service-grid-1' ); ?>>
	<div class="rtin-item <?php echo esc_attr( $icon_class ); ?>">
		<div class="rtin-content">
			<?php if (!empty( $digeco_service_icon ) || !empty( $digeco_service_img )) { ?>
			<div class="rtin-icon">
				<?php if ( $digeco_service_img ) : ?>
					<span><?php echo wp_get_attachment_image( $digeco_service_img, 'full' );?></span>
				<?php else: ?>
					<span><i class="<?php echo wp_kses_post( $digeco_service_icon );?>"></i></span>
				<?php endif; ?>
			</div>
			<?php } ?>
				<h3 class="rtin-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			<?php if ( DigecoTheme::$options['excerpt_display'] ) { ?>
				<p><?php echo wp_kses_post( $excerpt );?></p>
			<?php } ?>
			<?php if ( DigecoTheme::$options['read_display'] ) { ?>
			<div class="rtin-read">
				<a class="button-1" href="<?php the_permalink(); ?>">
					<?php echo esc_html( DigecoTheme::$options['service_readmore_text'] );?>
					<i class="flaticon-next"></i>
				</a>
				</div>
			<?php } ?>
		</div>
	</div>
</article>