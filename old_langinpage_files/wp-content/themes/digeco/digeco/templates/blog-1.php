<?php
/**
 * Template Name: Blog 1
 * 
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

$args = array(
	'post_type' => "post",
);

if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( DigecoTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $digeco_layout_class );?>">
				<main id="main" class="site-main">					
					<?php if ( have_posts() ) :?>
						<?php
							echo '<div class="blog-layout-1 row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						?>
						<div class="mt50"><?php DigecoTheme_Helper::pagination();?></div>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					
				</main>
			</div>
			<?php if ( DigecoTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>