<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use DigecoTheme;
use DigecoTheme_Helper;
use \WP_Query;

$prefix      = DIGECO_CORE_THEME_PREFIX;
$thumb_size  = 'digeco-size5';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'digeco_team',
	'paged' => $paged
);

$query = new WP_Query( $args );
$temp = DigecoTheme_Helper::wp_set_temp_query( $query );

$id            	= get_the_id();
$designation   	= get_post_meta( $id, 'digeco_team_designation', true );
$socials       	= get_post_meta( $id, 'digeco_team_socials', true );
$social_fields 	= DigecoTheme_Helper::team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), DigecoTheme::$options['team_content_limit'], '' );
$content = "<p>$content</p>";

?>

<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item">
		<div class="rtin-thums">
			<a href="<?php the_permalink();?>">
			<?php
			if ( has_post_thumbnail() ){
				the_post_thumbnail( $thumb_size );
			}
			else {
				if ( !empty( DigecoTheme::$options['no_preview_image']['id'] ) ) {
					echo wp_get_attachment_image( DigecoTheme::$options['no_preview_image']['id'], $thumb_size );
				}
				else {
					echo '<img class="wp-post-image" src="' . DigecoTheme_Helper::get_img( 'noimage_520X562.jpg' ) . '" alt="'.get_the_title().'">';
				}
			}
			?>
		</a>
		</div>
		<div class="rtin-content-wrap">
			<div class="rtin-content">
				<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<?php if ( $designation && DigecoTheme::$options['team_desi_display'] ) { ?>
					<div class="rtin-designation"><?php echo esc_html( $designation );?></div>
				<?php } ?>
				<?php if( DigecoTheme::$options['team_excerpt_display'] ) { ?>
					<?php echo wp_kses_post( $content );?>
				<?php } ?>	
				<?php if ( !empty( $socials ) && DigecoTheme::$options['team_social_display'] ) { ?>
				<ul class="rtin-social">
					<?php foreach ( $socials as $key => $social ): ?>
						<?php if ( !empty( $social ) ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php DigecoTheme_Helper::wp_reset_temp_query( $temp ); ?>
</article>