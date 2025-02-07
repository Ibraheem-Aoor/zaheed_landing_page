<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'digeco-size2';

$digeco_has_entry_meta  = ( DigecoTheme::$options['port_info_title'] || DigecoTheme::$options['port_info_des'] || DigecoTheme::$options['port_start_date'] || DigecoTheme::$options['port_finish_date'] || DigecoTheme::$options['port_client'] || DigecoTheme::$options['port_cats'] || DigecoTheme::$options['port_tags'] || DigecoTheme::$options['port_website'] || DigecoTheme::$options['port_share'] || DigecoTheme::$options['port_rating'] ) ? true : false;

global $post;
$digeco_port_info_title  		= get_post_meta( $post->ID, 'digeco_port_info_title', true );
$digeco_port_des  				= get_post_meta( $post->ID, 'digeco_port_des', true );
$digeco_client_name  			= get_post_meta( $post->ID, 'digeco_client_name', true );
$digeco_start_date  			= get_post_meta( $post->ID, 'digeco_start_date', true );
$digeco_finish_date  			= get_post_meta( $post->ID, 'digeco_finish_date', true );
$digeco_website  				= get_post_meta( $post->ID, 'digeco_website', true );

$digeco_port_image  			= get_post_meta( $post->ID, 'digeco_port_image', true );

$ratting	 					= get_post_meta( $post->ID, 'digeco_port_rating', true );
$rest_port_rating 				= 5- intval( $ratting ) ;

$cats   						= wp_get_post_terms( $post->ID, 'digeco_portfolio_category', array( "fields" => "names" ) );
$cats   						= implode( ', ', $cats );

$tags   						= wp_get_post_terms( $post->ID, 'post_tag', array( "fields" => "names" ) );
$tags   						= implode( ', ', $tags );

$socials        				= get_post_meta( $post->ID, 'digeco_portfolio_icons', true );
$socials        				= array_filter( $socials );
$socials_fields 				= DigecoTheme_Helper::team_socials();

$digeco_port_meta = ( !empty($digeco_port_info_title) ) || ( !empty( $digeco_port_des ) ) || ( !empty($digeco_client_name) ) || ( !empty($digeco_start_date) ) || ( !empty($digeco_finish_date) ) || ( !empty($digeco_website) ) || ( !empty( $cats ) || ( !empty( $socials ) ) ) ? true : false;

if ( $digeco_has_entry_meta ) {
	if ( $digeco_port_meta ) {
		$port_thumb_class = 'col-lg-8 col-12';
	} else {
		$port_thumb_class = 'col-lg-12 col-12';	
	}
} else {
	$port_thumb_class = 'col-lg-12 col-12';
}


?>
<div id="post-<?php the_ID();?>" <?php post_class( 'portfolio-single' );?>>
	<div class="row">
		<div class="<?php echo esc_attr( $port_thumb_class ); ?>">
			<div class="rtin-thumbnail">
				<?php if ( has_post_thumbnail() ) { ?>
				<?php
					the_post_thumbnail( $thumb_size );
				} else {
					if ( !empty( DigecoTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( DigecoTheme::$options['no_preview_image']['id'], $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . DigecoTheme_Helper::get_img( 'noimage_1210X786.jpg' ) . '" alt="'.get_the_title().'">';
					} } ?>
			</div>
			<div class="rtin-portfolio-content">
				<?php the_content();?>
			</div>
		</div>
		<?php if ( $digeco_has_entry_meta ) { ?>
		<?php if ( $digeco_port_meta ) { ?>
		<div class="col-lg-4 col-12">
			<div class="portfolio-details">
				<?php if ( !empty($digeco_port_image) ) { ?>
				<div class="port-side-img">
					<?php echo wp_get_attachment_image( $digeco_port_image, 'full', "", array( "class" => "img-responsive" ) ); ?>
				</div>
				<?php } ?>
				<?php if ( ( DigecoTheme::$options['port_info_title'] )  && !empty( $digeco_port_info_title ) ) { ?>	
					<h3><?php echo wp_kses( $digeco_port_info_title , 'alltext_allow' );?></h3>
				<?php } ?>
				<?php if ( ( DigecoTheme::$options['port_info_des'] )  && !empty( $digeco_port_des ) ) { ?>	
					<p><?php echo wp_kses( $digeco_port_des , 'alltext_allow' );?></p>
				<?php } ?>
				<ul class="rtin-portfolio-info">
					<?php if ( ( DigecoTheme::$options['port_client'] )  && !empty( $digeco_client_name ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Client', 'digeco' );?></span><?php echo esc_html( $digeco_client_name );?></li>
					<?php } if ( ( DigecoTheme::$options['port_cats'] )  && !empty( $cats ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Category', 'digeco' );?></span><?php echo wp_kses( $cats , 'alltext_allow' );?></li>
					<?php } if ( ( DigecoTheme::$options['port_tags'] ) && !empty ( $tags ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Tags', 'digeco' );?></span><?php the_tags('',', ', '');?></li>
					<?php } if ( ( DigecoTheme::$options['port_start_date'] ) && !empty( $digeco_start_date ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Start Date', 'digeco' );?></span><?php echo esc_html( $digeco_start_date );?></li>
					<?php } if ( ( DigecoTheme::$options['port_finish_date'] ) && !empty( $digeco_finish_date ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'End Date', 'digeco' );?></span><?php echo esc_html( $digeco_finish_date );?></li>
					<?php } if ( ( DigecoTheme::$options['port_website'] ) && !empty ( $digeco_website ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Website', 'digeco' );?></span><?php echo wp_kses( $digeco_website , 'alltext_allow' );?></li>
					<?php } if ( ( DigecoTheme::$options['port_share'] ) && !empty( $socials ) ) { ?>
						<li class="port-share"><span class="rtin-label"><?php esc_html_e( 'Share', 'digeco' );?></span> 
							<ul class="rtin-social">
								<?php foreach ( $socials as $key => $value ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
					
					<?php } if ( DigecoTheme::$options['port_rating'] ) { ?>	
						<li class="port-rating"><span class="rtin-label"><?php esc_html_e( 'Rating', 'digeco' );?></span>
							<ul class="rating">
								<?php for ($i=0; $i < $ratting; $i++) { ?>
									<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>			
								<?php for ($i=0; $i < $rest_port_rating; $i++) { ?>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>
							</ul></li>
					<?php } ?>						
				</ul>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
	<?php if( DigecoTheme::$options['show_related_port'] == '1' && is_single() && !empty ( digeco_related_port() ) ) { ?>
	<div class="related-post">
		<?php digeco_related_port(); ?>
	</div>
	<?php } ?>
</div>