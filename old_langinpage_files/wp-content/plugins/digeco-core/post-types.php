<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;
use \RT_Posts;
use DigecoTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'digeco_team'       => array(
		'title'           => __( 'Team Member', 'digeco-core' ),
		'plural_title'    => __( 'Team Members', 'digeco-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'digeco-core' ),
		),
		'rewrite'         => DigecoTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'digeco_service'  => array(
		'title'           => __( 'Service', 'digeco-core' ),
		'plural_title'    => __( 'Services', 'digeco-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => DigecoTheme::$options['service_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'digeco_portfolio'  => array(
		'title'           => __( 'Portfolio', 'digeco-core' ),
		'plural_title'    => __( 'Portfolios', 'digeco-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => DigecoTheme::$options['portfolio_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
		'taxonomies' 	  => array( 'post_tag' ),
	),
	'digeco_testim'     => array(
		'title'           => __( 'Testimonial', 'digeco-core' ),
		'plural_title'    => __( 'Testimonials', 'digeco-core' ),
		'menu_icon'       => 'dashicons-awards',
		'rewrite'         => DigecoTheme::$options['testimonial_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
);

$taxonomies = array(
	'digeco_team_category' => array(
		'title'        => __( 'Team Category', 'digeco-core' ),
		'plural_title' => __( 'Team Categories', 'digeco-core' ),
		'post_types'   => 'digeco_team',
		'rewrite'      => array( 'slug' => DigecoTheme::$options['team_cat_slug'] ),
	),
	'digeco_service_category' => array(
		'title'        => __( 'Service Category', 'digeco-core' ),
		'plural_title' => __( 'Service Categories', 'digeco-core' ),
		'post_types'   => 'digeco_service',
		'rewrite'      => array( 'slug' => DigecoTheme::$options['service_cat_slug'] ),
	),
	'digeco_portfolio_category' => array(
		'title'        => __( 'Portfolio Category', 'digeco-core' ),
		'plural_title' => __( 'Portfolio Categories', 'digeco-core' ),
		'post_types'   => 'digeco_portfolio',
		'rewrite'      => array( 'slug' => DigecoTheme::$options['portfolio_cat_slug'] ),
	),
	'digeco_testimonial_category' => array(
		'title'        => __( 'Testimonial Category', 'digeco-core' ),
		'plural_title' => __( 'Testimonial Categories', 'digeco-core' ),
		'post_types'   => 'digeco_testim',
		'rewrite'      => array( 'slug' => DigecoTheme::$options['testim_cat_slug'] ),
	),
);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );