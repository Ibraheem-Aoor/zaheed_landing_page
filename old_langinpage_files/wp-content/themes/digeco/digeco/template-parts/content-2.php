<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$digeco_has_entry_meta  = ( DigecoTheme::$options['blog_cats'] || DigecoTheme::$options['blog_date'] || DigecoTheme::$options['blog_author_name'] || DigecoTheme::$options['blog_comment_num'] || DigecoTheme::$options['blog_view'] && function_exists( 'digeco_views' ) || DigecoTheme::$options['blog_length'] && function_exists( 'digeco_reading_time' ) ) ? true : false;

$thumb_size = 'digeco-size1';
$digeco_time_html       = sprintf( '%s<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$digeco_time_html       = apply_filters( 'digeco_single_time', $digeco_time_html );
$digeco_time_html_2     = apply_filters( 'digeco_single_time_no_thumb', get_the_time( get_option( 'date_format' ) ) );

$digeco_comments_number = number_format_i18n( get_comments_number() );
$digeco_comments_html = $digeco_comments_number == 1 ? esc_html__( 'Comment' , 'digeco' ) : esc_html__( 'Comments' , 'digeco' );
$digeco_comments_html = '<span class="comment-number">'. $digeco_comments_number .'</span> '. $digeco_comments_html;

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), DigecoTheme::$options['post_content_limit'], '' );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>
	<div class="blog-box">
		<?php if ( has_post_thumbnail() || DigecoTheme::$options['display_no_preview_image'] == '1'  ) { ?>
			<div class="blog-item-figure">
				<div class="blog-img">
					<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
						<?php } else {
						if ( DigecoTheme::$options['display_no_preview_image'] == '1' ) {
							if ( !empty( DigecoTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = wp_get_attachment_image( DigecoTheme::$options['no_preview_image']['id'], $thumb_size );						
							}
							elseif ( empty( DigecoTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = '<img class="wp-post-image" src="'.DIGECO_IMG_URL.'noimage_1210X660.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
							echo wp_kses( $thumbnail , 'alltext_allow' );
						}
					}
					?>
					</a>
				</div>
			</div>
		<?php } ?>
		<div class="blog-item-content">
			<?php if ( $digeco_has_entry_meta ) { ?>
			<ul class="blog-meta">
				<?php if ( DigecoTheme::$options['blog_date'] ) { ?>
				<li><?php echo get_the_date(); ?></li>
				<?php } if ( DigecoTheme::$options['blog_author_name'] ) { ?>
				<li class="item-author"><?php esc_html_e( 'by ', 'digeco' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( DigecoTheme::$options['blog_cats'] ) { ?>
				<li class="blog-cat"><?php echo the_category( ', ' );?></li>
				<?php } if ( DigecoTheme::$options['blog_comment_num'] ) { ?>
				<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $digeco_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( DigecoTheme::$options['blog_length'] && function_exists( 'digeco_reading_time' ) ) { ?>
				<li class="meta-reading-time meta-item"><?php echo digeco_reading_time(); ?></li>
				<?php } if ( DigecoTheme::$options['blog_view'] && function_exists( 'digeco_views' ) ) { ?>
				<li><span class="meta-views meta-item "><?php echo digeco_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<p><?php echo wp_trim_words( get_the_excerpt(), DigecoTheme::$options['post_content_limit'], '' );?></p>
			<a class="button-1" href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'digeco' );?><i class="flaticon-next"></i></a>
		</div>
	</div>
</div>