<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
	if ( DigecoTheme::$layout == 'full-width' ) {
		$digeco_layout_class = 'col-sm-12 col-12';
	}
	else{
		$digeco_layout_class = DigecoTheme_Helper::has_active_widget();
	}
	$digeco_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

	$cpt = DIGECO_NAME;
	if ( is_post_type_archive( "digeco_service" ) || is_tax( "digeco_service_category" ) ) {
			get_template_part( 'template-parts/archive', 'services' );
		return;
	}
	if ( is_post_type_archive( "digeco_portfolio" ) || is_tax( "digeco_portfolio_category" ) ) {
			get_template_part( 'template-parts/archive', 'portfolio' );
		return;
	}
	if ( is_post_type_archive( "digeco_team" ) || is_tax( "digeco_team_category" ) ) {
			get_template_part( 'template-parts/archive', 'team' );
		return;
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
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $digeco_is_post_archive && DigecoTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $digeco_is_post_archive && DigecoTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $digeco_is_post_archive && DigecoTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( class_exists( 'Digeco_Core' ) ) {
							if ( is_tax( 'digeco_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php DigecoTheme_Helper::pagination(); ?>
						
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
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
