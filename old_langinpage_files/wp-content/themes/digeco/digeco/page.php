<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( DigecoTheme::$layout == 'full-width' ) {
	$digeco_layout_class = 'col-sm-12 col-12';
} else {
	$digeco_layout_class = DigecoTheme_Helper::has_active_widget();
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( DigecoTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $digeco_layout_class );?>">
				<main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>					
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php
			if( DigecoTheme::$layout == 'right-sidebar' ){				
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>